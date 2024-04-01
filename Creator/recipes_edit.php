<?php
    include 'header2.php';
    require 'connection.php';
    $id=$_GET['id'];
    $sql="select * from recipes where id=$id";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
?>
    <!-- Navbar End -->
 <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Recipes</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Recipes</p>
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
    <strong>Success!</strong> Updated Successfully
  </div>';
                        }
                        else if($msg=='failed'){
                                   echo ' <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Updated Failed
  </div>';
                        }

                    }

                ?>
             
                     <form action="recipes_update_action.php" method="post">
                        <input type="hidden" name="recipes_id" value="<?php echo $id?>">
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" name="title" class="form-control" id="email" value="<?php echo $row['title'];?>" >
  </div>
  <div class="form-group">
    <label for="pwd">Category</label>
    <select class="form-control" name="category" style="color:black;">
        <option value="">Select</option>
        <?php
        $categoryid=$row['category'];
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
    <label for="pwd">Ingredients</label>
   <textarea id="editor" name="ingredients"><?php echo $row['ingredients'];?></textarea>
  </div>
   <div class="form-group">
    <label for="pwd">Instructions</label>
    <textarea id="editor1" name="instructions"><?php echo $row['instructions'];?></textarea>
  </div>
   <div class="form-group">
    <label for="pwd">Benefits</label>
    <textarea id="editor2" name="benefits"><?php echo $row['benefits'];?></textarea>
  </div>
   <div class="form-group">
    <label for="pwd">Usage</label>
    <textarea id="editor3" name="usage"><?php echo $row['usage_product'];?></textarea>
  </div>
   <div class="form-group">
    <label for="pwd">Preparation Time</label>
    <input type="text" class="form-control" name="preparation_time" id="pwd" value="<?php echo $row['preparation_time'];?>">
  </div>
   <div class="form-group">
    <label for="pwd">Difficulty Level</label>
    <input type="text" class="form-control" id="pwd" name="difficulty_level" value="<?php echo $row['difficulty_level'];?>">
  </div>
   <div class="form-group">
    <label for="pwd">Storage Instructions</label>
    <textarea id="editor4" name="storage"> <?php echo $row['storage'];?></textarea>
  </div>
   <div class="form-group">
    <label for="pwd">Video Link</label>
    <input type="text" class="form-control" id="pwd" name="link" value="<?php echo $row['link'];?>">
  </div>
   <div class="form-group">
    <label for="pwd">Comments</label>
    <textarea id="editor5" name="comments"> <?php echo $row['comments'];?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
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
   <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                                  ClassicEditor
                                .create( document.querySelector( '#editor1' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                                  ClassicEditor
                                .create( document.querySelector( '#editor2' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                                  ClassicEditor
                                .create( document.querySelector( '#editor3' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                                  ClassicEditor
                                .create( document.querySelector( '#editor4' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                                 ClassicEditor
                                .create( document.querySelector( '#editor5' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>