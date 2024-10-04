<?php
$con=null;
try {
    $con=new PDO("mysql:host=localhost;dbname=hr_management_system","root","");
    // echo "Database connection successful.";
} catch (Exception $e) {
    echo "There was an error connecting the database." . $e->getMessage();
    die;
}
?>