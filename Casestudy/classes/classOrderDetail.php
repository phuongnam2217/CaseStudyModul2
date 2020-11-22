<?php
require_once "database.php";
class OrderDetail
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function create($order_id, $product_id, $qty, $price)
    {
        $query = "INSERT INTO orderdetails (order_id,product_id,quantityOrdered,priceEach)
                    VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $order_id);
        $stmt->bindParam(2, $product_id);
        $stmt->bindParam(3, $qty);
        $stmt->bindParam(4, $price);
        $stmt->execute();
        return true;
    }

    public function getAll()
    {
        $query = "SELECT customers.name,orders.order_id,orders.status,orderdetails.product_id,orderdetails.quantityOrdered,orderdetails.priceEach,(orderdetails.quantityOrdered*orderdetails.priceEach) as total 
        FROM ((orders INNER JOIN customers ON orders.customer_id = customers.customer_id)
         INNER JOIN orderdetails ON orders.order_id = orderdetails.order_id) ORDER BY order_id asc";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll();
    }
    public function getByOrderId($order_id)
    {
        $query = "SELECT products.product_id,products.product_name,orderdetails.quantityOrdered,orderdetails.priceEach,(orderdetails.quantityOrdered*orderdetails.priceEach) as total
        FROM products INNER JOIN orderdetails ON products.product_id = orderdetails.product_id WHERE orderdetails.order_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $order_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete($order_id, $product_id)
    {
        $query = "DELETE FROM orderdetails WHERE order_id = ? AND product_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $order_id);
        $stmt->bindParam(2, $product_id);
        $stmt->execute();
        return true;
    }
}
$orderDetailDB = new OrderDetail($pdo);
