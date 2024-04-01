<?php
include 'header.php';

?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           
          
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Workshop</h4>
                  <p class="card-description">
                  <!--   Add class <code>.table-bordered</code> -->
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered table-striped" id="example"  style="width:100%">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                           Email
                          </th>
                          <th>
                           Phone
                          </th>
                          <th>
                           Place
                          </th>
                          <th>Lattitude</th>
                          <th>Longitude</th>
                          <th>Address</th>
                          <th>Image</th>
                          <th colspan="2">Action</th>
                         
                        </tr>
                      </thead>
                      <?php
                      $sql ="select * from  workshop order by id desc";
                      $result=$con->query($sql);
                      $count=$result->num_rows;
                      $i=1;
                      if($count>0){
                      	while($row=$result->fetch_assoc()){
                      		?>

                      		<tbody>
                        <tr>
                          <td>
                            <?php
                            echo $i++;
                            ?>
                          </td>
                          <td>
                            <?php echo $row['workshop_name'];?>
                          </td>
                          <td>
                             <?php echo $row['email'];?>
                          </td>
                          <td>
                             <?php echo $row['phone'];?>
                          </td>
                          <td>
                            <?php echo $row['place'];?>
                          </td>
                          <td>
                            <?php echo $row['lattitude'];?>
                          </td>
                          <td>
                            <?php echo $row['longitude'];?>
                          </td>
                          <td>
                            <?php echo $row['address'];?>
                          </td>
                          <td>
                            <a href="http://campus.sicsglobal.co.in/Project/Moto/Workshop/uploads/<?php echo $row['file'];?>" target="_blank"><img src="http://campus.sicsglobal.co.in/Project/Moto/Workshop/uploads/<?php echo $row['file'];?>"></a>
                          </td>
                          <td><a href="accept_workshop.php?id=<?php echo $row['id'];?>">
                            <?php

                          if($row['status']==1){
                            echo 'Accepted';
                          }
                          else{
                            echo 'Accept';
                          }

                            ?>
                          
                          </a>
                        </td><td>
                          <a href="reject_workshop.php?id=<?php echo $row['id'];?>">
                             <?php

                          if($row['status']==2){
                            echo 'Rejected';
                          }
                          else{
                            echo 'Reject';
                          }

                            ?>
                          </a>


                        </td>
                        </tr>
                       
                      </tbody>
                      		<?php

                      	}
                      }
                      ?>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
 
 <script type="text/javascript">
 	$(document).ready(function () {
    $('#example').DataTable();
});
 </script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <!-- End custom js for this page-->
</body>

</html>