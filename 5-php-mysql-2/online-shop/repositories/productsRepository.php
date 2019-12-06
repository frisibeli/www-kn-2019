<?php
class ProductsRepository{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllProducts()
    {
        $stmt = $this->connection->query("SELECT * FROM shop_items", PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function get($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM shop_items WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function search($query)
    {
        $stmt = $this->connection->prepare("SELECT * FROM shop_items WHERE name LIKE :name OR description LIKE :description");
        $query = [
            'name' => "Value",
            'description' => "Value desc"
        ];
        $stmt->execute($query);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function create($product)
    {
        $stmt = $this->connection->prepare("INSERT INTO shop_items (name, description, image, price) VALUES (:name, :description, :image, :price)");
        return $stmt->execute($product);
    }
}