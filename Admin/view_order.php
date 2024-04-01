<?php
include 'header.php';
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Order</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">View</li>
          <li class="breadcrumb-item active">Order</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Order</h5>
             

              <!-- Table with stripped rows -->
              <div class="box-body table-responsive">
              <table class="table datatable" style="overflow: auto;">
                <thead>
            <tr>
                <th>Slno</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>User Name</th>
                <th>Creator Name</th>
                <th>Phone</th>
                <th>Product Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
$sql=" SELECT creator.name as cname,product.image,product.product_name,cart.quantity,user.name,user.phone FROM `product` INNER join cart on cart.product_id=product.id INNER JOIN payment on payment.cart_id=cart.id INNER JOIN user on user.id= payment.user_id INNER JOIN creator on creator.id=product.creator_id ";
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
                 <td><?php echo $row['cname'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><img width="100" height="100" src="../Creator/uploads/<?php echo $row['image'];?>"></td>
                <td>Product Placed</td>
            </tr>
        <?php
    }
}
            ?>
           
        </tbody>
              </table>
            </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
include 'footer.php';
  ?>
