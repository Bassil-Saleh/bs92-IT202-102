<style>
nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>

<?php
require(__DIR__ . "/partials/nav.php");
?>

<?php
echo "<h2>Profile Page</h2>";

if (is_logged_in()) {
    echo $_SESSION["user"]["email"];
} else {
    echo "You're not logged in";
}
?>