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
            $stmt = $db->prepare("INSERT INTO Accounts (account_number, user_id, balance, account_type) VALUES (:account_number, :user_id, :balance, :account_type)");
            $stmt->execute(["account_number" => $account_num, "user_id" => $user_id, "balance" => $initial_deposit, "account_type" => "checking"]);
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