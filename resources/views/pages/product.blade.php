@extends('layout.index')

@section('title'){{ isset($category->title) ? $category->title : $category->name }}@endsection
@section('description'){{$category->description}}@endsection
@section('keywords'){{$category->keywords}}@endsection
@section('robots'){{ $category->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$category['slug']}}@endsection
@section('css')
<link href="frontend/css/bootstrap.min.css" rel="stylesheet">
<link href="frontend/css/fonts.css" rel="stylesheet">
<link href="frontend/css/common.css" rel="stylesheet">
<link href="frontend/css/header.css" rel="stylesheet">
<link href="frontend/css/footer.css" rel="stylesheet">
<link href="frontend/css/form.css" rel="stylesheet">
<link href="frontend/css/widget.css" rel="stylesheet">
<link href="frontend/css/sort.css" rel="stylesheet">
<link href="frontend/css/card.css" rel="stylesheet">
@endsection
@section('content')

<!------------------- BREADCRUMB ------------------->
<section class="sec-breadcrumb">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
			<li class="breadcrumb-item active" aria-current="page">Tin tức</li>
			</ol>
		</nav>
	</div>
</section>
<!------------------- END: BREADCRUMB ------------------->


<!------------------- CARD ------------------->
<section class="card-grid sales-sec">
	<div class="container">
		<h3 class="text-uppercase title-subpage">Mua bán nhà đất toàn quốc</h3>
		<div class="row">
			<div class="col-lg-9">
				<div class="sort-box">
					<span>có <span class="text-main font-weight-semibold">1.000</span> sản phẩm</span>
					<div class="sort-ct">
						<!-- <div class="dropdown">
							<a class="btn ripple-effect dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
								<span>Hiển thị: Tất cả <i class="icon-down ms-2"></i></span>
							</a>
							<ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
								<li><a class="dropdown-item checked" href="#">Tất cả</a></li>
								<li><a class="dropdown-item" href="#">Chung cư</a></li>
								<li><a class="dropdown-item" href="#">Biệt thự - Liền kề</a></li>
							</ul>
						</div> -->
						<button type="button" class="btn setting-view hor-view " onclick="horView()"><i class="icon-menu"></i></button>
						<button type="button" class="btn setting-view grid-view actived" onclick="gridView()"><i class="icon-grid"></i></button>
					</div>
				</div>
				<div class="row row-cols-2 row-cols-md-3 g-4 grid-view" id="show-setting">
					@foreach($product as $val)
					<div class="col">
						<div class="card card-s card-s4">
							<!-- <span class="hot"><img src="frontend/images/new-label.png"></span> -->
							<a href="{{$val->category->slug}}/{{$val->slug}}">
								<span><img src="frontend/images/space-3.gif" class="card-img-top" style="background-image: url('data/product/300/{{$val->img}}');" alt="..."></span>
							</a>
							<div class="card-body">
								<div class="card-body-wrap">
									<h5 class="card-title"><a href="{{$val->category->slug}}/{{$val->slug}}" class="text-truncate">{{$val->name}}</a></h5>
									<div class="card-info">
										<span><i class="icon-location me-2"></i>Nam Từ Liêm, Hà Nội</span>
									</div>
									<p class="mb-0 text-truncate-set text-truncate-set-2">Chính chủ cần chuyển nhượng gấp căn 2 ngủ diện tích thông thủy 78m2 full đồ, khách mua chỉ cần dọn quần áo đến có thể ở ngay</p>
								</div>
								<div class="card-footer">
									<div class="card-price">Giá: <span class="current-price">{{$val->product->price}} tỷ</span><span class="old-price">5,6 tỷ</span></div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="load-more text-center mt-4 pt-2">
					<div class="cta-btn ir">
						<a class="" href="#"><span class="cta-text font-weight-semibold">Xem thêm</span><span class="cta-ico"><i class="icon-down"></i></span></a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 d-none d-lg-block">
				<div class="widget widget-list mb-3">
					<h4><span>Biểu đồ giá</span></h4>
					<ul>
						<li><a href="#"><i class="icon-next me-2"></i>Đường Ngụy Như Kontum</a></li>
					</ul>
				</div>

				<div class="widget widget-list widget-hightlight mb-3">
					<h4><span>Sản phẩm bán nhiều</span></h4>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="flexCheck1">
						<label class="form-check-label" for="flexCheck1">
							Quận Hai Bà Trưng (1.000)
						</label>
					  </div>
				</div>
			</div>
		</div>
	</div>
</section>
<!------------------- END CARD ------------------->

@endsection

@section('script')
<!------------------- JS core------------------->
<script src="frontend/js/bootstrap.bundle.min.js"></script>
<script src="frontend/js/custom.js"></script>

<!------------------- SLIDER ON MOBILE ------------------->

<script>
	function gridView() {
		document.querySelector('.grid-view').classList.add("actived")
		document.querySelector('.hor-view').classList.remove("actived")
		document.querySelector('#show-setting').classList.remove('row-cols-2', 'row-cols-md-1', 'horizontal-view')
		document.querySelector('#show-setting').classList.add('row-cols-2', 'row-cols-md-3', 'grid-view')
	}
	function horView() {
		document.querySelector('.hor-view').classList.add("actived")
		document.querySelector('.grid-view').classList.remove("actived")
		document.querySelector('#show-setting').classList.add('row-cols-2', 'row-cols-md-1', 'horizontal-view')
		document.querySelector('#show-setting').classList.remove('row-cols-2', 'row-cols-md-3', 'grid-view')
	}

	// Notification & Account Nav Vertical Click
	var testNoti = document.getElementById('review-4-phuong');
		toggleFloatingMenuClose.onclick = function() {
			var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
			var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
				return new bootstrap.Dropdown(dropdownToggleEl)
			})
		}
</script>
@endsection