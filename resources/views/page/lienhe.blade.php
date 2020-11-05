
	@extends('home')
	@section('content')
<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>LIÊN HỆ</h4>
			<div class="site-pagination">
				<a href="{{route('trang-chu')}}">Home</a> /
				<a href="{{route('lien-he')}}">Contact</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->

	<!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 contact-info">
					<h3>Get in touch</h3>
					<p>Chúng tôi muốn nghe từ bạn về dịch vụ khách hàng, hàng hóa, trang web của chúng tôi hoặc bất kỳ chủ đề nào bạn muốn chia sẻ với chúng tôi. Nhận xét và đề xuất của bạn được đánh giá cao. Hãy hoàn thành mẫu đơn dưới dây.</p>
					<p>1 Nguyễn Thị Minh Khai, Phạm Ngũ Lão, Quận 1, Thành phố Hồ Chí Minh</p>
					<p>+84 99999999</p>
					<p>loriem@email.com</p>
					<div class="contact-social">
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				
				</div>
			</div>
		</div>
		<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5289796067595!2d106.6848419507182!3d10.770737992287787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f22d8b8555d%3A0x2f1342f16e62fe39!2zMSBOZ3V54buFbiBUaOG7iyBNaW5oIEtoYWksIFBoxrDhu51uZyBQaOG6oW0gTmfFqSBMw6NvLCBRdeG6rW4gMSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1600858188926!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
	</section>
	<!-- Contact section end -->



	@endsection