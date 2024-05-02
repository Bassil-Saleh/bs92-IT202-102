<?php
require(__DIR__ . "/partials/nav.php");
?>
<?php
if (isset($_POST) && !empty($_POST)) {
    // echo var_dump($_POST);
    $option = $_POST['select_deposit_or_withdraw'];
    $account_number = $_POST['account_numbers'];
    $amount_of_money = $_POST['amount_of_money'];
    echo "$option $account_number $amount_of_money";

}
?>
<?php
// Retrieve the bank account #'s associated with the logged in user
// and populate the dropdown menu with them.
$username = $_SESSION["user"]["username"];
$db = getDB();
// Retrieve the user's ID # from the `Users` table
$stmt = $db->prepare("SELECT `id` FROM `Users` WHERE `username` = :username");
try {
    $stmt->execute(['username' => $username]);
    $result = $stmt->fetch();
    $user_id = $result['id'];
    // echo $user_id;
    // Now retrieve the bank account #'s associated with the logged in user
    $stmt = $db->prepare("SELECT `account_number` FROM `Accounts` WHERE `user_id` = :user_id");
    $found = $stmt->execute(['user_id' => $user_id]);
    if ($found) {
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        // echo var_dump($records);
    }
} catch (Exception $e) {
    echo var_dump($e);
}
?>
<h1 class="page_name_header">Deposit or Withdraw</h1>
<?php if(empty($records)):?>
    <h3 class="page_name_header">No account number(s) found under your name.</h3>
<?php else:?>
<h3 class="page_name_header">I want to:</h3>
<form id="deposit_or_withdraw" class="binary_selection" action="deposit.php" method="POST">
    <input class="radio_option" type="radio" id="deposit" name="select_deposit_or_withdraw" value="deposit" required>
    <label for="deposit">Make a deposit</label>
    <input class="radio_option" type="radio" id="withdraw" name="select_deposit_or_withdraw" value="withdraw" required>
    <label for="withdraw">Make a withdrawal</label>
    <label for="account_numbers"><h3 class="page_name_header">Account #:</h3></label>
    <select name="account_numbers" id="account_numbers" class="dropdown_menu">
        <!-- Populate this dropdown menu with accounts associated with the logged in user -->
        <?php foreach($records as $account):?>
            <option value="<?php se($account['account_number']);?>"><?php se($account['account_number']);?></option>
        <?php endforeach;?>
    </select>
    <label for="amount_of_money"><h3 class="page_name_header">Amount ($):</h3></label>
    <input id="amount_of_money" name="amount_of_money" class="one_line_field" type="number" value="0.01" min="0.01" step="0.01" required>
    <input class="submit_button" type=submit value="Submit">
</form>
<?php endif;?>