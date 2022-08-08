<script src="../../js/Jnotify/jquery-1.12.4.min.js" type="text/javascript"></script>
<link href="../../js/Jnotify/jnoty.min.css" rel="stylesheet" type="text/css"/>
<script src="../../js/Jnotify/jnoty.min.js" type="text/javascript"></script>

<?php

    require_once '../../db_connection/dbconfig.php';
    require_once '../../model/DebsModel.php';
       require_once '../../model/SuperModel.php';
    
    require_once '../super/SessionStart.php';

  
 
 if (isset ($_POST['btn_add_school_staff']))
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
        $position = 0;
        $department_code = 0;
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
                
               $.jnoty('User Account Successfuly Added', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/FMS/view/headteacher/addstaffmember.php')},
            });   
            }); 
            </script>";
      
      
       }else{
              
                           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Staff Account Not Successfuly Added', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/headteacher/addstaffmember.php')},
            });   
            }); 
            </script>";
          }
 }
 else if (isset ($_POST['btn_register_pupil']))
 {
     
      $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_DEFAULT));
      $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_DEFAULT));
      $other_name = trim(filter_input(INPUT_POST, 'other_name', FILTER_DEFAULT));
      $contactno = trim(filter_input(INPUT_POST, 'contactno', FILTER_DEFAULT));
      $dob = trim(filter_input(INPUT_POST, 'dob', FILTER_DEFAULT));
      $gender = trim(filter_input(INPUT_POST, 'gender', FILTER_DEFAULT));
      
        $nrc = trim(filter_input(INPUT_POST, 'nrc', FILTER_DEFAULT));
        $passport = trim(filter_input(INPUT_POST, 'passport', FILTER_DEFAULT));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_DEFAULT));
         $grade = trim(filter_input(INPUT_POST, 'grade', FILTER_DEFAULT));
        
        
        $selected_province_id = trim(filter_input(INPUT_POST, 'selected_province_id', FILTER_DEFAULT));
        $district_id = trim(filter_input(INPUT_POST, 'district_id', FILTER_DEFAULT));
        $primary_address = trim(filter_input(INPUT_POST, 'primary_address', FILTER_DEFAULT));
        $secomdary_address = trim(filter_input(INPUT_POST, 'secomdary_address', FILTER_DEFAULT));
        
              
        
      

       $UpdatedBy = $_SESSION['ttms_username'];
       
          $SchoolID = $_SESSION['ttms_school_id'];
       
       if (SuperModel::register_pupil($first_name,$last_name,$other_name,$contactno,$gender,$dob,$UpdatedBy,$nrc,$passport,$email,$selected_province_id,$district_id,$primary_address,$secomdary_address,$SchoolID,$grade)){
      echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Pupil Successfuly Registered', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/headteacher/registerpupil.php')},
            });   
            }); 
            </script>";
      
      
       }else{
              
                           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Pupil Not Successfuly Registered', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/RDMS/view/headteacher/registerpupil.php')},
            });   
            }); 
            </script>";
          }
 }
 else if (isset ($_POST['btn_add_amount']))
 {
     
      $amount = trim(filter_input(INPUT_POST, 'amount', FILTER_DEFAULT));
      
        
              
        
      

       $UpdatedBy = $_SESSION['ttms_username'];
       
          
       
       if (SuperModel::add_amount($amount,$UpdatedBy)){
      echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Pupil Successfuly Registered', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/FMS/view/admin/amountmaster.php')},
            });   
            }); 
            </script>";
      
      
       }else{
              
                           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Pupil Not Successfuly Registered', {
            sticky: false,
            header: 'Success',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/FMS/view/admin/amountmaster.php')},
            });   
            }); 
            </script>";
          }
 }