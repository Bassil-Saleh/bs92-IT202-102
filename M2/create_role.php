<?php
//note we need to go up 1 more directory
require(__DIR__ . "/partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view the \"Create Role\" page.", "warning");
    die(header("Location: " . get_url("home.php")));
}

if (isset($_POST["name"]) && isset($_POST["description"])) {
    $name = se($_POST, "name", "", false);
    $desc = se($_POST, "description", "", false);
    if (empty($name)) {
        flash("Name is required", "warning");
    } else {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Roles (name, description, is_active) VALUES(:name, :desc, 1)");
        try {
            $stmt->execute([":name" => $name, ":desc" => $desc]);
            flash("Successfully created role $name!", "success");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("A role with this name already exists, please try another", "warning");
            } else {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
    }
}
?>
<h1 id="create_role_header" class="page_name_header">Create Role</h1>
<form id="create_role_form" class="input_form" method="POST">
    <div id="create_role_name">
        <label for="name">Name</label>
        <input class="one_line_textfield" id="name" name="name" required />
    </div>
    <div id="create_role_description">
        <label for="d">Description</label>
        <textarea class="multiline_textfield" name="description" id="d"></textarea>
    </div>
    <input id="create_role_submit_button" type="submit" value="Create Role" />
</form>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/partials/flash.php");
?>