<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "Admin123", "vv_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$search_sql="SELECT * FROM kandidaadid WHERE nimi LIKE '%".$_POST['nimi']."%'";
$search_query=mysqli_query($link, $search_sql);
if(mysqli_num_rows($search_query) > 0) {
$search_rs=mysqli_fetch_assoc($search_query);
}
?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Veebivalimised</title>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="theme.css">                
        </head>             
        <body>
        <div class="nav">
      <div class="container">
        <?php include('menu.php'); ?>
      </div>
    </div>          
    <div class="body">
        <div class="container"> 
            <p>Otsingu tulemused</p>
            <?php include('searchresults.php'); ?>
        </div>
    </div>

    <div class="footer">
        <div class="container">
        <p>Veebivalimised on loodud aine Veebirakenduste loomine korras</p>
        </div>
    </div>

        </body>
</html>