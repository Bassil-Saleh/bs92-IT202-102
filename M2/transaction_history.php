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
        //echo "$account_num $id";
        // Get all records from the Transactions table where 
        // account_src == clicked account # or account_dest == clicked account #
        $stmt = $db->prepare("SELECT `account_src`, `account_dest`, `transaction_type`, `balance_change`, `created`, `expected_total`, `memo` FROM `Transactions` WHERE (`account_src` = :account_id) OR (`account_dest` = :account_id)");
        $stmt->execute(['account_id' => $id]);
        $result = $stmt->fetch();
        if ($result) {
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            //echo var_dump($records);
        }
    } catch (Exception $e) {
        echo var_dump($e);
    }
}
?>
<table>
    <thead>
        <tr>
            <th>Source Account</th>
            <th>Destination Account</th>
            <th>Transaction Type</th>
            <th>Balance Change</th>
            <th>Date of Transaction</th>
            <th>Expected Total</th>
            <th>Memo</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($records)):?>
            <tr>
                <td colspan="%100">No transaction(s) found on this account.</td>
            </tr>
        <?php else:?>
            <?php foreach($records as $transaction):?>
                <!-- Retrieve the account #'s associated with the account_src and account_dest of each transaction -->
                <?php
                    $source_id = $transaction['account_src'];
                    $destination_id = $transaction['account_dest'];
                    $stmt = $db->prepare("SELECT `account_number` FROM `Accounts` WHERE `id` = :source_id");
                    try {
                        // Retrieve the account # associated with the source account
                        $stmt->execute(['source_id' => $source_id]);
                        $result = $stmt->fetch();
                        $source_account_num = $result['account_number'];
                    } catch (Exception $e) {
                        echo var_dump($e);
                    }
                    $stmt = $db->prepare("SELECT `account_number` FROM `Accounts` WHERE `id` = :destination_id");
                    try {
                        // Retrieve the account # associated with the destination account
                        $stmt->execute(['destination_id' => $destination_id]);
                        $result = $stmt->fetch();
                        $destination_account_num = $result['account_number'];
                    } catch (Exception $e) {
                        echo var_dump($e);
                    }
                ?>
                <tr>
                    <td><?php se($source_account_num);?></td>
                    <td><?php se($destination_account_num);?></td>
                    <td><?php se($transaction['transaction_type']);?></td>
                    <td><?php se("$" . substr($transaction['balance_change'], 0, -2));?></td>
                    <td><?php se($transaction['created']);?></td>
                    <td><?php se($transaction['expected_total']);?></td>
                    <td><?php se($transaction['memo']);?></td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
    </tbody>
</table>
<div id="transaction_history_go_back"><a href="accounts.php">Back to My Accounts</a></div>