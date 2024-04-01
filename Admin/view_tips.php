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
                <th>Title</th>
                <th>Category</th>
                <th>description</th>
                <th>ingredients</th>
                
                <th>Benefits</th>
                <th>Usage</th>
                <th>additional_tips</th>
               
                <th>Image</th>
                <th>Link</th>
                <th>Comments</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
$sql="select * from tips";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
    while($row=$result->fetch_assoc()){
        ?>
         <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['title'];?></td>
                <td>
                    <?php
$category_id=$row['category'];
$sq="select * from category where id=$category_id";
$res=$con->query($sq);
$ro=$res->fetch_assoc();
echo $ro['category_name'];

                ?></td>
                  <td><?php echo $row['description'];?></td>
                <td><?php echo $row['ingredients'];?></td>
                 
                      <td><?php echo $row['benefits'];?></td>
                         <td><?php echo $row['usage_product'];?></td>
                            <td><?php echo $row['additional_tips'];?></td>
                            
                                  <td><img src="../Creator/uploads/<?php echo $row['file'];?>" width="200" height="200"></td>
                                     <td><?php echo $row['link'];?></td>
                                        <td><?php echo $row['comments'];?></td>
                <td><a href="view_tip.php?id=<?php echo $row['id'];?>">View</a></td>
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
