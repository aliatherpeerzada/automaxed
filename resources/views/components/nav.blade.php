<?php 

$total=App\Models\license::count();
$valid=App\Models\license::whereDate('expiry_date','>',date('Y-m-d'))->count();
$used=App\Models\license::where('allowed_activities',0)->count();
?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-3" id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
    
    <div class="row " style="width:100%">
      <div class="col-md-4 col-4 col-sm-4 nav-link text-white  " style="font-size: 25px;text-align:right"><span class="badge rounded-pill bg-secondary">{{$total}}</span> Total Licenses</div>
      {{-- <div class="col-md-3"></div> --}}
      <div class="col-md-4 col-4 col-sm-4 nav-link text-white"  style="font-size: 25px;text-align:right" ><span class="badge rounded-pill bg-secondary">{{$valid}}</span> Valid Licenses</div>
{{-- <div class="col-md-3"></div> --}}
<div class="col-md-4 nav-link col-4  col-sm-4 col- text-white"  style="font-size: 25px;text-align:right"><span class="badge rounded-pill bg-secondary">{{$used}}</span> Used Licenses</div>

</div>
   
  </div>

</nav>

