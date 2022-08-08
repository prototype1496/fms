<script src="../../js/Jnotify/jquery-1.12.4.min.js" type="text/javascript"></script>
<link href="../../js/Jnotify/jnoty.min.css" rel="stylesheet" type="text/css"/>
<script src="../../js/Jnotify/jnoty.min.js" type="text/javascript"></script>

<?php
 require_once '../../db_connection/dbconfig.php';
    require_once '../../model/DebsModel.php';
    
    
    $id = $_GET['id'];
    
   
    
    if (DebsModel::delet_user_document($id )){
        
       
           
                  echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Document Successfuly Deleted', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/headteacher/uploaddocuments.php')},
            });   
            }); 
            </script>";
    }else {
                     echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Error In deleting document', {
            sticky: false,
            header: 'Error',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/headteacher/uploaddocuments.php')},
            });   
            }); 
            </script>";
    }
  
?>

