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
                    <td>
                        <!-- Style the POST HTML form for each account number as if it were a link. -->
                        <form method="POST" action="transaction_history.php" class="clickable_account_number_form">
                            <input type="hidden" value="<?php se($account['account_number']) ?>" name="account_number">
                            <button type="submit" name="account_number" value="<?php se($account['account_number']) ?>" class="account_number_button" formmethod="post">
                                <?php se($account['account_number']);?>
                            </button>
                        </form>
                    </td>
                    <!--<td><a href="transaction_history.php"></a></td>-->
                    <td><?php se($account['account_type']);?></td>
                    <td><?php se($account['balance']);?></td>
                    <td><?php se($account['modified']);?></td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
    </tbody>
</table>