<?php
require(__DIR__ . "/partials/nav.php");
?>
<h1 class="page_name_header">Transaction History</h1>
<?php
if (isset($_POST)) {
    echo var_dump($_POST);
}
?>
<div id="transaction_history_go_back"><a href="accounts.php">Back to My Accounts</a></div>