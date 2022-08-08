<?PHP
    require_once '../../db_connection/dbconfig.php';
    require_once '../../model/DebsModel.php';
$stm = DebsModel::get_all_registered_schools();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  
  <title>View Schools</title>


  <!-- Bootstrap core CSS -->
  <link href="../../lib/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../../lib/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../../css/css/zabuto_calendar.css">
  
 
   <link rel="stylesheet" type="text/css" href="../../lib/lib/advanced-datatable/css/demo_page.css" />
    <link rel="stylesheet" type="text/css" href="../../lib/lib/advanced-datatable/css/demo_table.css" />
  
  <link rel="stylesheet" type="text/css" href="../../lib/lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="../../css/css/style.css" rel="stylesheet">
  <link href="../../css/css/style-responsive.css" rel="stylesheet">



 
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
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
    <!-- **************
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>VIWE SCHOOLS</h3>
            </div>
            
      
            <div class="row mb" style="padding-left: 10px; padding-right: 10px;">
          <!-- page start-->
          <div class="content-panel" >
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>EMMIS No.</th>
                    <th>Name</th>
                    <th >Motto</th>
                    <th >Position</th>
                    <th >Active</th>
                    <th ></th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                    
                      <?php while($row = $stm->fetch(PDO::FETCH_ASSOC))
                            
                    {
                          $public_id = $row['PublicID'];
                            ?>
                  <tr >
                
                    <td><?php echo $row['EMISNO'];?></td>
                    <td><?php echo $row['SchoolName'];?></td>
                    <td ><?php echo $row['SchoolMotto'];?></td>
                     <td ><?php echo $row['Corridantes'];?></td>
                      <td ><?php echo $row['Active'];?></td>
                    <td>
                        <button onclick="redirectWithID('<?php echo $public_id;?>')" class="btn btn-success btn-xs btn_school_profile"><i class="fa fa-eye"></i></button>
                      <button class="btn btn-primary btn-xs"><i class="fa fa-unlock-alt"></i></button>
                      <button class="btn btn-danger btn-xs"><i class="fa fa-lock "></i></button>
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
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>RDMS</strong>. All Rights Reserved
        </p>
       
        <a href="viweschool.php#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
 
   <script src="../../lib/lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../lib/lib/advanced-datatable/js/jquery.js"></script>
  <script src="../../lib/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../../lib/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../../lib/lib/jquery.scrollTo.min.js"></script>
  <script src="../../lib/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="../../lib/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../../lib/lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="../../lib/lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">


    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
     
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

//     $('.btn_school_profile').click(function (){
//         
//        window.location.href = "/RDMS/view/debs/schoolprofile.php";
//         
//     });

    });
    
    function redirectWithID(id){
         window.location.href = "/RDMS/view/debs/schoolprofile.php?id="+id;
        
    }
  </script>
</body>

</html>
