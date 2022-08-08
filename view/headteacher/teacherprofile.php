
<?PHP
    require_once '../../db_connection/dbconfig.php';
    require_once '../../model/DebsModel.php';
     require_once '../../controller/super/SessionStart.php';
    $public_id = $_SESSION['ttms_public_id'];
  $teacher_id =   $_GET['id'];
  $school_id =   $_GET['school_id'];
//$stm = DebsModel::get_registered_school_by_id($school_di);
//$stm2 = DebsModel::get_all_teacher_by_school_id($school_di);



$stm = DebsModel::get_teacher_details_by_id($school_id,$teacher_id);

$school_data = $stm->fetch(PDO::FETCH_ASSOC);

$stm2 = DebsModel::get_teacher_documentdetails_by_id($teacher_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  
  <title>Teacher Profile</title>


  <!-- Bootstrap core CSS -->
  <link href="../../lib/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../../lib/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

  
 
   <link rel="stylesheet" type="text/css" href="../../lib/lib/advanced-datatable/css/demo_page.css" />
    <link rel="stylesheet" type="text/css" href="../../lib/lib/advanced-datatable/css/demo_table.css" />
  
  <link rel="stylesheet" type="text/css" href="../../lib/lib/advanced-datatable/css/DT_bootstrap.css" />
<!--   Custom styles for this template -->
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
           
            <div >
          <!-- page start-->
          <div class="row mt" style="padding-left: 10px; padding-right: 10px;">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4><?php echo $school_data['PublicUserID'];?></h4>
                  <h6>TSN No.</h6>
                  <h4><?php echo $school_data['WrokedYears'].' Year(s)';?></h4>
                  <h6>YEARS IN SERVICE</h6>
                
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3><?php echo $school_data['Name'];?></h3>
                <h6>Name</h6>
                <p>Education is the to development therefore uphold the code of conduct.</p>
                <br>
                
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="../../img/user.png" class="img-circle"></p>
                 
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Documents</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#contact" class="contact-map">Contact</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit">Profile</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-12">
                       
                    <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>Documents</h3>
            </div>
            
      
            <div class="row mb" style="padding-left: 10px; padding-right: 10px;">
          <!-- page start-->
          <div class="content-panel" >
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Document Name</th>
                    <th>Discription</th>
                    <th >Upload Date</th>
                  
                    <th ></th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                    
                     <?php while($row = $stm2->fetch(PDO::FETCH_ASSOC))
                            
                    {
                          $public_id = $row['TeacherDetailsPublicID'];
                            ?>
                  <tr >
              
                   
					 <td><?php echo $row['DocumentName'];?></td>
					  <td><?php echo $row['Discription'];?></td>
					   <td><?php echo $row['UpdatedDate'];?></td>
					  
                   
                    <td>
                        <button onclick="redirectWithID('<?php echo $public_id;?>')" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
                    <button onclick="deletWithID('<?php echo $public_id;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                      
                    </td>
                  </tr>
                    <?php 
                            
                    }
                         
                            ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
         
          </div>
                        <!-- place teacher table here  -->
                      </div>
                      <!-- /col-md-6 -->
                      
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="contact" class="tab-pane">
                    <div class="row">
                      <div class="col-md-6">
                        <div id="map"></div>
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                        <h4>Location</h4>
                        <div class="col-md-8 col-md-offset-2 mt">
                          <p>
                              Address<br/> <?php echo $school_data['PrimaryAddress'];?><br/>  <?php echo $school_data['DTPC'];?>
                          </p>
                          <br>
                          <p>
                           
                          </p>
                        </div>
                        <h4>Contacts</h4>
                        <div class="col-md-8 col-md-offset-2 mt">
                          <p>
                             Email: <?php echo $school_data['Email'];?><br/> Cell: <?php echo $school_data['ContactNo'];?><br/>
                          </p>
                          <br>
                          <p>
                           
                          </p>
                        </div>
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane">
                    
                      <div class="col-lg-8 col-lg-offset-2 detailed mt">
                        <h4 class="mb">INFORMATION</h4>
                        <form role="form" class="form-horizontal" method="post" action="../../controller/debs/ActionPerformed.php">
                            
                            
                            <input value="<?php echo $school_data['PublicID'];?>"  name="school_id"  type="hidden" required />
                              <div class="form-group ">
                   
                    <div class="col-sm-4">
                         <label for="emissno"   class="control-label col-ms-4"><b>Full Names:</b> <?php echo $school_data['Name'];?></label>
                       
                         
                    </div>
                    
                       <div class="col-sm-4">
                         <label for="schoolname" class="control-label col-ms-4"><b>Position:</b> <?php echo $school_data['PositionName'];?></label>
                      
                       </div>
                                  
                                   <div class="col-sm-4">
                         <label for="schoolname" class="control-label col-ms-4"><b>Gender:</b> <?php echo $school_data['Gender'];?></label>
                      
                       </div>
                      
                  </div>
                            
                            
                                 <div class="form-group ">
                   
                    <div class="col-sm-4">
                         <label for="emissno"   class="control-label col-ms-4"><b>Department:</b> <?php echo $school_data['DepartmentName'];?></label>
                       
                         
                    </div>
                    
                       <div class="col-sm-4">
                         <label for="schoolname" class="control-label col-ms-4"><b>Marital Status:</b> <?php echo $school_data['MaritalStatus'];?></label>
                      
                       </div>
                                  
                                   <div class="col-sm-4">
                         <label for="schoolname" class="control-label col-ms-4"><b>D.O.B:</b> <?php echo $school_data['DOB'];?></label>
                      
                       </div>
                      
                  </div>
                            
                            
<!--                                  <div class="form-group ">
                   
                    <div class="col-sm-4">
                         <label for="emissno"   class="control-label col-ms-4">ContactNo: <?php echo $school_data['ContactNo'];?></label>
                       
                         
                    </div>
                    
                       <div class="col-sm-4">
                         <label for="schoolname" class="control-label col-ms-4">Position: <?php echo $school_data['PositionName'];?></label>
                      
                       </div>
                                  
                                   <div class="col-sm-4">
                         <label for="schoolname" class="control-label col-ms-4">Position: <?php echo $school_data['Gender'];?></label>
                      
                       </div>
                      
                  </div>
				  -->
				  
<!--				         <div class="form-group ">
                   
                    <div class="col-sm-6">
                         <label for="longitude" class="control-label col-ms-4">Longitude (required)</label>
                         <input value="<?php echo $school_data['Longitude'];?>" class=" form-control" step="any" id="longitude" name="longitude"  type="number" required />
                    </div>
                    
                       <div class="col-sm-6">
                         <label for="latitude" class="control-label col-ms-4">Latidude (required)</label>
                         <input value="<?php echo $school_data['Latitude'];?>" class="  form-control"step="any" id="latitude" name="latitude"  type="number" required />
                    </div>
                      
                  </div>-->
            
                    
                        </form>
                      </div>
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
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
 
<!--   <script src="../../lib/lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../lib/lib/advanced-datatable/js/jquery.js"></script>
  <script src="../../lib/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../../lib/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../../lib/lib/jquery.scrollTo.min.js"></script>
  <script src="../../lib/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="../../lib/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../../lib/lib/advanced-datatable/js/DT_bootstrap.js"></script>-->
  <!--common script for all pages-->
  
  
   <script src="../../lib/lib/jquery/jquery.min.js"></script>
  <script src="../../lib/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../../lib/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../../lib/lib/jquery.scrollTo.min.js"></script>
  <script src="../../lib/lib/jquery.nicescroll.js" type="text/javascript"></script>
  
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

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */

    });
    function redirectWithID(id){
        
        window.open("/RDMS/view/headteacher/view.php?id="+id, "_blank");
    }
      function deletWithID(id){
         window.location.href = "/RDMS/view/headteacher/deletdoc.php?id="+id;
       
    }
  </script>
  
  
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXtF2Ae-PmS-2FASuL_J5bc-2cHctKzGU"></script>
  <script>
    $('.contact-map').click(function() {

      //google map in tab click initialize
      function initialize() {
        var myLatlng = new google.maps.LatLng(-14.448212610399182, 28.44559736887656);
        var mapOptions = {
          zoom: 11,
          scrollwheel: false,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'School Loactation'
        });
      }
      google.maps.event.addDomListener(window, 'click', initialize);
    });
    
    
    
  </script>
</body>

</html>
