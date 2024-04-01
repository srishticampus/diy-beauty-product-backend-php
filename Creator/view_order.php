<?php
    include 'header2.php';
   session_start();
$creator_id=$_SESSION['creator'];
require 'connection.php';
?>
    <!-- Navbar End -->
  


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.css">

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Products</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Products</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-2 col-md-12"></div>
            <div class="col-lg-8 col-md-12">
                <!-- Price Start -->
              <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Slno</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>User Name</th>
                <th>Phone</th>
                <th>Product Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
$sql=" SELECT product.image,product.product_name,cart.quantity,user.name,user.phone FROM `product` INNER join cart on cart.product_id=product.id INNER JOIN payment on payment.cart_id=cart.id INNER JOIN user on user.id= payment.user_id where product.creator_id=$creator_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
    while($row=$result->fetch_assoc()){
        ?>
         <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['product_name'];?></td>
               
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><img width="100" height="100" src="uploads/<?php echo $row['image'];?>"></td>
                <td>Product Placed</td>
            </tr>
        <?php
    }
}
            ?>
           
        </tbody>
    </table>

                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->
<div class="col-lg-2 col-md-12"></div>

            <!-- Shop Product Start -->
        
                
           
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
   <?php
include 'footer.php';
   ?>
   




   <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.js"></script>
   <script type="text/javascript">
       new DataTable('#example');
   </script>