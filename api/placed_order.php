<?php
require 'connection.php';

$data = array();

// Sanitize and validate user input

    $user_id = $_REQUEST['user_id'];
    $cart_id=$_REQUEST['cart_id'];

    // Begin transaction
  

    // Update checkout status in cart table
  

  
        $sq = "SELECT * FROM cart WHERE user_id = $user_id AND checkout_status = 0";
        $res = $con->query($sq);
          $sql = "UPDATE cart SET checkout_status = 2 WHERE user_id = $user_id ";
    $result = $con->query($sql);

        // Iterate over cart items and insert billing entries
        while ($ro = $res->fetch_assoc()) {
            $user_id = $ro['user_id'];
            $cart_id = $ro['id'];
            $product_id = $ro['product_id'];
            $quantity=$ro['quantity'];
 $sql2 = "UPDATE product SET quantity = quantity-$quantity WHERE id=$product_id ";
    $result2 = $con->query($sql2);

            $sql1 = "INSERT INTO payment (user_id, cart_id, product_id, order_status) VALUES ($user_id, $cart_id, $product_id, 0)";
            $result1 = $con->query($sql1);
           
}

            // Rollback transaction if insertion fails
            if (!$result1) {
               // $con->rollback();
                $data = array("status" => false, "message" => "Order placement failed");
               
            }
        

        // Commit transaction if all insertions were successful
        else {
           // $con->commit();
            $data = array("status" => true, "message" => "Order placed");
        }
   


// Close connection
//$con->close();

// Encode response as JSON and output
echo json_encode($data);
?>
