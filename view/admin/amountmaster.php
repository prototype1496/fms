<?php

  require_once '../../controller/super/SessionStart.php';
 require_once '../../db_connection/dbconfig.php';
    require_once '../../model/SuperModel.php';

  $public_id = $_SESSION['ttms_public_id'];

    $school_id = $_SESSION['ttms_school_id'];;
 
$stm = SuperModel::get_all_fuel_price_list();
 
 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  
  <title>Master</title>


  <!-- Bootstrap core CSS -->
  <link href="../../lib/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../../lib/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../../css/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../../lib/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../../css/css/style.css" rel="stylesheet">
  <link href="../../css/css/style-responsive.css" rel="stylesheet">
  <script src="../../lib/lib/chart-master/Chart.js"></script>
  
   <link rel="stylesheet" type="text/css" href="../../lib/lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/lib/bootstrap-datetimepicker/datertimepicker.css" />

 
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
       <?php include 'navbar.php'; ?>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    
    
    <?php include 'sidebar.php'; ?>
    
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
   <section id="main-content">
      <section class="wrapper ">
        
        <div class="row mt">
          <div class="col-lg-12">
           
            <div class="form-panel">
              <div class=" form">
                  <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../../controller/super/ActionPerformed.php">
                    
                       <div class="form-group ">
                      <div class="col-sm-12">
                          <h4>Add Amount</h4>
                  </div>  </div>
                  <div class="form-group ">
                   
                    <div class="col-sm-4">
                         <label for="username" class="control-label col-ms-4">Amount (required)</label>
                         <input class=" form-control" id="amount" name="amount"  type="number" required />
                    </div>
                     
                     
                 
                    <div class="col-sm-4">
                        <br><button name="btn_add_amount" class="btn btn-theme" type="submit">Add Amount</button>
                   
                    </div>
                 
                </form>
              </div>
            </div>
            <!-- /form-panel -->
            
            
            
          </div>
          <!-- /col-lg-12 -->
          <div class="form-panel">
           <div class="row">
          <div class="col-lg-12 main-chart">
         
            
      
            <div class="row mb" style="padding-left: 10px; padding-right: 10px;">
          <!-- page start-->
          <div class="content-panel" >
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Amount</th>
                    <th>Updated On</th>
                    <th >Updated By</th>
                    <th >Active</th>
                   
                    <th ></th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                    
                      <?php while($row = $stm->fetch(PDO::FETCH_ASSOC))
                            
                    {
                          $public_id = $row['amountmasterid'];
                            ?>
                  <tr >
                
                    <td><?php echo $row['amount'];?></td>
                  
                    <td ><?php echo $row['UpdatedOn'];?></td>
                      <td><?php echo $row['UpdatedBy'];?></td>
                     <td ><?php echo $row['Act'];?></td>
                     
                    <td>
                        <button onclick="redirectWithID('<?php echo $public_id;?>')" class="btn btn-success btn-xs btn_school_profile"><i class="fa fa-refresh"></i></button>
                      
                    </td>
                  </tr>
                    <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
         
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          
          <!-- /col-lg-3 -->
        </div>
              </div>
        </div>
            
            
            
           
      </section>
      <!-- /wrapper -->
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>FMS</strong>. All Rights Reserved
        </p>
       
        <a href="index.php#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../../lib/lib/jquery/jquery.min.js"></script>

  <script src="../../lib/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../../lib/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../../lib/lib/jquery.scrollTo.min.js"></script>
  <script src="../../lib/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../../lib/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../../lib/lib/common-scripts.js"></script>
  <script type="text/javascript" src="../../lib/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../../lib/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../../lib/lib/sparkline-chart.js"></script>
  <script src="../../lib/lib/zabuto_calendar.js"></script>
  
    <script type="text/javascript" src="../../lib/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="../../lib/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../../lib/lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../../lib/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../../lib/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../../lib/lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../../lib/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script src="../../js/RelaodDistrict.js" type="text/javascript"></script>
  <script src="../../lib/lib/advanced-form-components.js"></script>
  
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
