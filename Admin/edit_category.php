<?php
include 'header.php';
$category_id=$_GET['id'];
$sql="select * from category where id=$category_id";
$result=$con->query($sql);
$row=$result->fetch_assoc();
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Category</li>
          <li class="breadcrumb-item active">Add Category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">


        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Category</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="category_editaction.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="category_id" value="<?php echo $category_id;?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Catgory Name</label>
                  <input type="text" class="form-control" value="<?php echo $row['category_name'];?>" name="category" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Image</label>
                  <input type="file" class="form-control" id="inputEmail4" name="file">
                  <img src="uploads/<?php echo $row['image'];?>" width="200" height="200">
                </div>
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

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