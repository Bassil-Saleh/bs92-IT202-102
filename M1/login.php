<?php
require(__DIR__ . "/partials/nav.php");
?>

<?php
// Display a message just after logging out
if (!empty($_GET['status'])) {
    echo "<div id=\"logout_message\">You have logged out of your account.</div>";
}
?>

<form id="login_form" onsubmit="return validate(this)" method="POST">
    <div id="login_email" class="one_line_field">
        <label for="email">Email</label>
        <input class="one_line_textfield" type="email" name="email" required />
    </div>
    <div id="login_password" class="one_line_field">
        <label for="pw">Password</label>
        <input class="one_line_textfield" type="password" id="pw" name="password" required minlength="8" />
    </div>
    <input id="login_button" class="submit_button" type="submit" value="Login" />
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        return true;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        echo "<div class=\"warning\">Email address must be non-empty.</div>";
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        echo "<div class=\"warning\">Please enter a valid email address (i.e. username@host.com).</div>";
        $hasError = true;
    }
    if (empty($password)) {
        echo "<div class=\"warning\">Password must be non-empty.</div>";
        $hasError = true;
    }
    if (strlen($password) < 8) {
        echo "<div class=\"warning\">Password must be at least 8 characters long.</div>";
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, password, username from Users where email = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        echo "Welcome, $email!<br>";
                        $_SESSION["user"] = $user;
                        // Start of lines 71 to 86 from https://gist.github.com/MattToegel/c636eef64e82fcf6bd2102377de2e47a
                        try {
                            //lookup potential roles
                            $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                        JOIN UserRoles on Roles.id = UserRoles.role_id 
                        where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                            $stmt->execute([":user_id" => $user["id"]]);
                            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                        } catch (Exception $e) {
                            error_log(var_export($e, true));
                        }
                        //save roles or empty array
                        if (isset($roles)) {
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }
                        // End of lines 71 to 86 from https://gist.github.com/MattToegel/c636eef64e82fcf6bd2102377de2e47a
                        die(header("Location: home.php"));
                    } else {
                        echo "<div class=\"warning\">Wrong password.</div>";
                    }
                } else {
                    echo "<div class=\"warning\">An account with this email address was not found.</div>";
                }
            }
        } catch (Exception $e) {
            echo "<pre>" . var_export($e, true) . "</pre>";
        }
    }
}
?>