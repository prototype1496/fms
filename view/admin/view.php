<?php
 require_once '../../db_connection/dbconfig.php';
    require_once '../../model/DebsModel.php';
    
    
    $id = $_GET['id'];
    
    $row  = DebsModel::get_documents($id );
    header('Content-Type:'.$row['Type']); 
    echo $row['DocumentURL'];
?>

