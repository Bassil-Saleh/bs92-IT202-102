<?php
require(__DIR__ . "/partials/nav.php");
?>

<?php
echo "<h2>Profile Page</h2>";

if (is_logged_in()) {
    echo "Welcome, " . get_user_email();
} else {
    echo "You're not logged in";
}
?>