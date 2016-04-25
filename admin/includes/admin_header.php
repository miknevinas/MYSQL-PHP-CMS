<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../includes/db.php"?>

<?php 
if(!isset($_SESSION['user_role'])) {
   
    header("Location: ../index.php");
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Admin</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="js/scripts.js"></script>
    </head>