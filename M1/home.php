<?php
require(__DIR__ . "/partials/nav.php");
displayFlashMessages();
?>
<h1 id="homepage_header">Home</h1>
<?php
if (is_logged_in()) {
    echo "<div id=\"homepage_welcome\">Welcome, " . get_user_email() . "!</div>";
} else {
    echo "You're not logged in.";
}
//shows session info
//echo "<pre>" . var_export($_SESSION, true) . "</pre>";
?>