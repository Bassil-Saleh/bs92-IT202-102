<?php
require(__DIR__ . "/partials/nav.php");
?>
<h1 class="page_name_header">My Accounts</h1>
<?php
$username = $_SESSION["user"]["username"];
$db = getDB();
// Retrieve the user's ID # from the `Users` table
$stmt = $db->prepare("SELECT id FROM Users WHERE username = :username");
try {
    // Retrieve the user's ID # from the `Users` table
    $stmt->execute(["username" => $username]);
    $result = $stmt->fetch();
    $user_id = $result["id"]; // From `Users` table
    // Now retrieve the accounts associated with the logged in user
    $stmt = $db->prepare("SELECT `account_number`, `account_type`, `balance`, `modified` FROM `Accounts` WHERE (`user_id` = :user_id) AND (NOT `account_type` = \"world\") ORDER BY `id`");
    try {
        $result = $stmt->execute(["user_id" => $user_id]);
        if ($result) {
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
    } catch (Exception $e) {
        echo var_dump($e);
    }
} catch (Exception $e) {
    echo var_dump($e);
}
?>
<table>
    <thead>
        <tr>
            <th>Account #</th>
            <th>Account Type</th>
            <th>Balance</th>
            <th>Date Modified</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($records)):?>
            <tr>
                <td colspan="100%">No bank account(s) found.</td>
            </tr>
        <?php else:?>
            <?php foreach($records as $account):?>
                <tr>
                    <td><a href="transaction_history.php"><?php se($account['account_number']);?></a></td>
                    <td><?php se($account['account_type']);?></td>
                    <td><?php se($account['balance']);?></td>
                    <td><?php se($account['modified']);?></td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
    </tbody>
</table>