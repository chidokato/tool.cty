@extends('layout.index')

@section('title'){{ isset($articles->title) ? $articles->title : $articles->name }}@endsection
@section('description'){{$articles->description}}@endsection
@section('keywords'){{$articles->keywords}}@endsection
@section('robots'){{ $articles->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$articles->category->slug.'/'.$articles->slug.'.html'}}@endsection

@section('css')
<link href="frontend/css/bootstrap.min.css" rel="stylesheet">
<link href="frontend/css/swiper-bundle.min.css" rel="stylesheet">
<link href="frontend/css/fonts.css" rel="stylesheet">
<link href="frontend/css/common.css" rel="stylesheet">
<link href="frontend/css/header.css" rel="stylesheet">
<link href="frontend/css/footer.css" rel="stylesheet">
<link href="frontend/css/widget.css" rel="stylesheet">
<link href="frontend/css/card.css" rel="stylesheet">
<link href="frontend/css/article.css" rel="stylesheet">
@endsection
@section('content')

<!------------------- BREADCRUMB ------------------->
<section class="sec-breadcrumb">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{asset('')}}">Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="{{$articles->category->slug}}">{{$articles->category->name}}</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{$articles->name}}</li>
			</ol>
		</nav>
	</div>
</section>
<!------------------- END: BREADCRUMB ------------------->


<!------------------- CARD ------------------->
<section class="card-grid news-sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="label-subpage"><span>{{$articles->category->name}}</span></div>
				<div class="title-subpage">
					<div class="time-box">
						<span>{{date('d/m',strtotime($articles->created_at))}}</span>
						<span><i class="icon-time me-1"></i>{{date('Y',strtotime($articles->created_at))}}</span>
					</div>
					<h1>{{$articles->name}}</h1>
				</div>
				<div class="main-content">
					<div class="row">
						<div class="col-md-2">
							<div class="share-social affix">
								<span><small>Share</small></span>
								<ul>
									<li><a href="#"><i class="icon-facebook"></i></a></li>
									<li><a href="#"><i class="icon-zalo"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-10">
							<div class="main-article">
								<div class="description">
									{{$articles->detail}}
								</div>
								{!! $articles->content !!}
							</div>
						</div>
					</div>
					
				</div>
				<div class="tags">
					<span>tags</span>
					<ul>
						<li><a href="#">Bất động sản</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 d-none d-lg-block">

				<div class="widget widget-list mb-3">
					<h4><span>Tin tức</span></h4>
					<ul>
						<li><a href="#"><i class="icon-next me-2"></i>Thị trường bất động sản</a></li>
					</ul>
				</div>

				<div class="widget widget-list widget-news mb-3">
					<h4><span>Tin tức nổi bật</span></h4>
					<a href="#" class="news-item">
						<span><img src="frontend/images/space-3.gif" style="background-image: url('https://media.ex-cdn.com/EXP/media.taichinhdoanhnghiep.net.vn/files/news/2021/03/26/ha-noi-diem-danh-nhieu-ong-trum-bat-dong-san-tri-hoan-nop-tien-dat-134146.jpg');" alt="" class="w-100"></span>
						<div class="news-item-body">
							<span class="date"><i class="icon-time me-1"></i>2 ngày trước</span>
							<p class="mb-0 text-truncate-set text-truncate-set-2">Chính chủ cần chuyển nhượng gấp căn hộ diện tích 80m2</p>
						</div>
					</a>
					
				</div>

			</div>
		</div>

		
	</div>
</section>
<!------------------- END CARD ------------------->

<!------------------- RELATED ------------------->
<div class="related-sec">
	<div class="container">
		<div class="related">
			<div class="cover-title-home">
				<div class="text-start">
					<div class="cover-title">
						<h2><span class="cover-title-filled text-main">Tin tức liên quan</span></h2>
					</div>
				</div>
			</div>
			<div class="position-relative">
				<div class="swiper mySwiper">
					<div class="swiper-wrapper">
						
						<div class="swiper-slide">
							<div class="card card-s card-s4">
								<a href="#">
									<span><img src="frontend/images/space-3.gif" class="card-img-top" style="background-image: url('https://eaglereal.net/wp-content/uploads/2020/04/phoi-canh-du-an-green-square-1024x768.jpg');" alt="..."></span>
									<span class="view-more">Chi tiết</span>
								</a>
								<div class="card-body">
									<div class="card-body-wrap">
										<h5 class="card-title"><a href="#" class="text-truncate-set text-truncate-set-2">Nhà tiền chế cấp 4 nhiều phòng ngủ</a></h5>
										<div class="card-info">
											<span><i class="icon-time me-2"></i>15/02/2022</span>
										</div>
									</div>
									<div class="card-text">
										<p class="text-truncate-set text-truncate-set-2 mb-0">Vì sao giá bất động sản ven sông lại có biên độ tăng giá tốt nhất TP.HCM hiện nay?</p>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="swiper-pagination"></div>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
	</div>
</div>
<!------------------- END RELATED ------------------->

@endsection
@section('script')
<script src="frontend/js/bootstrap.bundle.min.js"></script>
<script src="frontend/js/swiper-bundle.min.js"></script>
<script src="frontend/js/custom.js"></script>
<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper(".mySwiper", {
			slidesPerView: 1,
			spaceBetween: 10,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			// Responsive breakpoints
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 2,
					spaceBetween: 20
				},
				// when window width is >= 480px
				768: {
					slidesPerView: 3,
					spaceBetween: 30,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 4,
					spaceBetween: 20,
					navigation: {
						nextEl: ".swiper-button-next",
						prevEl: ".swiper-button-prev",
					},
				}
			},	
		});
</script>
@endsection