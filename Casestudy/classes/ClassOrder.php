<?php
require_once "database.php";
class Order
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function create($customer_id)
    {
        $query = "INSERT INTO orders (customer_id) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $customer_id);
        $stmt->execute();
        return true;
    }
    public function getAll()
    {
        $query = "SELECT * FROM orders";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getById($order_id)
    {
        $query = "SELECT * FROM orders WHERE order_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $order_id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getCustomerById($order_id)
    {
        $query = "SELECT customers.name,customers.email,customers.phone,orders.order_id,orders.order_date,orders.shipper_date,orders.status
        FROM orders INNER JOIN customers ON orders.customer_id = customers.customer_id WHERE orders.order_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $order_id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getByStatus($status = "On Hold")
    {
        $query = "SELECT * FROM orders WHERE status = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $status);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getId($id)
    {
        $query = "SELECT * FROM orders WHERE order_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function update($shipper_date, $status, $customer_id, $order_id)
    {
        $query = "UPDATE orders SET shipper_date = ?, status = ?,customer_id = ? WHERE order_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $shipper_date);
        $stmt->bindParam(2, $status);
        $stmt->bindParam(3, $customer_id);
        $stmt->bindParam(4, $order_id);
        $stmt->execute();
        return true;
    }
    public function updateStatus($status, $order_id)
    {
        $query = "UPDATE orders SET status = ? WHERE order_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $status);
        $stmt->bindParam(2, $order_id);
        $stmt->execute();
        return true;
    }
    public function delete($id)
    {
        $query = "DELETE FROM orders WHERE order_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return true;
    }
    public function getLastInsertId()
    {
        return $this->db->lastInsertId();
    }
}
$orderDB = new Order($pdo);
