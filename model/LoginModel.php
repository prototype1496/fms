<?php

/**
 * Description of Login
 *
 * @author Alinuswe #prototype
 */
class Login {
   function get_schoolid_by_emis_no($username) {
        //this functiion is used to authenticate the user by usinng only the user name and reterning details of the user
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetSchoolIDBYEMISNO(:username)";
        $stm = $conn->prepare($query);
        $stm->execute(array(':username' => $username));

        if ($stm->rowCount() > 0) {

            //not the below code retuns an assaciative arrey with all the users infomation 
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row['PublicID'];
        }
    }
    function authenticate($User) {
        //this functiion is used to authenticate the user by usinng only the user name and reterning details of the user
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetUserByUsername(:username)";
        $stm = $conn->prepare($query);
        $stm->execute(array(':username' => $User->username));

        if ($stm->rowCount() > 0) {

            //not the below code retuns an assaciative arrey with all the users infomation 
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
    }

    function verify_password($user_data, $entered_password) {

        //$hashedPassword = password_hash($entered_password, PASSWORD_DEFAULT);
        //This function is used to verify if the entered password is the same as the one in the databes 
        //so as to authenticate the user
        $hushed_password = $user_data['Password'];
        $verifid_password = password_verify($entered_password, $hushed_password);


        return $verifid_password;
    }

 

    

    public static function redirect_user($User) {
        //This function is used to redirect useres based on their user type
        $user_type_id = $User['UserTypeID'];
        
        if ($user_type_id == 1) {
              Login::set_sessions($User['UserName'], $User['PublicID'],$User['Name'],$User['ShortHand'],$User['SchoolPublicID']);
            header('location:/FMS/view/admin/');
        } else if ($user_type_id == 4) {
            
               $username = $User['UserName'];
               
               $SchoolID = Login::get_schoolid_by_emis_no($username);
            Login::set_sessions($username, $User['PublicID'],$User['Name'],$User['ShortHand'],$SchoolID);
        
            header('location:/FMS/view/school/');
        } else if ($user_type_id == 3) {
            
           if ( $User['PositionID'] == 3){
               
                Login::set_sessions($User['UserName'], $User['PublicID'],$User['Name'],$User['ShortHand'],$User['SchoolPublicID']);
             header('location:/FMS/view/headteacher/');
           }
          
           else {
               
               Login::set_sessions($User['UserName'], $User['PublicID'],$User['Name'],$User['ShortHand'],$User['SchoolPublicID']);
             header('location:/FMS/view/teacher/');   
           }
              
        }else {
            
            header('location:/FMS/');   
        }
        
    }

    public static function set_sessions($username, $public_id,$user_names,$department,$school_id) {
        // This functionis used to set the username and public id session 
        // so as to use it the the system 
        $_SESSION['ttms_username'] = $username;
        $_SESSION['ttms_public_id'] = $public_id;
        $_SESSION['ttms_names'] = $user_names;
        $_SESSION['ttms_department_code'] = $department;
         $_SESSION['ttms_school_id'] = $school_id;
        
    }

    
    public static function encription_data($string, $action = 'e'){
        
       
    // you may change these values to your own
    $secret_key = '8534afe86d07040b05f6b10c158ae6c202c543715499086ff137abe0cb620ff88f3efa8fa8f203cc38bbb051ac0787da9124ff396316775d4d5922c2a46b06f9';
    $secret_iv = 'affd6d71c3b0aeb053fe2c7ca9088aa3b0e0aedcb75e9118307a13b3845c618adee1fffe1f5163e08596fa4a4c2b83ac1c76b4fff2ef2aefee4cbe74d685a198';

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }

    return $output;


    }
    
    

   

}
