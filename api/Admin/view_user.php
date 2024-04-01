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
                  <h4 class="card-title">User</h4>
                  <p class="card-description">
                  
                  </p>
                  <div class="table-responsive pt-3">
                    <table  class="table table-bordered table-striped" id="example"  style="width:100%">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                           Name
                          </th>
                           <th>Age</th>
                          <th>
                           Email
                          </th>
                          <th>
                            Phone
                          </th>
                         
                         
                          <th>Profile</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <?php
                      $i=1;
                      $sql="select * from user";
                      $result=$con->query($sql);
                      $count=$result->num_rows;
                      if($count>0){
                        while($row=$result->fetch_assoc()){
                          ?>
                         
                      <tbody>
                        <tr>
                          <td>
                          <?php echo $i++;?>
                          </td>
                          <td>
                            <?php echo $row['name'];?>
                          </td>
                          <td>
                          <?php echo $row['age'];?>
                          </td>
                          <td>
                            <?php echo $row['email']?>
                          </td>
                          <td>
                          <?php echo $row['mobile'];?>
                          </td>
                          
                          <td><img src="http://campus.sicsglobal.co.in/Project/janani/api/uploads/<?php echo $row['file'];?>"></td>
                          <td><a href="delete_user.php?id=<?php echo $row['id'];?>">Delete</a></td>
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