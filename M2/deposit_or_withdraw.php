<?php
require(__DIR__ . "/partials/nav.php");
?>
<?php
if (isset($_POST) && !empty($_POST)) {
    // echo var_dump($_POST);
    $db = getDB();
    $option = $_POST['select_deposit_or_withdraw'];
    $account_number = $_POST['account_numbers'];
    $amount_of_money = $_POST['amount_of_money'];
    $memo = $_POST['memo'];
    // echo "$option $account_number $amount_of_money !$memo";
    if ($option == "deposit") {
        try {
            // Get the ID of the world account.
            $stmt = $db->prepare("SELECT id FROM Accounts WHERE account_type = \"world\"");
            $stmt->execute();
            $result = $stmt->fetch();
            $world_id = $result["id"];
            // Get the ID of the user's selected account #.
            $stmt = $db->prepare("SELECT id FROM Accounts WHERE account_number = :account_number");
            $stmt->execute(['account_number' => $account_number]);
            $result = $stmt->fetch();
            $user_acct_id = $result["id"];
            // Withdraw money from the world account (using $amount_of_money).
            // World account balance change = (current world account balance) - (deposit request amount)
            $stmt = $db->prepare("SELECT `balance` FROM `Accounts` WHERE `account_type` = \"world\"");
            $stmt->execute();
            $result = $stmt->fetch();
            $world_acct_curr_bal = $result["balance"];
            $world_acct_curr_bal -= $amount_of_money;
            // Get the current balance of the user's selected account # and calculate the new balance.
            $stmt = $db->prepare("SELECT `balance` FROM `Accounts` WHERE `account_number` = :account_number");
            $stmt->execute(['account_number' => $account_number]);
            $result = $stmt->fetch();
            $user_acct_curr_bal = $result["balance"];
            $user_acct_curr_bal += $amount_of_money;
            // Insert the 1st transaction pair into the `Transactions` table.
            $stmt = $db->prepare("INSERT INTO `Transactions` (`account_src`, `account_dest`, `balance_change`, `transaction_type`, `memo`, `expected_total`) VALUES (:account_src, :account_dest, :balance_change, :transaction_type, :memo, :expected_total)");
            $stmt->execute(['account_src' => $user_acct_id, 'account_dest' => $world_id, 'balance_change' => -$amount_of_money, 'transaction_type' => $option, 'memo' => $memo, 'expected_total' => $world_acct_curr_bal]);
            
            // Now update the world account's balance after inserting the 1st half of the transaction pair.
            $stmt = $db->prepare("UPDATE Accounts SET balance = :new_bal WHERE id = :world_id");
            $stmt->execute(["new_bal" => $world_acct_curr_bal, "world_id" => $world_id]);
            
            // Make the 2nd half of the transaction pair.
            $stmt = $db->prepare("INSERT INTO `Transactions` (`account_src`, `account_dest`, `balance_change`, `transaction_type`, `memo`, `expected_total`) VALUES (:account_src, :account_dest, :balance_change, :transaction_type, :memo, :expected_total)");
            $stmt->execute(['account_src' => $world_id, 'account_dest' => $user_acct_id, 'balance_change' => $amount_of_money, 'transaction_type' => $option, 'memo' => $memo, 'expected_total' => $user_acct_curr_bal]);
            // Now update the user account's balance after inserting the 2nd half of the transaction pair.
            $stmt = $db->prepare("UPDATE Accounts SET balance = :new_bal WHERE account_number = :account_number");
            $stmt->execute(['new_bal' => $user_acct_curr_bal, 'account_number' => $account_number]);
            
            echo "<div class=\"success\">Deposit of $$amount_of_money to account #$account_number successfully made.</div>";
        } catch (Exception $e) {
            echo "<div class=\"warning\">An error occured when attempting to perform your deposit.</div>";
        }
    }
    else if ($option == "withdraw") {
        // echo $option;
        try {
            ;
        } catch (Exception $e) {
            ;
        }
    }
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
<form id="deposit_or_withdraw" class="binary_selection" action="deposit_or_withdraw.php" method="POST">
    <input class="radio_option" type="radio" id="deposit" name="select_deposit_or_withdraw" value="deposit" required>
    <label for="deposit">Make a deposit</label>
    <input class="radio_option" type="radio" id="withdraw" name="select_deposit_or_withdraw" value="withdraw" required>
    <label for="withdraw">Make a withdrawal</label>
    <label for="account_numbers"><h3 class="page_name_header">Account #:</h3></label>
    <select name="account_numbers" id="account_numbers" class="dropdown_menu">
        <!-- Populate this dropdown menu with accounts associated with the logged in user -->
        <?php foreach($records as $account):?>
            <?php
            // Get the current balance of each account.
            $stmt = $db->prepare("SELECT `balance` FROM `Accounts` WHERE `account_number` = :account_number");
            $stmt->execute(['account_number' => $account['account_number']]);
            $result = $stmt->fetch();
            $current_balance = $result['balance'];
            // $account_string = se($account['account_number']);
            ?>
            <option value="<?php se($account['account_number']);?>">
                <?php se($account['account_number'] . " (current balance: $" . $current_balance . ")");?>
            </option>
        <?php endforeach;?>
    </select>
    <label for="amount_of_money"><h3 class="page_name_header">Amount ($):</h3></label>
    <input id="amount_of_money" name="amount_of_money" class="one_line_field" type="number" value="0.01" min="0.01" step="0.01" required>
    <label for="memo"><h3 class="page_name_header">Memo (optional):</h3></label>
    <textarea id="memo" name="memo" class="multiline_textfield"></textarea>
    <!--<input id="memo" name="memo" type="text">-->
    <div><input class="submit_button" type=submit value="Submit"></div>
</form>
<?php endif;?>