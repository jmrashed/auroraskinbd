@extends('frontend.fontend_mastar')

@section('contant')
<style type="text/css"> 
</style>
<div class="banner_inner_content_agile_w3l">
  
</div>
<div class="services">
<div class="container">
    <h3 class="heading-agileinfo">Consultants<span>We offer extensive medical procedures to outbound and inbound patients.</span></h3>
  
    <div class="services-top-grids">

      <?php for($i=0; $i<12; $i++){?>
      <div class="col-md-4">
        <div class="grid1" style="margin:5px;">
          <img src="{{asset('/')}}frontend_source/images/d.png" style="height:64px; width:64px">
          <h4>Dr. Abdullah Al-Amin</h4>
          <h5>Traumotology</h5>
          <p>1364 Stiles Street, Pittsburgh, PA 15237</p>        
          <p>Phone: 412-630-6522</p> 
        </div>
      </div> 
      <?php } ?>


      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection



