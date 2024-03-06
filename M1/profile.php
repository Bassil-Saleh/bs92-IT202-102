<?php
require(__DIR__ . "/partials/nav.php");
?>

<ul>
    <li>item1</li>
    <li>item2</li>
</ul>

<?php
echo "<h2>Profile Page</h2>";

if (is_logged_in()) {
    echo $_SESSION["user"]["email"];
} else {
    echo "You're not logged in";
}
?>