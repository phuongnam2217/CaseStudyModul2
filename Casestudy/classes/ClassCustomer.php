<?php
require_once "database.php";
class Customer
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function create($name, $password, $email, $phone, $address)
    {
        $query = "INSERT INTO customers (name,password,email,phone,address) 
                    VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $phone);
        $stmt->bindParam(5, $address);
        $stmt->execute();
        return true;
    }
    public function getAll()
    {
        $query = "SELECT * FROM customers";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll();
    }
    public function getById($id)
    {
        $query = "SELECT * FROM customers WHERE customer_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function updateInfo($name, $address, $phone, $id)
    {
        $query = "UPDATE customers SET name = ?, address = ?, phone = ? WHERE customer_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $address);
        $stmt->bindParam(3, $phone);
        $stmt->bindParam(4, $id);
        $stmt->execute();
        return true;
    }
    public function updatePass($password, $id)
    {
        $query = "UPDATE customers SET password = ? WHERE customer_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $password);
        $stmt->bindParam(2, $id);
        $stmt->execute();
        return true;
    }
    public function delete($id)
    {
        $query = "DELETE FROM customers WHERE customer_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return true;
    }
    public function getLastInsert()
    {
        return $this->db->lastInsertId();
    }
}
$customerDB = new Customer($pdo);
