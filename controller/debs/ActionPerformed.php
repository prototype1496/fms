<script src="../../js/Jnotify/jquery-1.12.4.min.js" type="text/javascript"></script>
<link href="../../js/Jnotify/jnoty.min.css" rel="stylesheet" type="text/css"/>
<script src="../../js/Jnotify/jnoty.min.js" type="text/javascript"></script>

<?php

    require_once '../../db_connection/dbconfig.php';
    require_once '../../model/DebsModel.php';
       require_once '../../model/SuperModel.php';
    
    require_once '../super/SessionStart.php';

  
 
if (isset ($_POST['add_debs_user']))
 {
      $username = trim(filter_input(INPUT_POST, 'username', FILTER_DEFAULT));
      $password = trim(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));
      
      $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_DEFAULT));
      $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_DEFAULT));
      $other_name = trim(filter_input(INPUT_POST, 'other_name', FILTER_DEFAULT));
      $contactno = trim(filter_input(INPUT_POST, 'contactno', FILTER_DEFAULT));
      $dob = trim(filter_input(INPUT_POST, 'dob', FILTER_DEFAULT));
      $gender = trim(filter_input(INPUT_POST, 'gender', FILTER_DEFAULT));
      
      $hushed_password =  password_hash($password, PASSWORD_DEFAULT);
       $UpdatedBy = $_SESSION['ttms_username'];
       
       if (DebsModel::create_user($username,$hushed_password,$first_name,$last_name,$other_name,$contactno,$gender,$dob,$UpdatedBy)){
      echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('User Account Successfuly Added', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/debs/adduser.php')},
            });   
            }); 
            </script>";
      
      
       }else{
              
                           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('User Account Successfuly Added', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/debs/adduser.php')},
            });   
            }); 
            </script>";
          }
          
          }
      
 
