<div class=" pos_bannerslide">
<div class="slideshow_container" data-speed="600" data-time="6000" data-nav="false" data-pag="true" data-pausehover="hover">
<div class="pos-slideshow">
<div class="flexslider ma-nivoslider">
<div id="pos-slideshow-home" class="slides">
@foreach($slider as $key => $val)
<a href="" title="slide show" ><img style="display:none" src="data/themes/{{$val->img}}"  data-thumb="data/themes/{{$val->img}}"  alt="" title="#{{$val->id}}"  /> </a>
@endforeach
</div>
@foreach($slider as $key => $val)
<div id="{{$val->id}}" class="pos-slideshow-caption nivo-html-caption nivo-caption">					
<div class="timethai" style="position:absolute;top:0;left:0;z-index:8;background-color: rgba(49, 56, 72, 0.298);height:5px;-webkit-animation: myfirst 6000ms ease-in-out;-moz-animation: myfirst 6000ms ease-in-out;-ms-animation: myfirst 6000ms ease-in-out;animation: myfirst 6000ms ease-in-out;">
</div>
<div class="banner7-des">
<div class="container">
<div class="desc_slideshow desc_slideshow_0 position_left">
<div class="info">
<h5 data-animation="animated fadeInDown " class="transition_slide_0">{{$val->name}}</h5>
<h2 data-animation="animated fadeInLeft " class="transition_slide_1">Bluetooth Gamepad</h2>
<h2 data-animation="animated fadeInRight " class="transition_slide_2">IPEGA PG-9sss023</h2>
<a href="" data-animation="animated zoomIn" class="readmore transition_slide_3">Shop Now</a>
</div>
</div>
</div> 
</div>
</div>
@endforeach
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
function doAnimations( elems ) {
var animEndEv = 'webkitAnimationEnd animationend';
elems.each(function () {
var $this = $(this),
$animationType = $this.data('animation');
$this.addClass($animationType).one(animEndEv, function () {
$this.removeClass($animationType);
});
});
}
var $myCarousel = $('.ma-nivoslider'),
$firstAnimatingElems = $myCarousel.find('.nivo-caption').find("[data-animation ^= 'animated']");
doAnimations($firstAnimatingElems);
});
</script>
</div>