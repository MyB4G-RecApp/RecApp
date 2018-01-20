<?php
// Connect to Database
$db_host      = 'localhost';
$db_user      = 'root';
$db_password  = 'whollymath';
$db           = 'whollycoders';
$connection = mysqli_connect($db_host, $db_user, $db_password, $db) or die('>>> Connection Error!!!');
if($connection){
  $message = '<div class="alert alert-success" role="alert">>>> Welcome to WhollyCoder DBMS!!! --- Database Connection Successful...</div>';
}else{
  $message = '<div class="alert alert-danger" role="alert">>>> Database Connection Error!!!</div>';
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Database Connection</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php echo($message); ?>
    <div class="container">
      <h1>Database Connection Status</h1>
    </div>
  </body>
</html>
