<!DOCTYPE html>
<html>
<head>
    <title>Каталог товаров</title>
    <style>
        .row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .collection-header, .product-card {
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
            padding: 20px;
            border: 1px solid #ddd;
            background: #fff;
        }
        .collection-header {
            background: #f8f9fa;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php foreach ($rows as $row): ?>
    <div class="row">
        <?php foreach ($row as $element): ?>
            <?php if ($element['type'] === 'collection'): ?>
                <div class="collection-header">
                    <?= htmlspecialchars($element['name']) ?>
                </div>
            <?php else: ?>
                <div class="product-card">
                    <h3><?= htmlspecialchars($element['product']->name) ?></h3>
                    <p>Цена: <?= number_format($element['product']->price, 2) ?> руб.</p>
                    <p>Коллекция: <?= htmlspecialchars($element['product']->collection_name) ?></p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
</body>
</html>