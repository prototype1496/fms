<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  
  <title>Dashboard</title>


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
                  <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../../controller/debs/ActionPerformed.php">
                    
                       <div class="form-group ">
                      <div class="col-sm-12">
                          <h3>Add User</h3>
                  </div>  </div>
                  <div class="form-group ">
                   
                    <div class="col-sm-4">
                         <label for="username" class="control-label col-ms-4">Username (required)</label>
                      <input class=" form-control" id="username" name="username" minlength="4" type="text" required />
                    </div>
                     <div class="col-sm-4">
                          <label for="cname" class="control-label col-ms-4">Password (required)</label>
                         <input class=" form-control" id="password" name="password" minlength="4" type="password" required />
                    </div>
                     <div class="col-sm-4">
                          <label for="cname" class="control-label col-ms-5">Confirm Password (required)</label>
                         <input class=" form-control" id="cpassword" name="cpassword" minlength="4" type="password" required />
                    </div>
                  </div>
                   <div class="form-group ">
                   
                    <div class="col-sm-4">
                         <label for="fname" class="control-label col-ms-4">First Name (required)</label>
                      <input class=" form-control" id="fname" name="first_name" type="text" required />
                    </div>
                     <div class="col-sm-4">
                          <label for="lname" class="control-label col-ms-4">Last Name (required)</label>
                         <input class=" form-control" id="lname" name="last_name"  type="text" required />
                    </div>
                        <div class="col-sm-4">
                          <label for="oname" class="control-label col-ms-4">Other Name </label>
                         <input class=" form-control" id="oname" name="other_name"  type="text"  />
                    </div>
                    
                  </div>
                    
                     <div class="form-group ">
                   
                    <div class="col-sm-4">
                         <label for="contactno" class="control-label col-ms-4">Contact No. (required)</label>
                      <input class=" form-control" id="contactno" name="contactno" type="text" required />
                    </div>
                           <div class="col-sm-3 ">
                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="01-04-2021" class="input-append date dpYears">
                       <label for="contactno" class="control-label col-ms-4">Select D.O.B</label>
                       <input type="text" name="dob" readonly="" value="2021-04-11" size="16" class="form-control">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                   
                  </div>
                             <div class="col-sm-1">
                          
                    </div>
                          <div class="col-sm-4">
                             <label for="contactno"  class="control-label col-ms-4">Gender (required)</label> 
                             <select name="gender" class="form-control">
                                  <option value="1">Male</option>
                                  <option value="2">Female</option>
                  
                </select>
                              
                        
                    </div>
                         
                  
                       
                    
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-10">
                        <button name="add_debs_user" class="btn btn-theme" type="submit">Save</button>
                      <button class="btn btn-theme04" id="btn_cancel" type="button">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>RDMS</strong>. All Rights Reserved
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
