<?php

class HeadTeacherModel{
    
    

    public static function create_teacher($Teacher) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data new session into the session table
            $query1 = "INSERT INTO `teacher_register_db`.`usermaster` (`PublicID`, `NRC`, `Passport`, `UserName`, `Password`, `FirstName`, `LastName`, `OtherName`, `EmailAddress`, `ContactNo`, `GenderID`, `MaritalStatusID`, `DOB`, `UserTypeID`, `UpdatedBy`) VALUES (:PublicID, :NRC, :Passport, :UserName, :Password, :FirstName, :LastName, :OtherName, :EmailAddress, :ContactNo, :GenderID, :MaritalStatusID, :DOB, :UserTypeID, :UpdatedBy);";
            $stm = $conn->prepare($query1);
            $stm->execute(array(':PublicID'=>$Teacher->PublicID, ':NRC'=>$Teacher->NRC, ':Passport'=>$Teacher->Passport, ':UserName'=>$Teacher->UserName, ':Password'=>$Teacher->Password, ':FirstName'=>$Teacher->FirstName, ':LastName'=>$Teacher->LastName, ':OtherName'=>$Teacher->OtherName, ':EmailAddress'=>$Teacher->EmailAddress, ':ContactNo'=>$Teacher->ContactNo, ':GenderID'=>$Teacher->GenderID, ':MaritalStatusID'=>$Teacher->MaritalStatusID, ':DOB'=>$Teacher->DOB, ':UserTypeID'=>$Teacher->UserTypeID, ':UpdatedBy'=>$Teacher->UpdatedBy));

            
             //Insets data new session into the session table
            $query2 = "INSERT INTO `teacher_register_db`.`teachermaster` (`PublicUserID`, `PositionID`, `DepartmentCode`, `UpdatedBy`) VALUES (:PublicID, :PositionID,:DepartmentCode,:UpdatedBy);";
            $stm = $conn->prepare($query2);
            $stm->execute(array(':PublicID'=>$Teacher->PublicID, ':PositionID'=>$Teacher->PositionID, ':DepartmentCode'=>$Teacher->DepartmentID, ':UpdatedBy'=>$Teacher->UpdatedBy));

             
                //Insets data new session into the session table
            $query3 = "INSERT INTO `teacher_register_db`.`address` (`PrimaryAddress`, `SecondaryAddress`, `DistrictID`, `IdentificationID`) VALUES (:PrimaryAddress, :SecondaryAddress, :DistrictID, :IdentificationID);";
            $stm = $conn->prepare($query3);
            $stm->execute(array(':PrimaryAddress'=>$Teacher->PrimaryAddress,':SecondaryAddress'=>$Teacher->SecondaryAddress, ':DistrictID'=>$Teacher->DistrictID, ':IdentificationID'=>$Teacher->PublicID));

            
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
    
    
    
    
}