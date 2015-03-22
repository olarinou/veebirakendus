<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>How To Display Data From Database Using PHP Ajax Bootstrap Responsive Table With Pagination</title>
<link href="css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">

function ajaxFunction(val){

var httpxml;

try{
  // Firefox, Opera 8.0+, Safari
  httpxml = new XMLHttpRequest();
}catch(e){
  // Internet Explorer
  try{
     httpxml = new ActiveXObject("Msxml2.XMLHTTP");
  }catch(e){
     try{
      httpxml = new ActiveXObject("Microsoft.XMLHTTP");
   }catch(e){
       alert("Your browser does not support AJAX!");
       return false;
   }
  }
}

function stateChanged(){

if(httpxml.readyState == 4){

var myObject = JSON.parse(httpxml.responseText);

var str="<div class=table-responsive><table class=table><tr><th>ID</th><th>Name</th><th>Address</th><th>Latitude</th><th>Longtitude</th></tr>";

for(i=0;i<myObject.data.length;i++){ 
   str = str + "<tr><td>" + myObject.data[i].id + " </td><td>" + myObject.data[i].name +  " </td><td>" + myObject.data[i].address + " </td><td>" + myObject.data[i].lat + "</td><td>" + myObject.data[i].lng + "</td></tr>";
}

var endrecord = myObject.value.endrecord 

myForm.end_record.value = endrecord;

if(myObject.value.end == "yes"){
   document.getElementById("fwd").style.display = 'inline';
}else{
   document.getElementById("fwd").style.display = 'none';
}

if(myObject.value.startrecord == "yes"){
   document.getElementById("back").style.display = 'inline';
}else{
   document.getElementById("back").style.display = 'none';
}

str = str + "</table>" 

document.getElementById("txtHint").innerHTML = str;
}
}
/////// Posting data to backend script ////
var url = "phpajaxdb.php";
var myendrecord = myForm.end_record.value;

url = url + "?endrecord=" + myendrecord;
url = url + "&direction=" + val;
url = url + "&sid=" + Math.random();
//alert(url);
httpxml.onreadystatechange = stateChanged;
httpxml.open("GET", url, true);
httpxml.send(null);
/////// end of posting data to backend script /////
 document.getElementById("txtHint").innerHTML = "Please Wait....";
}
</script>
</head>

<body onload="ajaxFunction('fw');">

<div class="container-fluid">

<h3>Display Location Address</h3>
<form name="myForm" onsubmit="ajaxFunction(this.form); return false">
   <input name="end_record" type="hidden" value="0">
   <div id="txtHint">
   <!-- Display data here -->
   <b>Records will be displayed here</b>
   </div>
   <input id="back" onclick="ajaxFunction('bk'); return false" type="button" value="Prev">
   &nbsp;
   <input id="fwd" onclick="ajaxFunction('fw');  return false" type="button" value="Next">
</form>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>