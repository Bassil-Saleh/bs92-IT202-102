<?php
require(__DIR__ . "/partials/nav.php");
?>
<h1 class="page_name_header">Create Bank Account</h1>
<div id="create_account_instructions">An account number will be automatically generated for you once you hit the "Make Checking Account" button.</div>
<form id="create_bank_account_form" method="POST">
    <div id="initial_deposit_field" class="one_line_field">
        <label name="initial_deposit">Initial Deposit ($5 to $1,000,000):</label>
        <input class="one_line_textfield" type="number" name="initial_deposit" min="5" max="1000000" value="5" step="0.01" required>
    </div>
    <input class="submit_button" type=submit value="Make Checking Account">
</form>
<?php
if (isset($_POST["initial_deposit"])) {
    $initial_deposit = se($_POST, "initial_deposit", "", false);
    echo var_dump($initial_deposit);
}
?>