<?php
require_once "database.php";
class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function create($name, $password, $email, $phone)
    {
        $query = "INSERT INTO users (name,password,email,phone) VALUES (?,?,?,?);";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $phone);
        $stmt->execute();
        return true;
    }
    public function getAll()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll();
    }
    public function getById($id)
    {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function updateInfo($name, $phone, $role, $id)
    {
        $query = "UPDATE users SET name = ?, phone = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $phone);
        $stmt->bindParam(3, $role);
        $stmt->bindParam(4, $id);
        $stmt->execute();
        return true;
    }
    public function updatePass($password, $id)
    {
        $query = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $password);
        $stmt->bindParam(2, $id);
        $stmt->execute();
        return true;
    }
    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return true;
    }
}
$userDB = new User($pdo);
