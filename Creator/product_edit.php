<?php
    include 'header2.php';
    require 'connection.php';
    $id=$_GET['id'];
    $sql="select * from product where id=$id";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
?>
    <!-- Navbar End -->
 
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Product</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Product</p>
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
                <?php
                    if(isset($_GET['status'])){
                        $msg=$_GET['status'];
                        if($msg=='success'){
                            echo ' <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Edited Successfully
  </div>';
                        }
                        else if($msg=='failed'){
                                   echo ' <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Edit Failed
  </div>';
                        }

                    }

                ?>
             
                     <form action="product_updateaction.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="<?php echo $id;?>">
  <div class="form-group">
    <label for="title">Product Name:</label>
    <input type="text" name="name" class="form-control" id="email" value="<?php echo $row['product_name'];?>">
  </div>
  <div class="form-group">
    <label for="pwd">Category</label>
    <select class="form-control" name="category" style="color:black;">
        <option value="">Select</option>
        <?php
        $categoryid=$row['category_id'];
$sql1="select * from category";
$result1=$con->query($sql1);
$count1=$result1->num_rows;
if($count1>0){
    while($row1=$result1->fetch_assoc()){
        $category=$row1['id'];
    ?>
    <option <?php if($categoryid==$category){ echo 'selected';}?> value="<?php echo $row['id'];?>"><?php echo $row1['category_name'];?></option>
    <?php
    }
}

        ?>
    </select>
  </div>
   
  <div class="form-group">
    <label for="pwd">Image</label>
    <input type="file" class="form-control" id="pwd" name="file">
    <img src="uploads/<?php echo $row['image'];?>" width="100" height="100">
  </div>
   <div class="form-group">
    <label for="pwd">Quantity</label>
    <input type="text" class="form-control" id="pwd" name="quantity" value="<?php echo $row['quantity'];?>">
  </div>
   <div class="form-group">
    <label for="pwd">Price</label>
    <input type="text" class="form-control" id="pwd" name="price" value="<?php echo $row['price'];?>">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
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
>