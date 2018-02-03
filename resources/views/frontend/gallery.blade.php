@extends('frontend.fontend_mastar')

@section('contant')
<div class="banner_inner_content_agile_w3l">
  
</div>  
 <div class="gallery">

    <h2 class="heading-agileinfo">Our Gallery<span>We offer extensive medical procedures to outbound and inbound patients.</span></h2>
    <div class="container">
      <div class="gallery-grids">
        <?php           
          foreach ($boi_gallerys as $row) {?>
          <div class="col-md-4 col-sm-4 gallery-grid">
            <div class="grid">
              <figure class="effect-apollo">
                <a class="example-image-link" href="{{asset('/uploads/gallery')}}/{{$row->image}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut sem ac lectus mattis sagittis. Donec pulvinar quam sit amet est vestibulum volutpat. Phasellus sed nibh odio. Phasellus posuere at purus sit amet porttitor. Cras euismod egestas enim eget molestie. Aenean ornare condimentum odio, in lacinia felis finibus non. Nam faucibus libero et lectus finibus, sed porttitor velit pellentesque.">
                  <img src="{{asset('/uploads/gallery')}}/{{$row->image}}" alt="">
                  <figcaption>
                    <p>Proin vitae luctus dui, sit amet ultricies leo</p>
                  </figcaption> 
                </a>
              </figure>
            </div>
          </div>
          <?php } ?> 
          <div class="clearfix"> </div>
          <script src="js/lightbox-plus-jquery.min.js"> </script>
      </div>
    </div>
  </div>
@endsection



