<?php
include 'header.php';

    $id=$_GET['id'];
    $sql="select * from recipes where id=$id";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
?>
    <!-- Navbar End -->
 <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Recipes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">View</li>
          <li class="breadcrumb-item active">Recipes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

            <form action="" method="post">
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

 </form>

          

        </div>
      </div>
    </section>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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