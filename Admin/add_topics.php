<?php
include 'header.php';

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Discussion</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Discussion</li>
          <li class="breadcrumb-item active">Add Discussion</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">


        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Discussion</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="discussion_action.php" method="post" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Topics</label>
                  <input type="text" class="form-control" name="topics" id="inputNanme4">
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Category</label>
                  <select type="text" class="form-control" name="category" id="inputNanme4">
                  
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