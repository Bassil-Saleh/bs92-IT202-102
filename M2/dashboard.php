<?php
require(__DIR__ . "/partials/nav.php");
displayFlashMessages();
?>
<h1 class="page_name_header">Dashboard</h1>
<nav class="dashboard_menu">
    <ul>
        <li><a href="create_account.php">Create Bank Account</a></li>
        <li><a href="accounts.php">My Accounts</a></li>
        <li><a href="deposit_or_withdraw.php">Deposit</a></li>
        <li><a href="#">Withdraw</a></li>
        <li><a href="transfer.php">Transfer</a></li>
        <li><a href="profile.php">Profile</a></li>
    </ul>
</nav>