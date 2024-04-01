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
                <p class="m-0">View Products</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
         <?php
                    if(isset($_GET['status'])){
                        $msg=$_GET['status'];
                        if($msg=='success'){
                            echo ' <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Updated Successfully
  </div>';
                        }
                        else if($msg=='failed'){
                                   echo ' <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> updated Failed
  </div>';
                        }

                    }

                ?>
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
                <th>Category</th>
                <th>Quantity</th>
                <th>image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
$sql="select * from product where  creator_id=$creator_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
    while($row=$result->fetch_assoc()){
        ?>
         <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['product_name'];?></td>
                <td>
                    <?php
$category_id=$row['category_id'];
$sq="select * from category where id=$category_id";
$res=$con->query($sq);
$ro=$res->fetch_assoc();
echo $ro['category_name'];

                ?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><img width="100" height="100" src="uploads/<?php echo $row['image'];?>"></td>
                <td><a href="product_edit.php?id=<?php echo $row['id'];?>">View</a>|
                    <a href="product_delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
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