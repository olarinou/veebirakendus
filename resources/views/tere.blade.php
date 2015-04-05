@extends('master')
<script src="js/ajaxioma.js"></script>	 
@section('main')
<div class="container">	
<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Vali nimi:</option>
  <option value="1">d</option>
  <option value="3">Ysyd</option>
  <option value="12">Test</option>
  <option value="13">Kannike</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Nimed kuvatakse siia</b></div>
</div>	
@stop

