<?php

require_once 'Database.php';

abstract class Table
{
    protected PDO $pdo;
    
    public function __construct(
        protected string $name
    )
    {
        $this->pdo = Database::getConnection();
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM " . $this->name);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM " . $this->name . " WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result === false) {
            return null;
        }

        return $result;
    }
    public function ShowProduct():array
    {
        $stmt=$this->pdo->query("SELECT product.name, product.price_vat_free, product.cover, product.description, category.name AS nom_categorie
        FROM product
        INNER JOIN category ON product.category_id = category.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
