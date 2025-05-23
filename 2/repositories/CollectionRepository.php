<?php
require_once __DIR__ . '/../config/.db.php';
require_once __DIR__ . '/../models/Collection.php';
require_once __DIR__ . '/../models/Product.php';

class CollectionRepository {
    public static function getAllCollectionsWithProducts() {
        global $db;
        $stmt = $db->query("
            SELECT c.id AS collection_id, c.name AS collection_name, 
                   p.id AS product_id, p.name AS product_name, p.price 
            FROM collections c 
            LEFT JOIN products p ON c.id = p.collection_id 
            ORDER BY c.id, p.id
        ");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $collections = [];
        $currentCollectionId = null;
        
        foreach ($results as $row) {
            if ($currentCollectionId != $row['collection_id']) {
                $collection = new Collection();
                $collection->id = $row['collection_id'];
                $collection->name = $row['collection_name'];
                $collections[] = $collection;
                $currentCollectionId = $row['collection_id'];
            }
            
            if (!empty($row['product_id'])) {
                $product = new Product();
                $product->id = $row['product_id'];
                $product->name = $row['product_name'];
                $product->price = $row['price'];
                $product->collection_id = $row['collection_id'];
                $product->collection_name = $row['collection_name'];
                $collection->products[] = $product;
            }
        }
        return $collections;
    }
}
?>