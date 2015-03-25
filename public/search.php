<?php
    mysql_connect("localhost", "root", "Admin123") or die("Error connecting to database: ".mysql_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysql_select_db("vv_db") or die(mysql_error());
    /* tutorial_search is the name of database we've created */
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
<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM kandidaadid
            WHERE (`nimi` LIKE '%".$query."%') OR (`erakond` LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<p><h3>".$results['nimi']."</h3>".$results['erakond']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
?>
</div>
    </div>

    <div class="footer">
        <div class="container">
        <p>Veebivalimised on loodud aine Veebirakenduste loomine korras</p>
        </div>
    </div>

        </body>
</html>