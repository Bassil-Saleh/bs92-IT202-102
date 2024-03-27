<?php
require(__DIR__ . "/partials/nav.php");
?>
<form id="register_form" onsubmit="return validate(this)" method="POST">
    <div id="register_email" class="one_line_field">
        <label for="email">Email</label>
        <input class="one_line_textfield" type="email" name="email" required />
    </div>
    <div id="register_username" class="one_line_field">
        <label for="username">Username</label>
        <input class="one_line_textfield" type="text" name="username" required />
    </div>
    <div id="register_password" class="one_line_field">
        <label for="pw">Password</label>
        <input class="one_line_textfield" type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div id="register_confirm_password" class="one_line_field">
        <label for="confirm">Confirm</label>
        <input class="one_line_textfield" type="password" name="confirm" required minlength="8" />
    </div>
    <input id="register_button" class="submit_button" type="submit" value="Register" />
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
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
    $email = se($_POST, "email", "", false);
    $username = se($_POST, "username", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se(
        $_POST,
        "confirm",
        "",
        false
    );
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        echo "Email must not be empty";
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        echo "Invalid email address";
        $hasError = true;
    }
    if (empty($password)) {
        echo "password must not be empty";
        $hasError = true;
    }
    if (empty($confirm)) {
        echo "Confirm password must not be empty";
        $hasError = true;
    }
    if (strlen($password) < 8) {
        echo "Password too short";
        $hasError = true;
    }
    if (
        strlen($password) > 0 && $password !== $confirm
    ) {
        echo "Passwords must match";
        $hasError = true;
    }
    if (!$hasError) {
        //echo "Welcome, $email" . "<br>";
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
            echo "<div class=\"registration_msg\">Welcome, $email.</div>";
            echo "<div class=\"registration_msg\">Successfully registered!</div>";
        } catch (Exception $e) {
            echo "<div class=\"registration_msg\">There was a problem registering.</div>";
            // Check if email already exists
            $check_email_stmt = $db->prepare("SELECT 1 FROM Users WHERE email = :email");
            $check_email_stmt->execute([":email" => $email]);
            $result = $check_email_stmt->fetch();
            $email_exists = (bool)$result;
            if ($email_exists) {
                echo "<div class=\"registration_msg\">An account with the email address \"$email\" already exists.</div>";
            }
            // Check if username already exists
            $check_username_stmt = $db->prepare("SELECT 1 FROM Users WHERE username = :username");
            $check_username_stmt->execute([":username" => $username]);
            $result = $check_username_stmt->fetch();
            $username_exists = (bool)$result;
            if ($username_exists) {
                echo "<div class=\"registration_msg\">An account with the username \"$username\" already exists.</div>";
            }
            "<pre>" . var_export($e, true) . "</pre>";
        }
    }
}
?>