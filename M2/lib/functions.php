<?php
//TODO 1: require db.php
require_once(__DIR__ . "/db.php");
//This is going to be a helper for redirecting to our base project path since it's nested in another folder
//This MUST match the folder name exactly
$BASE_PATH = '/Project/';

//require safer_echo.php
require(__DIR__ . "/safer_echo.php");
//TODO 2: filter helpers
require(__DIR__ . "/sanitizers.php");

//TODO 3: User helpers
require(__DIR__ . "/user_helpers.php");
//TODO 4: Flash Message Helpers
require(__DIR__ . "/flash_messages.php");
?>

<?php
// This is a placeholder for the get_url() function.
// Currently the pages create_role.php
// and list_roles.php will throw a 
// fatal error unless this function is defined.
// It seems to be left over from code written 
// by someone else (but for whatever reason 
// isn't accessible anymore).
// Until we get word from the instructor on what
// this function is actually intended to do,
// it will just return the passed parameter
// for the time being.
function get_url($string) {
    return $string;
}
?>