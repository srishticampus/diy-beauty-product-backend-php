<?php
    include 'header2.php';
    require 'connection.php';
?>
    <!-- Navbar End -->
 <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Tips</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Tips</p>
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
    <strong>Success!</strong> Added Successfully
  </div>';
                        }
                        else if($msg=='failed'){
                                   echo ' <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Added Failed
  </div>';
                        }

                    }

                ?>
             
                     <form action="tip_action.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" name="title" class="form-control" id="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Category</label>
    <select class="form-control" name="category" required>
        <option value="">Select</option>
        <?php
$sql="select * from category";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
    while($row=$result->fetch_assoc()){
    ?>
    <option value="<?php echo $row['id'];?>"><?php echo $row['category_name'];?></option>
    <?php
    }
}

        ?>
    </select>
  </div>
   <div class="form-group">
    <label for="pwd">Description</label>
   <textarea id="editor" name="description" required></textarea>
  </div>
   <div class="form-group">
    <label for="pwd">Ingredients</label>
    <textarea id="editor1" name="ingredients" required></textarea>
  </div>
   <div class="form-group">
    <label for="pwd">Benefits</label>
    <textarea id="editor2" name="benefits" required></textarea>
  </div>
   <div class="form-group">
    <label for="pwd">Usage</label>
    <textarea id="editor3" name="usage" required></textarea>
  </div>

   <div class="form-group">
    <label for="pwd">Additional Tips</label>
    <textarea id="editor4" name="additional_tips" required></textarea>
  </div>
  <div class="form-group">
    <label for="pwd">Image</label>
    <input type="file" class="form-control" id="pwd" required name="file">
  </div>
   <div class="form-group">
    <label for="pwd">Video Link</label>
    <input type="text" class="form-control" id="pwd" name="link" required>
  </div>
   <div class="form-group">
    <label for="pwd">Comments</label>
    <textarea id="editor5" name="comments" required></textarea>
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