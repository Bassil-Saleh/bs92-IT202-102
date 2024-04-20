<?php
require(__DIR__ . "/partials/nav.php");
?>
<?php
if (isset($_POST["initial_deposit"])) {
    $initial_deposit = se($_POST, "initial_deposit", "", false);
    // In case the HTML validation doesn't catch invalid input:
    $hasError = false;
    if (empty($initial_deposit)) {
        echo "<div class=\"create_account_msg\">Initial deposit must not be empty.</div>";
        $hasError = true;
    }
    if (($initial_deposit < 5) || ($initial_deposit > 1000000)) {
        echo "<div class=\"create_account_msg\">Initial deposit must be between $5 to $1,000,000 (inclusive).</div>";
        $hasError = true;
    }
    if (!$hasError) {
        $username = $_SESSION["user"]["username"];
        $db = getDB();
        // Retrieve the user's ID # from the `Users` table
        $stmt = $db->prepare("SELECT id FROM Users WHERE username = :username");
        try {
            // Retrieve the user's ID # from the `Users` table
            $stmt->execute(["username" => $username]);
            $result = $stmt->fetch();
            $user_id = $result["id"]; // From `Users` table
            $row_count = 0;
            do {
                // Generate a random 12-digit account number with leading zeroes.
                $account_num = rand(1,999999999999); // Account #000000000000 is reserved for the world account
                $account_num = sprintf('%012d', $account_num); // Add leading zeroes
                // If the account number already exists in the `Accounts` table, 
                // then regenerate a new one and try again; keep trying until no collision occurs.
                $stmt = $db->prepare("SELECT * FROM Accounts WHERE account_number = :account_number");
                $stmt->execute(["account_number" => $account_num]);
                $row_count = $stmt->rowCount();
            } while ($row_count != 0);
            // Try making a new record in the `Accounts` table with the new account #.
            // Don't update the account's balance directly; make a transaction pair
            // between the new bank account and the world bank account.
            $stmt = $db->prepare("INSERT INTO Accounts (account_number, user_id, account_type) VALUES (:account_number, :user_id, :account_type)");
            $stmt->execute(["account_number" => $account_num, "user_id" => $user_id, "account_type" => "checking"]);
            // Now make a transaction pair between the new user account and the world account.
            $memo = "Initial deposit for new account";
            $transaction_type = "deposit";
            // Get the id # of the world account from `Accounts`
            $stmt = $db->prepare("SELECT id FROM Accounts WHERE account_type = \"world\"");
            $stmt->execute();
            $result = $stmt->fetch();
            $world_id = $result["id"];
            // Get the id # of the new account from `Accounts`
            $stmt = $db->prepare("SELECT id FROM Accounts WHERE account_number = :account_number");
            $stmt->execute(["account_number" => $account_num]);
            $result = $stmt->fetch();
            $new_acct_id = $result["id"];
            // Withdraw money from the world account (using $initial_deposit).
            // World account balance change = (current world account balance) - (initial deposit)
            $stmt = $db->prepare("SELECT `balance` FROM `Accounts` WHERE `account_type` = \"world\"");
            $stmt->execute();
            $result = $stmt->fetch();
            $world_acct_curr_bal = $result["balance"];
            $world_acct_curr_bal -= $initial_deposit;
            
            // Insert the 1st transaction pair into the `Transactions` table.
            $stmt = $db->prepare("INSERT INTO `Transactions` (`account_src`, `account_dest`, `balance_change`, `transaction_type`, `memo`, `expected_total`) VALUES (:account_src, :account_dest, :balance_change, :transaction_type, :memo, :expected_total)");
            $stmt->execute(["account_src" => $new_acct_id, "account_dest" => $world_id, "balance_change" => -$initial_deposit, "transaction_type" => $transaction_type, "memo" => $memo, "expected_total" => $world_acct_curr_bal]);
            // Now update the world account's balance after inserting the 1st half of the transaction pair.
            $stmt = $db->prepare("UPDATE Accounts SET balance = :new_bal WHERE id = :world_id");
            $stmt->execute(["new_bal" => $world_acct_curr_bal, "world_id" => $world_id]);

            // Make the 2nd half of the transaction pair.
            $stmt = $db->prepare("INSERT INTO `Transactions` (`account_src`, `account_dest`, `balance_change`, `transaction_type`, `memo`, `expected_total`) VALUES (:account_src, :account_dest, :balance_change, :transaction_type, :memo, :expected_total)");
            $stmt->execute(["account_src" => $world_id, "account_dest" => $new_acct_id, "balance_change" => $initial_deposit, "transaction_type" => $transaction_type, "memo" => $memo, "expected_total" => $initial_deposit]);
            // Update the new account's balance with the initial deposit.
            $stmt = $db->prepare("UPDATE Accounts SET balance = :new_bal WHERE id = :new_acct_id");
            $stmt->execute(["new_bal" => $initial_deposit, "new_acct_id" => $new_acct_id]);

            // $stmt = $db->prepare("INSERT INTO Accounts (account_number, user_id, balance, account_type) VALUES (:account_number, :user_id, :balance, :account_type)");
            // $stmt->execute(["account_number" => $account_num, "user_id" => $user_id, "balance" => $initial_deposit, "account_type" => "checking"]);
            flash("New bank account successfully created.", "success");
            die(header("Location: dashboard.php"));
        } catch (Exception $e) {
            echo "<div class=\"create_account_msg\">An error occured with inserting the account into the database.</div>";
        }
    }
}
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