<?php
require(__DIR__ . "/partials/nav.php");
?>
<h1 class="page_name_header">Deposit and Withdraw</h1>
<h3 class="page_name_header">I want to:</h3>
<form id="deposit_or_withdraw" class="binary_selection">
    <input class="radio_option" type="radio" id="deposit" name="select_deposit_or_withdraw">
    <label for="deposit">Make a deposit</label>
    <input class="radio_option" type="radio" id="withdraw" name="select_deposit_or_withdraw">
    <label for="withdraw">Make a withdrawal</label>
    <label for="account_numbers"><h3 class="page_name_header">Deposit to/Withdraw from Account #:</h3></label>
    <select name="account_numbers" id="account_numbers" class="dropdown_menu">
        <!-- Populate this dropdown menu with accounts associated with the logged in user -->
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
    </select>
    <label for="amount_of_money"><h3 class="page_name_header">Deposit/Withdrawal Amount:</h3></label>
    <input id="amount_of_money" name="amount_of_money" class="one_line_field" type="number" value="0.01" min="0.01" step="0.01" required>
</form>