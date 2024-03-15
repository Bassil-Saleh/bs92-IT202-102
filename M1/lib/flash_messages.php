<?php
function flash($msg = "", $color = "info")
{
    $message = ["text" => $msg, "color" => $color];
    if (isset($_SESSION['flash'])) {
        array_push($_SESSION['flash'], $message);
    } else {
        $_SESSION['flash'] = array();
        array_push($_SESSION['flash'], $message);
    }
}

function getMessages()
{
    if (isset($_SESSION['flash'])) {
        $flashes = $_SESSION['flash'];
        $_SESSION['flash'] = array();
        return $flashes;
    }
    return array();
}

function displayFlashMessages() {
    if (!isset($_SESSION['flash'])) {
        return null;
    }
    $all_msg = getMessages();
    foreach ($all_msg as $msg) {
        $text = $msg['text'];
        $color = $msg['color'];
        $output = sprintf('<div class="%s">%s</div>',$color,$text);
        echo $output;
    }

}