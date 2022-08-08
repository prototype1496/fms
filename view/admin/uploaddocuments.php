<?PHP
    require_once '../../db_connection/dbconfig.php';
    require_once '../../model/DebsModel.php';
$stm = DebsModel::get_alldebs_documentdetails();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  
  <title>Uplaod Common Doc</title>


  <!-- Bootstrap core CSS -->
  <link href="../../lib/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../../lib/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../../css/css/zabuto_calendar.css">
  
  
  
   <link rel="stylesheet" href="../../lib/lib/file-uploader/css/jquery.fileupload.css">
  <link rel="stylesheet" href="../../lib/lib/file-uploader/css/jquery.fileupload-ui.css">
  <!-- CSS adjustments for browsers with JavaScript disabled -->
  <noscript>
      <link rel="stylesheet" href="../../lib/lib/file-uploader/css/jquery.fileupload-noscript.css">
    </noscript>
  <noscript>
      <link rel="stylesheet" href="../../lib/lib/file-uploader/css/jquery.fileupload-ui-noscript.css">
    </noscript>
    
    
    
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
            <div class="row mb" style="padding-left: 10px; padding-right: 10px;">
                <div >
           
            <div class="form-panel">
              <div class=" form">
                  <form enctype="multipart/form-data" class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../../controller/debs/ActionPerformed.php">
                    
                       <div class="form-group ">
                      <div class="col-sm-12">
                          <h4>Add Document</h4>
                  </div>  </div>
                  <div class="form-group ">
                   
                    <div class="col-sm-6">
                         <label for="title" class="control-label col-ms-4">Dcoument Title (required)</label>
                      <input class=" form-control" id="title" name="title"  type="text" required />
                    </div>
                    
                       <div class="col-sm-6">
                              
                           <span style="margin-top: 7%; width: 70%;" class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                  <input type="file" name="file" required>
                  </span>
                    </div>
                     
                      
                  </div>
                      
                           <div class="form-group ">
                   
                    <div class="col-sm-12">
                         <label for="discription"  class="control-label col-ms-4">Discription</label>
                         <textarea class=" form-control" name="discription" rows="3" ></textarea>
                        
                    </div>
                      
                  </div>
            
                    
                 
                         
                
                    <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-10">
                        <button type="submit" name="btn_upload_doc" class="btn btn-theme start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start upload</span>
                    </button>
                    </div>
                  </div>   
                    
                  </div>
                  
                </form>
              </div>
            </div>
                
            </div>
            
            <br>
            <div class="border-head">
              <h3>Common Documents</h3>
            </div>
            
      
            <div class="row mb" style="padding-left: 10px; padding-right: 10px;">
                
                
                
                
          <!-- page start-->
          <div class="content-panel" >
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Discription</th>
                    <th >Uploaded On</th>
                   
                    <th ></th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                    
                      <?php while($row = $stm->fetch(PDO::FETCH_ASSOC))
                            
                    {
                          $public_id = $row['DebsDocumentID'];
                           $doc_url = $row['DocumentURL'];
                            ?>
                  <tr >
                
                    <td><?php echo $row['DocumentName'];?></td>
                    <td><?php echo $row['Discription'];?></td>
                    <td ><?php echo $row['Data'];?></td>
                     
                    <td>
                        <button onclick="redirectWithID('<?php echo $public_id;?>')" class="btn btn-success btn-xs btn_school_profile"><i class="fa fa-eye"></i></button>
                       <button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button>
                        <button onclick="deletWithID('<?php echo $public_id;?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                      
                        
                     
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
        
        window.open("/RDMS/view/debs/view.php?id="+id, "_blank");
    }
      function deletWithID(id){
        window.location.href = "/RDMS/view/debs/deletdoc.php?id="+id;
      
    }
    
  </script>
</body>

</html>
