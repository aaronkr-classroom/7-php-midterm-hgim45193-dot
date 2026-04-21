<?php include 'includes/header.php'; ?>

<?php
$products = [
    [
        'name' => '키보드',
        'price' => 30000,
        'stock' => 10
    ],
    [
        'name' => '마우스',
        'price' => 15000,
        'stock' => 3
    ],
    [
        'name' => '모니터',
        'price' => 120000,
        'stock' => 0
    ]
];

function getStockMessage($stock)
{
    if ($stock >= 5) {
        return ['msg' => '재고 충분', 'color' => 'green'];
    } elseif ($stock >= 1 && $stock <= 4) {
        return ['msg' => '재고 부족', 'color' => 'orange'];
    } else {
        return ['msg' => '품절', 'color' => 'red'];
    }
    // 재고가 5개 이상이면 "재고 충분"
    // 재고가 1개 이상 4개 이하이면 "재고 부족"
    // 재고가 0개이면 "품절"
}
?>

<table>
    <tr>
        <th>상품명</th>
        <th>가격</th>
        <th>재고</th>
        <th>재고 상태</th>
    </tr>

    <?php 
        $totalAmount = 0;
        $productCount = count($products); // 상품 수 자동 계산

    foreach ($products as $product) { 
        $subtotal = $product['price'] * $product['stock'];
        $totalAmount += $subtotal;

        $stockInfo = getStockMessage($product['stock']);
    ?>

    <tr>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo number_format($product['price']); ?>원</td>
        <td><?php echo $product['stock']; ?></td>
        <td style="color: <?php echo $stockInfo['color']; ?>">
            <?php echo $stockInfo['msg']; ?>
        </td>
    </tr>
    
    <?php } ?>
</table>

<p><strong>총 상품 수: <?php echo $productCount; ?>개</strong></p>
<p><strong>총 재고 금액: <?php echo number_format($totalAmount); ?>원</strong></p>

<?php include 'includes/footer.php'; ?>