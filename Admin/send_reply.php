<?php
include 'header.php';
$id=$_GET['id'];

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
              <form class="row g-3" action="reply_action.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="discussion_id" value="<?php echo $id;?>">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Reply</label>
                  <input type="text" class="form-control" name="reply" id="inputNanme4">
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