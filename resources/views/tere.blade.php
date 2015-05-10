@extends('master')
<script src="js/ajaxioma.js"></script>
<script src="js/viide.js"></script>	 
@section('main')
<div class="container">	
<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Vali nimi:</option>
  <option value="22">Peeter Paan</option>
  <option value="23">Tõnu Tõukemõnu</option>
  <option value="24">Aita Leida</option>
  <option value="25">Heli Kopter</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Nimed kuvatakse siia</b></div>
</div>	
@stop

