<?php

class SuperModel{
    
    
     //this starts FMS 
     public static function get_all_fuel_price_list() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAmouts();";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
   
   
     public static function get_all_depos() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAreas();";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
    
    
     public static function add_amount($amount,$UpdatedBy) 
            {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            $query = "INSERT INTO `amountmaster` (`amount`, `UpdatedBy`) VALUES ( '$amount', '$UpdatedBy');";
            $stm = $conn->prepare($query);
            $stm->execute();
            
            
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
   
    
    
     public static function add_meter_readings($AreaID,$waterReading,$AudwinoID,$updated_by) {
        
       
       
      $rounded_value  =  round($waterReading,2);
      
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user master tabble
            $query1 = "INSERT INTO `readings` (`AreaID`, `Hight`, `AudwinoID`, `UpdatedBy`) VALUES ('$AreaID', '$waterReading','$AudwinoID', '$updated_by');";
            
           
            $stm = $conn->prepare($query1);
            
           
            $stm->execute();


            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
           echo $exc->getMessage();
            return FALSE;
        }
    }
    
    
     public static function add_depo($depo_name,$selected_province_id,$district_id,$UpdatedBy) {
        
       
       
     
      
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user master tabble
            $query1 = "INSERT INTO area (AreaName, DistrictID, ProvinceID, AreaPublicID, UpdateBy) VALUES ('$depo_name', '$district_id','$selected_province_id',GetSequence(13), '$UpdatedBy');";
            
           
            $stm = $conn->prepare($query1);
            
           
            $stm->execute();


            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
           echo $exc->getMessage();
            return FALSE;
        }
    }
    //this ends FMS 
    
    
    
    
    
    
    
    
    
    
    //This is the section for teacher's reoprt 
    

   
   public static function get_department_by_code($department_code) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetDepartmentByCode('$department_code');";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       

         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
      
         
            return $row;
            
       
   }
    
    //This is the end of the teacher report 
   
   
   public static function get_gender() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetGender();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
   

   
   
   
   //***********************************************************************************
   //This section contains the reports form RDMS
   
   public static function get_list_of_students() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetListOfStudentsReport();";
        $stm = $conn->query($query);
     
            return $stm;
      
   }
   
    public static function get_list_of_students_by_grade($grade) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetListOfAllStudentsByGradeReport('$grade');";
        $stm = $conn->query($query);
     
            return $stm;
      
   }
   
   //***************************************************************************************
   //******************************************************************************
   //Thsis section contains functions for RDMS
   
    public static function create_staff($username,$hushed_password,$first_name,$last_name,$other_name,$contactno,$gender,$dob,$UpdatedBy,$nrc,$passport,$email,$position,$department_code,$selected_province_id,$district_id,$primary_address,$secomdary_address,$SchoolID) 
            {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            $query = "INSERT INTO `usermaster` (`PublicID`, `UserName`, `Password`, `FirstName`, `LastName`, `OtherName`, `ContactNo`, `GenderID`, `DOB`, `UserTypeID`, `UpdatedBy`, `IsActive`,`NRC`,`Passport`,`EmailAddress`) VALUES (GetSequence(1), '$username', '$hushed_password', '$first_name', '$last_name', '$other_name', '$contactno', '$gender', '$dob', '1', '$UpdatedBy', '1','$nrc','$passport','$email');";
            $stm = $conn->prepare($query);
            $stm->execute();
            
            
            
            
            
              $query3 = "INSERT INTO `address` (`PrimaryAddress`, `SecondaryAddress`, `DistrictID`, `IdentificationID`) VALUES ('$primary_address', '$secomdary_address', '$district_id',GetLastInsertedPublicID(3));";
            $stm3 = $conn->prepare($query3);
            $stm3->execute();

          
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
   
    
    
    public static function register_pupil($first_name,$last_name,$other_name,$contactno,$gender,$dob,$UpdatedBy,$nrc,$passport,$email,$selected_province_id,$district_id,$primary_address,$secomdary_address,$SchoolID,$grade) 
            {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            $query = "INSERT INTO `pupilmaster` (`PublicID`, `SchoolID`, `NRC`, `Passport`, `FirstName`, `LastName`, `OtherName`, `EmailAddress`, `ContactNo`, `GenderID`, `DOB`, `UpdatedBy`, `IsActive`,`Grade`) VALUES (GetSequence(12), '$SchoolID', '$nrc', '$passport', '$first_name', '$last_name', '$other_name', '$email', '$contactno ', '$gender ', '$dob ', '$UpdatedBy', '1','$grade');";
            $stm = $conn->prepare($query);
            $stm->execute();
            
            
          
              $query3 = "INSERT INTO `address` (`PrimaryAddress`, `SecondaryAddress`, `DistrictID`, `IdentificationID`) VALUES ('$primary_address', '$secomdary_address', '$district_id',GetLastInsertedPupilID());";
            $stm3 = $conn->prepare($query3);
            $stm3->execute();

          
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
   
   
   
   //**********************************************************************************
   
   
   
   
   public static function get_empty_result() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetEmptyResult();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
      public static function get_marital_status() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetMaritalStatus();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
      public static function get_country_code() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetCountryCode();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
     public static function get_teacher_positions() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetPositions();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
   
      public static function get_all_school_depatments() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAllDepartments();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
        public static function get_provinces() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetProvinces();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
   
    
   
    public static function get_sequence_id($sequence_number) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        
        
        $query = "CALL GetSequence($sequence_number);";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();

         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
            return $row['SequnceNumber'];
      
    }
    
   

    
     function get_districts_by_provinceid($provinceid) {
        //This function is used to load the districts whih a given province ID
         $Connection = new Connection();
        $conn = $Connection->connect();

        // this is the stored procidure from the datbaes that is loading the destrics after passing in an province ID 
        $query = "CALL GetDistrictByProvinceId(:province);";


     
        $stm = $conn->prepare($query);
        $stm->execute(array(':province' => $provinceid));

        if ($stm->rowCount() > 0) {

             //What the beow lines of code are doing is they are loading a districts and displying them in a dropdown using php

            echo "<div class=''>  <div class='col-sm-4'>  "
            . "<label for=district_id'  class='control-label col-ms-4'>District (required)</label> "
                    . "  <select class='form-control' name='district_id' required='required' ><option value='' selected disabled=''>Select District</option>";
            while ( $row = $stm->fetch(PDO::FETCH_ASSOC)) {


                echo "<option value=" . $row['districtId'] . ">" . $row['name'] . "</option>";
                //echo "<option vlaue='21'>".$row['name']."</option>";name
            }

            echo"</select>";
        } else {

            echo  "<div class='col-sm-4'>"
            . "<label for='district_id'  class='control-label col-ms-4'>District (required)</label>"
                    . " <select class='form-control' name='district_id' required='required'><option value=''  selected disabled='' >Select District</option> </select>  </div>";
        }
            
        
        
    }
   
    
    
    
    
    
    
    //The below functionis for user activation #
    
    public static function search_for_user($shearch_data, $search_query)
    {
           $Connection = new Connection();
        $conn = $Connection->connect();
       
       if($search_query == 1)
           {
          $query = "CALL SearchUsers('$shearch_data', '$shearch_data', '$shearch_data');";
        
           }
       if($search_query == 2)
           {
          $query = "CALL SearchActivatedUsers('$shearch_data', '$shearch_data', '$shearch_data');";
        
           } 
     
       
      $stm = $conn->query($query);
       
        
            return $stm;
         }
    
      
    
         
         public static function get_user_details_by_id($teacher_master_id) {
       //This function is used to get the Public ID form the teacher master table 
        // note that the GetTeacherDetailsByUsername sp can return more information if it is modified
        
        $Connection = new Connection();
        $conn = $Connection->connect();
       
        $query = "CALL GetUserDetailsByID('$teacher_master_id');";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();

         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
            return $row;
      
    }
         
   }