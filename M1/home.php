<?php
require(__DIR__ . "/partials/nav.php");
displayFlashMessages();
?>
<h1 id="homepage_header" class="page_name_header">Home</h1>
<?php
if (is_logged_in()) {
    echo "<div id=\"homepage_welcome\">Welcome, " . get_user_email() . "!</div>";
} else {
    echo "<div id=\"homepage_logged_out\">You're not logged in.</div>";
}
//shows session info
//echo "<pre>" . var_export($_SESSION, true) . "</pre>";
// Check if logged in user has administrator privileges
$role_array = $_SESSION['user']['roles'];
if($role_array) {
    // non-empty array; check for role 'Admin'
    if($role_array[0]['name'] == 'Admin') {
        echo "<div class=\"user_role_msg\">Your account has administrator privileges.</div>";
    }
    else {
        echo "<div class=\"user_role_msg\">Your account does not have administrator privileges.</div>";
    }
}
else {
    // empty array
    echo "<div class=\"user_role_msg\">Your account does not have administrator privileges.</div>";
}
?>