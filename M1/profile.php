<?php
require(__DIR__ . "/partials/nav.php");
?>

<?php
echo "<h2 id=\"profile_header\" class=\"page_name_header\">Profile Page</h2>";

if (is_logged_in()) {
    //echo $_SESSION["user"]["email"];
    // Assuming the email/username change succeeded, these two <div> elements should update after a refresh.
    echo "<div id=\"profile_email\">" . "<span class=\"current_profile_info\">Current email: </span>" . $_SESSION["user"]["email"] . "</div>";
    echo "<div id=\"profile_username\">" . "<span class=\"current_profile_info\">Current username: </span>" . $_SESSION["user"]["username"] . "</div>";
} else {
    echo "<div id=\"profile_logged_out\">You cannot access this page unless you are logged in.</div>";
}
?>

<?php
if (isset($_POST["save"])) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);

    $params = [":email" => $email, ":username" => $username, ":id" => get_user_id()];
    $db = getDB();
    $stmt = $db->prepare("UPDATE Users set email = :email, username = :username where id = :id");
    // Don't try to update the email if the user 
    // entered an invalid one (i.e. missing a top-level domain).
    $valid_email = true;
    if (empty($email)) {
        flash("\"Change Email To:\" field must be non-empty.", "warning");
        $valid_email = false;
    }
    if (!is_valid_email($email)) {
        flash("Please enter a valid email address (i.e. username@host.com).","warning");
        $valid_email = false;
    }
    $valid_username = true;
    if (empty($username)) {
        flash("\"Change Username To:\" field must be non-empty.", "warning");
        $valid_username = false;
    }
    if ($valid_email && $valid_username) {
        try {
            $stmt->execute($params);
            flash("New email/username saved.", "success");
        } catch (PDOException $e) {
            // As of this writing, the Exception class in PHP doesn't have an errorInfo property,
            // hence why $e's type was changed to PDOException.
            if ($e->errorInfo[1] === 1062) {
                //https://www.php.net/manual/en/function.preg-match.php
                preg_match("/Users.(\w+)/", $e->errorInfo[2], $matches);
                if (isset($matches[1])) {
                    flash("The " . $matches[1] . " you entered is already being used by another account.", "warning");
                } else {
                    //TODO come up with a nice error message
                    echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                }
            } else {
                //TODO come up with a nice error message
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        }
    }
    //select fresh data from table
    $stmt = $db->prepare("SELECT id, email, username from Users where id = :id LIMIT 1");
    try {
        $stmt->execute([":id" => get_user_id()]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            //$_SESSION["user"] = $user;
            $_SESSION["user"]["email"] = $user["email"];
            $_SESSION["user"]["username"] = $user["username"];
        } else {
            flash("User doesn't exist.", "danger");
        }
    } catch (Exception $e) {
        flash("An unexpected error occurred, please try again.", "danger");
        //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
    }


    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            //TODO validate current
            $stmt = $db->prepare("SELECT password from Users where id = :id");
            try {
                $stmt->execute([":id" => get_user_id()]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($result["password"])) {
                    if (password_verify($current_password, $result["password"])) {
                        $query = "UPDATE Users set password = :password where id = :id";
                        $stmt = $db->prepare($query);
                        $stmt->execute([
                            ":id" => get_user_id(),
                            ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                        ]);

                        flash("Password reset.", "success");
                    } else {
                        flash("Cannot reset your password because the wrong password was entered in the \"Current Password\" field.", "warning");
                    }
                }
            } catch (PDOException $e) {
                // Exception class doesn't have an errorInfo property, so $e
                // was changed to a PDOException object.
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            flash("New passwords don't match.", "warning");
        }
    }
}
?>

<?php
$email = get_user_email();
$username = get_username();
?>
<?php if (is_logged_in()): ?>
<form id="profile_form" method="POST" onsubmit="return validate(this);">
    <div class="mb-3">
        <label for="email">Change Email To:</label>
        <input class="one_line_textfield" type="email" name="email" id="email" value="<?php se($email); ?>" />
    </div>
    <div class="mb-3">
        <label for="username">Change Username To:</label>
        <input class="one_line_textfield" type="text" name="username" id="username" value="<?php se($username); ?>" />
    </div>
    <!-- DO NOT PRELOAD PASSWORD -->
    <div id="profile_password_reset">Password Reset</div>
    <div class="mb-3">
        <label for="cp">Current Password:</label>
        <input class="one_line_textfield" type="password" name="currentPassword" id="cp" />
    </div>
    <div class="mb-3">
        <label for="np">New Password:</label>
        <input class="one_line_textfield" type="password" name="newPassword" id="np" />
    </div>
    <div class="mb-3">
        <label for="conp">Confirm New Password:</label>
        <input class="one_line_textfield" type="password" name="confirmPassword" id="conp" />
    </div>
    <input id="update_profile_button" class="submit_button" type="submit" value="Update Profile" name="save" />
</form>
<?php endif; ?>

<script>
    function validate(form) {
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let isValid = true;
        //TODO add other client side validation....

        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (pw !== con) {
            //find the container
            let flash = document.getElementById("flash");
            //create a div (or whatever wrapper we want)
            let outerDiv = document.createElement("div");
            outerDiv.className = "row justify-content-center";
            let innerDiv = document.createElement("div");

            //apply the CSS (these are bootstrap classes which we'll learn later)
            innerDiv.className = "alert alert-warning";
            //set the content
            innerDiv.innerText = "Cannot reset your password because the \"New Password\" and \"Confirm Password\" fields do not match.";

            outerDiv.appendChild(innerDiv);
            //add the element to the DOM (if we don't it merely exists in memory)
            flash.appendChild(outerDiv);
            isValid = false;
        }
        return isValid;
    }
</script>
<?php
require_once(__DIR__ . "/partials/flash.php");
?>