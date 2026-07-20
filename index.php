<?php
    require_once "data.php";

    $categoryMap = [];
    foreach ( $categories as $c) {
        $categoryMap[$c['id']] = $c['name'];
    }

$tong = 0;
foreach ($products as $p) {
    $tong += $p['price'] * $p['qty'];
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>MiniShop — Catalog (Buoi 1)</title>
</head>
<body>
    <h1>MiniShop — Catalog (Buoi 1)</h1>

    <table border="1" cellpadding="6">
        <thead>
            <tr>
                <th>SKU</th>
                <th>Ten</th>
                <th>Danh muc</th>
                <th>Gia</th>
                <th>So luong</th>
                <th>Thanh tien</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $p):
            $thanhTien = $p['price'] * $p['qty'];
            $tenDm = $categoryMap[$p['category_id']] ?? '—';
        ?>
            <tr>
                <td><?php echo htmlspecialchars($p['sku'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($tenDm, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo $p['price']; ?></td>
                <td><?php echo $p['qty']; ?></td>
                <td><?php echo $thanhTien; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p>So san pham = <?php echo count($products); ?></p>
    <p>Tong gia tri kho = <?php echo $tong; ?></p>
<!-- MS_EXPECT product_count=8 inventory_value=41380000 -->

    <h2>Debug</h2>
    <pre><?php var_dump($products); ?></pre>
</body>
</html>