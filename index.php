<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>सक्षम</title>
  <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=500,height=500');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

  <link rel="icon" type="image" href="img/logo.png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!--================ Header Menu Area start =================-->
 <?php include_once('includes/header.php');?> 
  <!--================Header Menu Area =================-->


  <!--================ Banner Section start =================-->
  <section class="hero-banner text-center">
    <div class="container">
     
       <img src="img/video.gif" alt="Smiley face" style="float:left;width:400px;height:300px; border-radius:75%;"> 
       <img src="img/giphy.gif" alt="Smiley face" style="float:left;width:400px;height:300px; border-radius:75%; margin-left: 30px"> 
       <h1>सक्षम</h1>
       <!-- <h2><p>YES I CAN</p></h2> -->
       
 
    </div>
  </section>
  <!--================ Banner Section end =================-->


  <!--================ Domain Search section start =================-->
  <section class="bg-gray domain-search">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-5 col-lg-2 text-center text-md-left mb-3 mb-md-0">
          <h3>Search Your Pass!</h3>
        </div>
        <div class="col-md-7 col-lg-10 pl-2 pl-xl-5">
          <form class="form-inline flex-nowrap form-domainSearch" method="post">
            <div class="form-group">
              <label for="staticDomainSearch" class="sr-only">Search</label>
              <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Enter Your Mobile Number or Pass ID"> 
            </div>
            <button type="submit" class="button rounded-0" name="search" id="submit">Search</button>
          </form>
           <?php
if(isset($_POST['search']))
{ 
$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" Keyword</h4>
  <div class="row" id="divToPrint">
   
     <table class="table table-striped table-bordered table-hover" border="1" class="table table-bordered" id="dataTables-example" style=" background: url('img/watermarkname.png'); ">
 <?php
$sql="SELECT * from tblpass where PassNumber like '%$sdata%' or ContactNumber like '%$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
      <tr align="center">
<td colspan="6" style="font-size:20px;color:blue">
 Pass ID: <?php  echo ($row->PassNumber);?></td></tr>

  <tr>
    <th scope>Full Name</th>
    <td><?php  echo ($row->FullName);?></td>
    <th scope>Mobile Number</th>
    <td><?php  echo ($row->ContactNumber);?></td>
    <th scope>Email</th>
    <td><?php  echo ($row->Email);?></td>
  </tr>
<tr>
    <th scope>Identity Type</th>
    <td><?php  echo ($row->IdentityType);?></td>
    <th scope>Identity Card Number</th>
    <td><?php  echo ($row->IdentityCardno);?></td>
    <th scope>Category</th>
    <td><?php  echo ($row->Category);?></td>
  </tr>
<tr>
    <th scope>From Date</th>
    <td><?php  echo ($row->FromDate);?></td>
    <th scope>To Date</th>
    <td><?php  echo ($row->ToDate);?></td>
    <th scope>Pass Creation Date</th>
    <td><?php  echo ($row->PasscreationDate);?></td>
  </tr>
                                    
    <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?> 
     </table>
     <p style="text-align: center;font-size: 20px;color: red">
     <button onclick="PrintDiv();"><i class="fa fa-print"></i></button></p>
  <!-- <input type="submit" value="" onclick="PrintDiv();" /><i class="fa fa-print"></i></p> -->
</div>

        </div>
      </div>
    </div>
  </section>
  <!--================ Domain Search section end =================-->





  <!-- ================ start footer Area ================= -->
   <?php include_once('includes/footer.php');?>
  <!-- ================ End footer Area ================= -->




  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>

  <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
</body>
</html>