<header id="header" class="header-always-fixed">
<div class="header-inner">
<div class="container">

<div id="logo">
<a href="{{asset('')}}">
<span class="logo-default">STTD</span>
<span class="logo-dark">STTD</span>
</a>
</div>


<!-- <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
<form class="search-form" action="https://inspirothemes.com/polo/search-results-page.html" method="get">
<input class="form-control" name="q" type="text" placeholder="Type & Search..." />
<span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
</form>
</div> -->


<div class="header-extras">
	<!-- <ul>
		<li>
		<a id="btn-search" href="#"> <i class="icon-search"></i></a>
		</li>
		<li>
		<div class="p-dropdown">
		<a href="#"><i class="icon-globe"></i><span>EN</span></a>
		<ul class="p-dropdown-content">
		<li><a href="#">French</a></li>
		<li><a href="#">Spanish</a></li>
		<li><a href="#">English</a></li>
		</ul>
		</div>
		</li>
	</ul> -->

@if(Auth::check())
<div class="p-dropdown">
	<a class="btn btn-light btn-shadow btn-round"><i class="icon-user"></i></a>
	<div class="p-dropdown-content">
		<div class="widget-myaccount">
			<div class="d-block">
				<img class="avatar avatar-lg" src="data/user/{{Auth::User()->avatar}}">
			</div>
			<span>{{Auth::User()->email}}</span>
			<p class="text-muted"><b>{{Auth::User()->your_name}}</b></p>
			<ul class="text-center">
				<li><a href="profile"><i class="icon-user"></i>My profile</a></li>
				<li><a href="messages"><i class="icon-mail"></i>Messages</a></li>
				<!-- <li><a href="settings"><i class="icon-settings"></i>Settings</a></li> -->
				<li><a href="logout"><i class="icon-log-out"></i>Sing Out</a>
			</li>
			</ul>
		</div>
	</div>
</div>
@else
<div class="p-dropdown">
	<a class="btn btn-light btn-shadow btn-round"><i class="icon-log-in"></i></a>
	<div class="p-dropdown-content">
		<div class="widget-form">
			<div class="col-md-12 text-center">
				<a href="signin" class="btn btn-block">Đăng nhập</a>
			</div>
			<div class="form-group mb-0">
				<p class="text-center"><a href="signup" id="signup">Đăng ký</a></p>
			</div>
		</div>
	</div>
</div>
@endif

<div class="p-dropdown" style="margin-left: 10px;">
<a class="btn btn-light btn-shadow btn-round"><i class="icon-shopping-cart"></i></a>
<div class="p-dropdown-content">
<div class="widget-mycart">
<h4>My Cart</h4>
<div class="cart-item">
<div class="cart-image"> <a href="#"><img src="images/shop/products/10.jpg"></a></div>
<div class="cart-product-meta">
<a href="#">Bolt Sweatshirt</a>
<span>3 x 28$</span>
</div>
<div class="cart-item-remove">
<a href="#"><i class="icon-x"></i></a></div>
</div>
<hr>
<div class="cart-total">
<div class="cart-total-labels">
<span>Subtotal</span>
<span>Taxes</span>
<span><strong>Total</strong></span>
</div>
<div class="cart-total-prices">
<span>320$</span>
<span>8%</span>
<span><strong>385$</strong></span>
</div>
</div>
<div class="cart-buttons text-right">
<button class="btn btn-xs">Checkout</button>
</div>
</div>
</div>
</div>

</div>

<div id="mainMenu-trigger">
<a class="lines-button x"><span class="lines"></span></a>
</div>


<div id="mainMenu" class="menu-center">
<div class="container">
<nav>
<ul>

<li><a href="{{asset('')}}">Trang chủ</a></li>
@foreach($menu as $val)
<li><a href="{{$val->slug}}">{{$val->name}}</a></li>
@endforeach

<!-- <li class="dropdown"><a href="#">Pages</a>

<ul class="dropdown-menu">
<li class="dropdown-submenu"><span class="dropdown-menu-title-only">Gallery</span>
<ul class="dropdown-menu">
<li><a href="page-gallery-2.html">Two Columns</a></li>
<li><a href="page-gallery-3.html">Three Columns</a></li>
</ul>
</li>

<li><a href="page-services.html">Services</a></li>
<li><a href="page-our-team.html">Our team</a></li>

</ul>

</li> -->


</ul>
</nav>
</div>
</div>

</div>
</div>
</header>