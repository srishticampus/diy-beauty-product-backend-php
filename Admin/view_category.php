<?php
include 'header.php';
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.pgp">Home</a></li>
          <li class="breadcrumb-item">View</li>
          <li class="breadcrumb-item active">Category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $i=1;
$sql="select * from category";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
  while($row=$result->fetch_assoc()){
  ?>
   <tr>
                    <th scope="row"><?php echo $i++;?></th>
                    <td><?php echo $row['category_name'];?></td>
                    <td><img src="uploads/<?php echo $row['image'];?>" width="200" height="200"></td>
                    <td><a href="edit_category.php?id=<?php echo $row['id'];?>">View</a>|<a href="delete_category.php?id=<?php echo $row['id'];?>">Delete</a></td>
                 
                  </tr>
  <?php
  }
}

                  ?>
                 
                  
                </tbody>
              </table>
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