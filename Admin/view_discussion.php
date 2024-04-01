<?php
include 'header.php';
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Discussion</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">View</li>
          <li class="breadcrumb-item active">Discussion</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Discussion</h5>
             

              <!-- Table with stripped rows -->
              <div class="box-body table-responsive">
              <table class="table datatable" style="overflow: auto;">
                <thead>
            <tr>
                <th>Slno</th>
                <th>Topics</th>
                <th>Category</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
$sql="SELECT * FROM `discussion`";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
    while($row=$result->fetch_assoc()){
        ?>
         <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['topics'];?></td>
               
                <td><?php 

$category=$row['category'];
$sq="select * from category where id=$category";
$res=$con->query($sq);
$ro=$res->fetch_assoc();

                echo $ro['category_name'];?></td>
                <th><a href="view_answers.php?id=<?php echo $row['id'];?>">View Answers</a></th>
            
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
