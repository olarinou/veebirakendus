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

@extends('master') 
@section('main')
        <div class="container"> 
            <p>Otsingu tulemused</p>
            @include('searchresults')
        </div>
@stop