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
                <th>User name</th>
                <th>Answers</th>
                <th>Admin Reply</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
$sql="SELECT user.name,discussion_answers.answers ,discussion_answers.id,discussion_answers.admin_reply FROM `discussion_answers` inner join user on user.id=discussion_answers.user_id where discussion_answers.discussion_id=$id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
    while($row=$result->fetch_assoc()){
        ?>
         <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['name'];?></td>
               
                <td><?php 



                echo $row['answers'];?></td>
                <td><?php echo $row['admin_reply'];?></td>
                <th><a href="send_reply.php?id=<?php echo $row['id'];?>">Send Reply</a></th>
            
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
