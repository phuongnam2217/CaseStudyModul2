<?php



class Product
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function create($name, $cate, $slug, $price, $image1, $image2, $stock, $description)
    {
        $query = "INSERT INTO products (product_name, product_line,slug, price , image1, image2, stock,description)
        VALUES (?,?,?,?,?,?,?,?);";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $cate);
        $stmt->bindParam(3, $slug);
        $stmt->bindParam(4, $price);
        $stmt->bindParam(5, $image1);
        $stmt->bindParam(6, $image2);
        $stmt->bindParam(7, $stock);
        $stmt->bindParam(8, $description);
        $stmt->execute();
    }
    public function getAll()
    {
        $query = "SELECT * FROM products;";
        $stmt = $this->db->query($query);
        $products = $stmt->fetchAll();
        return $products;
    }
    public function getId($id)
    {
        $query = "SELECT * FROM products WHERE product_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $product = $stmt->fetch();
        return $product;
    }
    public function getSlug($slug)
    {
        $query = "SELECT * FROM products WHERE slug = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $slug);
        $stmt->execute();
        $product = $stmt->fetch();
        return $product;
    }
    public function search($search)
    {
        $query =    
        $stmt = $this->db->query($query);
        $products = $stmt->fetchAll();
        return $products;
    }
    public function getByCategory($category, $start, $limit)
    {
        $query = "SELECT * FROM products WHERE product_line = '$category' LIMIT $start, $limit;";
        $stmt = $this->db->query($query);
        $products = $stmt->fetchAll();
        return $products;
    }
    public function getBySelect($select, $limit)
    {
        $query = "SELECT * FROM products ORDER BY $select DESC LIMIT 0, $limit;";
        $stmt = $this->db->query($query);
        $products = $stmt->fetchAll();
        return $products;
    }
    public function update($name, $cate, $slug, $price, $image1, $image2, $stock, $id)
    {
        $query = "UPDATE products
        SET product_name = ? , product_line = ?, slug = ?,
         price = ?, image1 = ?, image2 = ?, stock = ? 
         WHERE product_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $cate);
        $stmt->bindParam(3, $slug);
        $stmt->bindParam(4, $price);
        $stmt->bindParam(5, $image1);
        $stmt->bindParam(6, $image2);
        $stmt->bindParam(7, $stock);
        $stmt->bindParam(8, $id);
        $stmt->execute();
    }
    public function delete($id)
    {
        $query = "DELETE FROM products WHERE product_id = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }
    public function getQuery($query)
    {
        $stmt = $this->db->query($query);
        $products = $stmt->fetchAll();
        return $products;
    }
    public function increase($column, $column2, $slug, $qty = 1)
    {
        $query = "UPDATE products SET $column = $column+$qty WHERE $column2 = '$slug';";
        $this->db->query($query);
    }
    public function decrease($column, $id, $qty)
    {
        $query = "UPDATE products SET $column = $column-$qty WHERE product_id = '$id';";
        $this->db->query($query);
    }
}
