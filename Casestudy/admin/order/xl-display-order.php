<?php
require_once "../../classes/ClassOrder.php";
require_once "../../classes/classOrderDetail.php";

$orders = $orderDB->getByStatus();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $orderDB->updateStatus("Canceled", $order_id);
    header("Location: display-order.php");
}
