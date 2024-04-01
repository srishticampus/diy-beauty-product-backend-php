<?php
require 'connection.php';
$data = array();
$userid = $_REQUEST['userid'];
$sql = "SELECT cart.id AS cart_id, product.id AS product_id, product.image, cart.quantity, product.product_name, product.price FROM cart INNER JOIN product ON cart.product_id=product.id WHERE cart.user_id=$userid AND cart.checkout_status=0";
$result = $con->query($sql);
$count = $result->num_rows;
if ($count > 0) {
    $sum = 0; // Add semicolon here
    while ($row = $result->fetch_assoc()) {
        $itemTotal = $row['quantity'] * $row['price']; // Calculate item total
        $sum += $itemTotal; // Add item total to the sum
        $data[] = array(
            "cart_id" => $row['cart_id'],
            "product_id" => $row['product_id'],
            "image" => "http://campus.sicsglobal.co.in/Project/Diy_product/Creator/uploads/" . $row['image'],
            "product_name" => $row['product_name'],
            "price" => $row['price'],
            "quantity" => (($row['quantity']==null)?1:$row['quantity']),
            "item_total" => $itemTotal // Store item total instead of sum
        );
    }
    $post = array(
        "status" => true,
        "message" => "Cart Details",
        "cart_Details" => $data,
        "total_sum" => $sum ,
        "deliveryFee"=>50// Include total sum in the response
    );
} else {
    $post = array(
        "status" => false,
        "message" => "No Details",
        "cart_Details" => $data
    );
}
echo json_encode($post);
?>
