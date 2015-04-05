@extends('master')
<script src="js/ajaxioma.js"></script>	 
@section('main')
<div class="container">	
<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Vali Piirkonnad:</option>
  <option value="1">d</option>
  <option value="2">a</option>
  <option value="3">tere</option>
  <option value="13">Kannike</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Piirkonnad kuvatakse siia</b></div>
</div>	
@stop

