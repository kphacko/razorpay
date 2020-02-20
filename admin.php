<?php
include_once 'connect.php';
include_once 'header.php';


$sql="SELECT * from member where status=1";
$result= mysqli_query($conn,$sql);
$check1=mysqli_num_rows($result);
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, "stat=s") !== false) {
  echo '<script>
  alert("Registration successfull");
</script>';
}elseif (strpos($url, "stat=d") !== false) {
  echo '<script>
  alert("Deleted successfully");
</script>';
}
?>
<!-- -->
<div class="col-md-12" style="margin-top: 6%;">
	<div class="text-center">
	<h4>Registered Users</h4>
	</div>
    <section id="main-content mt-5">
      <section class="wrapper">
        <?php if($check1>0){ ?>
        <div class="table-responsive">
          <table id="dt-basic-checkbox"  class="table table-striped table-bordered" cellspacing="0" border ="2" align = "center" style="width:100%" >
                <thead class="thead-dark">
                  <tr>
                    <th></th>
                  	<th class="th-sm"><h3><strong>ID No</strong></h3></th>
                    <th class="th-sm"><h3><strong>Name</strong></h3></th>
                    <th class="th-sm"><h3><strong>Email</strong></h3></th>
                    <th class="th-sm"><h3><strong>contact</strong></h3></th>
                    <th class="th-sm"><h3><strong>Gender</strong></h3></th>
                    
                    <th class="th-sm"><h3><strong>Address</strong></h3></th>
                    <th class="th-sm"><h3><strong>District</strong></h3></th>
                    <th class="th-sm"><h3><strong>state</strong></h3></th>
                    <th class="th-sm"><h3><strong>Aadhar NO</strong></h3></th>
                    <th class="th-sm"><h3><strong>Fees</strong></h3></th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $c=1;
                  while ($row = mysqli_fetch_array($result))
                  {
                        echo '<tr>
                        <td></td>
                                <td>'.$row["id"].'</td>
                                <td>'.$row["fname"].' '.$row["mname"].' '.$row["lname"].'</td>
                                <td>'.$row["email"].'</td>
                                <td>'.$row["phone"].'</td>
                                <td>'.$row["Gender"].'</td>
                                <td>'.$row["address"].'</td>
                                <td>'.$row["district"].'</td>
                                <td>'.$row["state"].'</td>
                                <td>'.$row["aadhar"].'</td>
                                <td>Paid</td>
                                ';

                                echo '</tr>';
                                $c++;
                }

                  ?>


                </tbody>
              </table>
              </div>
              <?php }else{
                echo '<div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4 text-center alert alert-danger" role="alert">
                 User not fond!!!
              </div>
                      </div>';
                }
                ?>
      </section>
      </div>

      <!-- JQuery -->
<!-- <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
<!-- Bootstrap tooltips -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script> -->
<!-- Bootstrap core JavaScript -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<!-- MDB core JavaScript -->
<script>
$('#dt-basic-checkbox').dataTable({

columnDefs: [{
orderable: false,
className: 'select-checkbox',
targets: 0
}],
select: {
style: 'os',
selector: 'td:first-child'
}
});
</script>


<?php
include_once'footer.php';
?>


