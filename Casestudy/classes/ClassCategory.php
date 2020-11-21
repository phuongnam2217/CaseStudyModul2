<?php

class Category
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getAll()
    {
        $query = "SELECT * FROM product_lines;";
        $stmt = $this->db->query($query);
        $categories = $stmt->fetchAll();
        return $categories;
    }
    public function create($name, $description)
    {
        $query = "INSERT INTO product_lines (product_line,description) VALUES (?,?);";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $description);
        $stmt->execute();
    }
    public function delete($name)
    {
        $query = "DELETE FROM product_lines WHERE product_line = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->execute();
    }
    public function getName($name)
    {
        $query = "SELECT * FROM product_lines WHERE product_line = '$name';";
        $stmt = $this->db->query($query);
        $category = $stmt->fetch();
        return $category;
    }
    public function update($name, $description, $editName)
    {
        $query = "UPDATE product_lines SET product_line = ?,description = ? WHERE product_line = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $description);
        $stmt->bindParam(3, $editName);
        $stmt->execute();
    }
}
