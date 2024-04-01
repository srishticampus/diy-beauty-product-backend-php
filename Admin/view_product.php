<?php
include 'header.php';
?>

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

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Recipes</h5>
             

              <!-- Table with stripped rows -->
              <div class="box-body table-responsive">
              <table class="table datatable" style="overflow: auto;">
                <thead>
            <tr>
                <th>Slno</th>
                <th>Product name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>image</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
$sql="select * from product";
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
                <td><img width="100" height="100" src="../Creator/uploads/<?php echo $row['image'];?>"></td>
                
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
