<?php require_once __DIR__ . "/../../database/database.php";

// GetAll customers
$customers = $customerDB->getAll();


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $customerDB->delete($id);
    header("Location: display-customer.php");
}
