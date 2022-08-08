<?php

if (isset($_POST['btn_pupil_data']))
    {
      $grade = strip_tags(trim(filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_STRING))); 
   
    
     header("Location:/RDMS/view/headteacher/listofpupilsreport.php?grade=$grade");
    
    }
    else if (isset($_POST['btn_pupil_data_t']))
    {
      $grade = strip_tags(trim(filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_STRING))); 
   
    
     header("Location:/RDMS/view/teacher/listofpupilsreport.php?grade=$grade");
    
    }
    
      else if (isset($_POST['btn_pupil_data_s']))
    {
      $grade = strip_tags(trim(filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_STRING))); 
   
    
     header("Location:/RDMS/view/school/listofpupilsreport.php?grade=$grade");
    
    }
 
    else {
        
        echo '<h1>You do not have acces to this page</h1>';
    }