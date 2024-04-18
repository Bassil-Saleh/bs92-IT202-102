<style>
/* Navigation bar styling: */
nav ul {
  list-style-type: none;
  margin: 12px 16px;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  border-radius: 12px;
}
nav li {
  float: left;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
nav li a {
  display: block;
  color: white;
  text-align: center;
  padding: 12px 16px;
  text-decoration: none;
}
nav li a:hover {
  background-color: #111;
}
/* Login page elements */
.one_line_field {
  margin: 8px 24px;
}
.submit_button {
  margin: 8px 24px;
  padding: 12px 12px;
  font-size: 16px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: bold;
  border-radius: 8px;
}
#login_form {
  padding: 8px;
}
.one_line_textfield {
  font-family:'Courier New', Courier, monospace;
}
.multiline_textfield {
  font-family:'Courier New', Courier, monospace;
}
/* End of login page elements */
/* Register page elements */
#register_form {
  padding: 8px;
}

#register_email {
  margin: 8px 24px;
}

#logout_message {
  margin: 8px 32px;
}
.registration_msg {
  margin: 8px 32px;
}

/* Homepage */
#homepage_welcome {
  margin: 8px 24px;
}
#homepage_logged_out {
  margin: 8px 24px;
}
.user_role_msg {
  margin: 8px 24px;
}
.alert {
  margin: 8px 24px;
}
.warning {
  margin: 8px 24px;
}
.page_name_header {
  margin: 8px 24px;
}
.input_form {
  margin: 8px 24px;
}
body {
  background-color: #FFFAF0;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
/* Profile Page */
#profile_logged_out {
  margin: 8px 24px;
}
#profile_email {
  margin: 8px 24px;
}
#profile_username {
  margin: 8px 24px;
}
.current_profile_info {
  font-weight: bold;
}
#profile_password_reset {
  margin: 8px 24px;
  font-weight: bold;
}
.mb-3 {
  margin: 8px 24px;
}

/* List Roles Page */
table {
  border-collapse: collapse;
  margin: 8px 24px;
}
th {
  font-family:'Courier New', Courier, monospace;
  font-weight: bold;
}
th, td {
  border: 1px solid black;
  padding: 4px;
}
th {
  background-color:burlywood;
}
td {
  background-color:azure;
}
/*#list_roles_table {
  padding: 8px 24px;
}*/
.search_button {
  margin: 8px 8px;
  padding: 4px 4px;
  font-size: 12px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: bold;
  border-radius: 8px;
}
.toggle_button {
  margin: 8px 8px;
  padding: 4px 4px;
  font-size: 12px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: bold;
  border-radius: 8px;
}
/* Create Role Page */
#create_role_name {
  padding: 8px 0px;
}
#create_role_description {
  padding: 8px 0px;
}
#create_role_submit_button {
  margin: 8px 0px;
  padding: 12px 12px;
  font-size: 16px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: bold;
  border-radius: 8px;
}
</style>

<?php
session_start();
//Note: this is to resolve cookie issues with port numbers
$domain = $_SERVER["HTTP_HOST"];
if (strpos($domain, ":")) {
    $domain = explode(":", $domain)[0];
}
$localWorks = true; //some people have issues with localhost for the cookie params
//if you're one of those people make this false

//this is an extra condition added to "resolve" the localhost issue for the session cookie
/*if (($localWorks && $domain == "localhost") || $domain != "localhost") {
    session_set_cookie_params([
        "lifetime" => 60 * 60,
        "path" => "/Project",
        //"domain" => $_SERVER["HTTP_HOST"] || "localhost",
        "domain" => $domain,
        "secure" => true,
        "httponly" => true,
        "samesite" => "lax"
    ]);
}*/
require_once(__DIR__ . "/../lib/functions.php");

?>
<nav>
    <ul>
        <?php if (is_logged_in()) : ?>
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
        <?php endif; ?>
        <?php if (is_logged_in() && has_role("Admin")) : ?>
            <li><a href="list_roles.php">List Roles</a></li>
            <li><a href="create_role.php">Create Role</a></li>
        <?php endif; ?>
        <?php if (!is_logged_in()) : ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
        <?php if (is_logged_in()) : ?>
            <li><a href="logout.php">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>