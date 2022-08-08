<!DOCTYPE html>
<?php
require_once '../../db_connection/dbconfig.php';
 require_once '../../controller/super/SessionStart.php';
require_once '../../model/DebsModel.php';

   $school_id = $_SESSION['ttms_school_id'];
$stm = DebsModel::get_all_teacher_by_school_id($school_id);

?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Teacher List Report</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../../lib/assets/images/iconf.ico">
        
       
        <link href="../../lib/icons/css/solid.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../lib/icons/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
        
        
  
    <!-- Font Awesome -->
    <link href="../../lib/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../lib/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../lib/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../../lib/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../lib/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../lib/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../lib/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../lib/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css"  href="../../lib/icons/css/all.css"/>
      
      
      
      
   

       <link href="../../css/panelcss/vims-theme.css" rel="stylesheet" type="text/css"/>
       
       
    </head>

    <style>
        .togrther{
             display: inline-block;
        }
      
    </style>
    <body>

        <!-- Begin page -->
        <div id="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
			
            <!-- Left Sidebar End -->
            <!-- Topbar Start -->
           
            <!-- end Topbar -->

           

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    
                    <li><a href="/RDMS/view/school/index.php">Home</a></li>   
					<li><a href="#">Report</a></li> 					
                    <li class="active">List Of Teachers</li>
                </ul>
                <!-- END BREADCRUMB -->  
                
               <div class="page-content-wrap">
                   
					 <!-- START SEARCH -->                            
                            <div class="panel panel-default">
                                <div class="panel-body">                                    
                                    <div class="row stacked">
                                        
									               <div class="col-md-4 text-center"></div>
                                       
                                                                                       
                                                                                       
                                                                             
                                                                                       
                                                                                       
                                                                                       <center> <div class="col-md-12">
                                                                                           
                                                 
                                                                                           
                                            <div class="input-group push-down-10">
                                                
                                                <form method="Post" action="../../controller/reports/SendData.php">
                                                    
                                                    <table>
                                                        <tr>
                                                            
                                                           
                                                                 
                                                           
                                                            
                                                  
                                                        </tr>
                                                    
                                                    </table>
                                                    
                                               
                                                						
												<!--SEARCH CODE-->
                                                                                      
                                               
										</form>		<!--SEARCH CODE-->
                                            </div>	
                                        </div></center>
									
									               <div class="col-md-2">
												   </div>
                                      
                                    </div>
                                </div>  


						
                            </div>
                            <!-- END SEARCH -->
					
       

					    <!-- START SEARCH RESULTS -->
										
<!-- this is were the data tables  starts -->

<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List Of Teachers Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
<!--                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>-->
<!--                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>-->
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                       <th>Name</th>
                    <th>Gender</th>
                    <th >Contact No</th>
                    <th >Position</th>
                    <th >Email</th>
                        
                        
                        </tr>
                      </thead>


                      <tbody>
                   
                            
                              <?php
                                while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
                                    
                                 ?>
                               <tr>
                              <td><?php echo $row['Name'];?></td>
					  <td><?php echo $row['Gender'];?></td>
					   <td><?php echo $row['ContactNo'];?></td>
					    <td><?php echo $row['PositionName'];?></td>
                                              <td><?php echo $row['Email'];?></td>
                     
                         
                            </tr>        
                               <?php     
                                }
											   ?>
                  
                        
                       
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

             
								
					
                  </form>  

			</div>	 
				<!-- END PAGE CONTENT WRAPPER --> 							
				
        </div>
                        
                    
                    
                    
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->
                  
                <!-- Footer Start -->
			<?php //require_once('footer.php'); ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
     <!-- jQuery -->
    <script src="../../lib/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../lib/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../lib/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../lib/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../../lib/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../../lib/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../lib/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../lib/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../lib/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../lib/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../lib/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../lib/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../lib/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../lib/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../lib/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../lib/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../lib/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../lib/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../lib/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../lib/vendors/pdfmake/build/vfs_fonts.js"></script>
			
    
     <!-- Custom Theme Scripts -->
    <script src="../../lib/vendors/build/js/custom.min.js"></script>
	  <!-- END SCRIPTS -->      
    
     
        <script type="text/javascript" src="../../js/plugins/jquery/jquery-ui.min.js"></script>
            
        <!-- END PLUGINS -->
        
        <!-- START THIS PAGE PLUGINS-->
      
        <script type="text/javascript" src="../../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="../../js/plugins/rangeslider/jQAllRangeSliders-min.js"></script>       
        <script type="text/javascript" src="../../js/plugins/knob/jquery.knob.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->      
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../../js/vims-theme-settings.js"></script>
        
        <script type="text/javascript" src="../../js/plugins.js"></script>        
        <script type="text/javascript" src="../../js/actions.js"></script>                
        <!-- END TEMPLATE -->
       
    
    
        <!-- Vendor js -->
<!--        <script src="../../lib/assets/js/vendor.min.js"></script>-->

        <!-- App js -->
<!--        <script src="../../lib/assets/js/app.min.js"></script>-->
    </body>
</html>