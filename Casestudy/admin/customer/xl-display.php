<?php require_once "../../classes/ClassCustomer.php";

// GetAll customers
$customers = $customerDB->getAll();


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $customerDB->delete($id);
    header("Location: display-customer.php");
}
