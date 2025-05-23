<?php
require_once __DIR__ . '/../repositories/CollectionRepository.php';

class ProductsController {
    public function index() {
        $collections = CollectionRepository::getAllCollectionsWithProducts();
        
        // Формируем плоский список элементов
        $elements = [];
        foreach ($collections as $collection) {
            $elements[] = ['type' => 'collection', 'name' => $collection->name];
            foreach ($collection->products as $product) {
                $elements[] = ['type' => 'product', 'product' => $product];
            }
        }
        
        // Группируем элементы в строки по правилам
        $rows = [];
        $currentRow = [];
        foreach ($elements as $element) {
            if (count($currentRow) === 2 && $element['type'] === 'collection') {
                $rows[] = $currentRow;
                $currentRow = [];
            }
            $currentRow[] = $element;
            if (count($currentRow) === 3 || $element['type'] === 'collection') {
                $rows[] = $currentRow;
                $currentRow = [];
            }
        }
        if (!empty($currentRow)) {
            $rows[] = $currentRow;
        }
        
        // Передача данных в представление
        require __DIR__ . '/../view/products/index.php';
    }
}
?>