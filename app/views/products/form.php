<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($form_title); ?> | Product Archive</title>
    <?php include APP_DIR . 'views/products/styles.php'; ?>
</head>
<body>
    <div class="shell">
        <header class="topbar"><a class="brand" href="<?= site_url('product'); ?>">product<span>/</span>archive</a><nav><a href="<?= site_url('product'); ?>">Back to archive</a></nav></header>
        <main class="form-frame">
            <p class="eyebrow">Product details</p>
            <h1><?= htmlspecialchars($form_title); ?></h1>
            <form class="form" method="post" action="<?= htmlspecialchars($form_action); ?>">
                <div class="field"><label for="product_name">Product name</label><input id="product_name" name="product_name" type="text" maxlength="100" value="<?= htmlspecialchars($product['product_name'] ?? ''); ?>" required></div>
                <div class="field"><label for="description">Description</label><textarea id="description" name="description"><?= htmlspecialchars($product['description'] ?? ''); ?></textarea></div>
                <div class="split"><div class="field"><label for="price">Price</label><input id="price" name="price" type="number" min="0" step="0.01" value="<?= htmlspecialchars($product['price'] ?? '0.00'); ?>" required></div><div class="field"><label for="quantity">Quantity</label><input id="quantity" name="quantity" type="number" min="0" step="1" value="<?= htmlspecialchars($product['quantity'] ?? '0'); ?>" required></div></div>
                <div class="form-actions"><button class="button" type="submit">Save product</button><a class="button secondary" href="<?= site_url('product'); ?>">Cancel</a></div>
            </form>
        </main>
    </div>
</body>
</html>