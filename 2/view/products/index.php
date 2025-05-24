<!DOCTYPE html>
<html>
<head>
    <title>Каталог товаров</title>
    <style>
        * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body {
	font-family: 'Arial', sans-serif;
	margin: 0;
	padding: 20px;
	background-color: #f5f5f5;
	color: #212121;
}
.row {
	display: flex;
	flex-wrap: wrap;
	max-width: 100vw;
	gap: 20px;
	margin-bottom: 20px;
}
.collection-header,
.product-card {
	flex: 1 1 calc(33.333% - 20px);
	box-sizing: border-box;
	padding: 20px;
	border: 1px solid #ddd;
	background: #fff;
}

</style>
</head>
<body>
    <div class="row">
    <?php $cnt = 0;
    foreach ($rows as $row): ?>
        <?php foreach ($row as $element): 
            $cnt++;
            ?>
            <?php if ($element['type'] === 'collection'): ?>
                <?php if ($cnt % 3 === 0): 
                    $cnt++; ?>
                    <div class="collection-header"></div>
                <?php endif; ?>
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
    <?php endforeach; ?>

    <?php for ($i = $cnt % 3? : 3; $i < 3 ; $i++): ?>
        <div class="collection-header"></div>
    <?php endfor; ?>
    </div>
</body>
</html>