else if (isset ($_POST['add_school_debs']))
 {
      $emissno = trim(filter_input(INPUT_POST, 'emissno', FILTER_DEFAULT));
      $schoolname = trim(filter_input(INPUT_POST, 'schoolname', FILTER_DEFAULT));
      
      $longitude = trim(filter_input(INPUT_POST, 'longitude', FILTER_DEFAULT));
      $latitude = trim(filter_input(INPUT_POST, 'latitude', FILTER_DEFAULT));
     
      $password = '1234';
      $hushed_password =  password_hash($password, PASSWORD_DEFAULT);
       $UpdatedBy = $_SESSION['ttms_username'];
       
       if (DebsModel::create_school($emissno,$hushed_password,$schoolname,$longitude,$latitude,$UpdatedBy)){
      echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('School Account Successfuly Added', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/debs/addchool.php')},
            });   
            }); 
            </script>";
      
      
       }else{
              
                           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('School Account Successfuly Added', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/debs/addchool.php')},
            });   
            }); 
            </script>";
          }
 }
 
 else if (isset ($_POST['update_school_debs']))
 {
     $school_id = trim(filter_input(INPUT_POST, 'school_id', FILTER_DEFAULT));
      $emissno = trim(filter_input(INPUT_POST, 'emissno', FILTER_DEFAULT));
      $schoolname = trim(filter_input(INPUT_POST, 'schoolname', FILTER_DEFAULT));
      
      $longitude = trim(filter_input(INPUT_POST, 'longitude', FILTER_DEFAULT));
      $latitude = trim(filter_input(INPUT_POST, 'latitude', FILTER_DEFAULT));
     
     
       $UpdatedBy = $_SESSION['ttms_username'];
       
       if (DebsModel::update_school_data($school_id,$emissno,$schoolname,$longitude,$latitude,$UpdatedBy)){
      echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('School Data Successfuly Updated', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/debs/schoolprofile.php?id=$school_id')},
            });   
            }); 
            </script>";
      
      
       }else{
              
                           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('School Data Not Successfuly Updated', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/debs/schoolprofile.php?id=$school_id')},
            });   
            }); 
            </script>";
          }
 }
 
 else if (isset ($_POST['btn_upload_doc']))
 {
     
     $location = "/";
	//$file_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
     $file_name = $_FILES["file"]["name"];
     $file_type = $_FILES["file"]["type"];
	$file_new_name = file_get_contents($_FILES["file"]["tmp_name"]); // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
     
     
     $title = trim(filter_input(INPUT_POST, 'title', FILTER_DEFAULT));
   
      $discription = trim(filter_input(INPUT_POST, 'discription', FILTER_DEFAULT));
      
     
       $UpdatedBy = $_SESSION['ttms_username'];
       
       if (DebsModel::upload_debs_document($title,$file_name,$file_new_name,$discription,$UpdatedBy,$file_type)){
           //move_uploaded_file($file_temp, $location . $file_new_name);
      echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Document Uplaoded', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/debs/uploaddocuments.php')},
            });   
            }); 
            </script>";
      
      
       }else{
              
                           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Document Not Uplaoded', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/debs/uploaddocuments.php')},
            });   
            }); 
            </script>";
          }
 }
 
 else if (isset ($_POST['btn_upload_user_doc']))
 {
     
     $location = "/";
	//$file_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
     $file_name = $_FILES["file"]["name"];
     $file_type = $_FILES["file"]["type"];
	$file_new_name = file_get_contents($_FILES["file"]["tmp_name"]); // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
     
     
     $title = trim(filter_input(INPUT_POST, 'title', FILTER_DEFAULT));
   
      $discription = trim(filter_input(INPUT_POST, 'discription', FILTER_DEFAULT));
      
      $teacherid = $_SESSION['ttms_public_id'];
       $UpdatedBy = $_SESSION['ttms_username'];
       
       if (DebsModel::upload_user_document($title,$file_name,$file_new_name,$discription,$UpdatedBy,$file_type,$teacherid)){
           //move_uploaded_file($file_temp, $location . $file_new_name);
      echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Document Uplaoded', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/headteacher/uploaddocuments.php')},
            });   
            }); 
            </script>";
      
      
       }else{
              
                           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Document Not Uplaoded', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/headteacher/uploaddocuments.php')},
            });   
            }); 
            </script>";
          }
 }
 
  else if (isset ($_POST['btn_upload_user_doc_t']))
 {
     
     $location = "/";
	//$file_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
     $file_name = $_FILES["file"]["name"];
     $file_type = $_FILES["file"]["type"];
	$file_new_name = file_get_contents($_FILES["file"]["tmp_name"]); // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
     
     
     $title = trim(filter_input(INPUT_POST, 'title', FILTER_DEFAULT));
   
      $discription = trim(filter_input(INPUT_POST, 'discription', FILTER_DEFAULT));
      
      $teacherid = $_SESSION['ttms_public_id'];
       $UpdatedBy = $_SESSION['ttms_username'];
       
       if (DebsModel::upload_user_document($title,$file_name,$file_new_name,$discription,$UpdatedBy,$file_type,$teacherid)){
           //move_uploaded_file($file_temp, $location . $file_new_name);
      echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Document Uplaoded', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/teacher/uploaddocuments.php')},
            });   
            }); 
            </script>";
      
      
       }else{
              
                           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Document Not Uplaoded', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/teacher/uploaddocuments.php')},
            });   
            }); 
            </script>";
          }
 }
 
 
 else if (isset ($_POST['btn_add_school_staff']))
 {
      $username = trim(filter_input(INPUT_POST, 'username', FILTER_DEFAULT));
      $password = trim(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));
      
      $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_DEFAULT));
      $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_DEFAULT));
      $other_name = trim(filter_input(INPUT_POST, 'other_name', FILTER_DEFAULT));
      $contactno = trim(filter_input(INPUT_POST, 'contactno', FILTER_DEFAULT));
      $dob = trim(filter_input(INPUT_POST, 'dob', FILTER_DEFAULT));
      $gender = trim(filter_input(INPUT_POST, 'gender', FILTER_DEFAULT));
      
        $nrc = trim(filter_input(INPUT_POST, 'nrc', FILTER_DEFAULT));
        $passport = trim(filter_input(INPUT_POST, 'passport', FILTER_DEFAULT));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_DEFAULT));
        $position = trim(filter_input(INPUT_POST, 'position', FILTER_DEFAULT));
        $department_code = trim(filter_input(INPUT_POST, 'department_code', FILTER_DEFAULT));
        $selected_province_id = trim(filter_input(INPUT_POST, 'selected_province_id', FILTER_DEFAULT));
        $district_id = trim(filter_input(INPUT_POST, 'district_id', FILTER_DEFAULT));
        $primary_address = trim(filter_input(INPUT_POST, 'primary_address', FILTER_DEFAULT));
        $secomdary_address = trim(filter_input(INPUT_POST, 'secomdary_address', FILTER_DEFAULT));
        
              
        
      
      $hushed_password =  password_hash($password, PASSWORD_DEFAULT);
       $UpdatedBy = $_SESSION['ttms_username'];
       
          $SchoolID = $_SESSION['ttms_school_id'];
       
       if (SuperModel::create_staff($username,$hushed_password,$first_name,$last_name,$other_name,$contactno,$gender,$dob,$UpdatedBy,$nrc,$passport,$email,$position,$department_code,$selected_province_id,$district_id,$primary_address,$secomdary_address,$SchoolID)){
      echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Staff Account Successfuly Added', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/headteacher/addstaffmember.php')},
            });   
            }); 
            </script>";
      
      
       }else{
              
                           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Staff Account Successfuly Added', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/headteacher/addstaffmember.php')},
            });   
            }); 
            </script>";
          }
 }
 
 else if (isset ($_POST['txt']))
 {
     echo 'Test';  
 }