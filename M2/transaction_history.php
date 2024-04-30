<?php
require(__DIR__ . "/partials/nav.php");
?>
<h1 class="page_name_header">Transaction History</h1>
<?php
if (isset($_POST)) {
    // Retrieve the clicked account # from the POST request
    $account_num = $_POST['account_number'];
    //echo var_dump($_POST);
    //echo $account_num;
    $db = getDB();
    $stmt = $db->prepare("SELECT `id` FROM `Accounts` WHERE `account_number` = :account_number");
    try {
        // Get the id # associated with the clicked account # from the Accounts table
        $stmt->execute(['account_number' => $account_num]);
        $result = $stmt->fetch();
        $id = $result['id'];
        echo "$account_num $id";
        // Get all records from the Transactions table where 
        // account_src == clicked account # or account_dest == clicked account #
        $stmt = $db->prepare("SELECT `account_src`, `account_dest`, `transaction_type`, `balance_change`, `created`, `expected_total`, `memo` FROM `Transactions` WHERE (`account_src` = :account_id) OR (`account_dest` = :account_id)");
        $stmt->execute(['account_id' => $id]);
        $result = $stmt->fetch();
        if ($result) {
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            echo var_dump($records);
        }
    } catch (Exception $e) {
        echo var_dump($e);
    }
}
?>
<div id="transaction_history_go_back"><a href="accounts.php">Back to My Accounts</a></div>