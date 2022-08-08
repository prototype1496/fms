<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DebsModel
 *
 * @author HP
 */
class DebsModel {
   public static function create_user($username,$password,$first_name,$last_name,$other_name,$contactno,$gender,$dob,$UpdatedBy) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            $query1 = "INSERT INTO `usermaster` (`PublicID`, `UserName`, `Password`, `FirstName`, `LastName`, `OtherName`, `ContactNo`, `GenderID`, `DOB`, `UserTypeID`, `UpdatedBy`, `IsActive`) VALUES (GetSequence(8), '$username', '$password', '$first_name', '$last_name', '$other_name', '$contactno', '$gender', '$dob', '1', '$UpdatedBy', '1');";
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
    
    
    
    
    public static function create_school($emissno,$hushed_password,$schoolname,$longitude,$latitude,$UpdatedBy) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            
                    
            $query1 = "INSERT INTO `usermaster` (`PublicID`, `UserName`, `Password`, `UserTypeID`, `UpdatedBy`, `IsActive`) VALUES (GetSequence(6), '$emissno', '$hushed_password', '4', '$UpdatedBy', '1');";
           
            $stm1 = $conn->prepare($query1);
            $stm1->execute();
            
            $query2 = "INSERT INTO `school` (`PublicID`, `EMISNO`, `SchoolName`, `Longitude`, `Latitude`, `IsActive`, `UpdatedBy`) VALUES (GetLastInsertedPublicID(4), '$emissno', '$schoolname', '$longitude', '$latitude', '1', '$UpdatedBy');";
            $stm2 = $conn->prepare($query2);
          
            $stm2->execute();

          
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
    
    
    
    
     
    public static function update_school_data($school_id,$emissno,$schoolname,$longitude,$latitude,$UpdatedBy) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            
                    
            $query1 = "UPDATE `school` SET `SchoolName`='$schoolname', `Longitude`='$longitude', `Latitude`='$latitude', `UpdatedBy`='$UpdatedBy' WHERE  `PublicID`='$school_id';";
           
            $stm1 = $conn->prepare($query1);
            $stm1->execute();
            
           

          
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
    
     public static function upload_debs_document($title,$file_name,$file_new_name,$discription,$UpdatedBy,$file_type) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            
            //  $query1 = "INSERT INTO `debsdocument` (`DocumentName`, `Discription`, `OldDocumentURL`, `DocumentURL`, `UpdatedBy`) VALUES ('$title', '$discription', '$file_name', '$file_new_name', '$UpdatedBy');";
                 
            $query1 = "INSERT INTO `debsdocument` (`DocumentName`, `Discription`, `OldDocumentURL`, `DocumentURL`, `UpdatedBy`,`Type`) VALUES (?, ?, ?, ?, ?,?);";
           
            $stm1 = $conn->prepare($query1);
            $stm1->bindParam(1, $title);
            $stm1->bindParam(2, $discription);
            $stm1->bindParam(3, $file_name);
            $stm1->bindParam(4, $file_new_name);
            $stm1->bindParam(5, $UpdatedBy);
            $stm1->bindParam(6, $file_type);
            
             $stm1->execute();
           

          
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
        
    
    
     public static function upload_user_document($title,$file_name,$file_new_name,$discription,$UpdatedBy,$file_type,$teacherid) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            
            //  $query1 = "INSERT INTO `debsdocument` (`DocumentName`, `Discription`, `OldDocumentURL`, `DocumentURL`, `UpdatedBy`) VALUES ('$title', '$discription', '$file_name', '$file_new_name', '$UpdatedBy');";
                 
            $query1 = "INSERT INTO `teacherdocumentdeatails` (`DocumentName`, `Discription`, `OldDocumentURL`, `Document`, `UpdatedBy`,`Type`,`TeacherDetailsPublicID`,`TeacherMasterID`) VALUES (?, ?, ?, ?, ?,?,GetSequence(9),?);";
           
            $stm1 = $conn->prepare($query1);
            $stm1->bindParam(1, $title);
            $stm1->bindParam(2, $discription);
            $stm1->bindParam(3, $file_name);
            $stm1->bindParam(4, $file_new_name);
            $stm1->bindParam(5, $UpdatedBy);
            $stm1->bindParam(6, $file_type);
             
              $stm1->bindParam(7, $teacherid);
             $stm1->execute();
           

          
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
    
    
    public static function delet_document($document_id) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            
            //  $query1 = "INSERT INTO `debsdocument` (`DocumentName`, `Discription`, `OldDocumentURL`, `DocumentURL`, `UpdatedBy`) VALUES ('$title', '$discription', '$file_name', '$file_new_name', '$UpdatedBy');";
                 
            $query1 = "DELETE FROM debsdocument WHERE DebsDocumentID = ?;";
           
            $stm1 = $conn->prepare($query1);
            $stm1->bindParam(1, $document_id);
            
            
             $stm1->execute();
           

          
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
    
    
    public static function delet_user_document($document_id) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            
            //  $query1 = "INSERT INTO `debsdocument` (`DocumentName`, `Discription`, `OldDocumentURL`, `DocumentURL`, `UpdatedBy`) VALUES ('$title', '$discription', '$file_name', '$file_new_name', '$UpdatedBy');";
                 
            $query1 = "DELETE FROM teacherdocumentdeatails WHERE TeacherDetailsPublicID = ?;";
           
            $stm1 = $conn->prepare($query1);
            $stm1->bindParam(1, $document_id);
            
            
             $stm1->execute();
           

          
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
    
    
    public static function get_all_registered_schools() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAmouts();";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
   
   
   
      public static function get_teacher_details_by_id($schoolID, $TeacherID) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetTeacherDetailsByID('$schoolID','$TeacherID');";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
       public static function get_teacher_documentdetails_by_id($TeacherID) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetTeacherDocumentDetailsByID('$TeacherID');";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
   
   
       public static function get_alldebs_documentdetails() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAllDebsDocument();";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
  
       public static function get_registered_school_by_id($school_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = " CALL GetRegisteredSchoolByID ('$school_id');";
        $stm = $conn->query($query);
      
            return $stm;
   }
   
   
        public static function get_all_teacher_by_school_id($school_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = " CALL GetAllTeachersBySchoolID('$school_id');";
        $stm = $conn->query($query);
      
            return $stm;
   }
   
      public static function get_documents($document_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "SELECT * FROM debsdocument WHERE DebsDocumentID=?";
        $stm = $conn->prepare($query);
        $stm->bindParam(1, $document_id);
        $stm->execute();
        $row = $stm->fetch();
           
            return $row;
      
   }
   
   
      public static function get_usr_documents($document_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "SELECT * FROM teacherdocumentdeatails WHERE TeacherDetailsPublicID=?";
        $stm = $conn->prepare($query);
        $stm->bindParam(1, $document_id);
        $stm->execute();
        $row = $stm->fetch();
           
            return $row;
      
   }
}
