@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<!-- <h6 class="inner-title">Contacts</h6> -->
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.3398447441887!2d106.08747037479867!3d21.059084636577186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a0908207263f%3A0xd9e739454234cb59!2zdHQuIEjhu5MsIFRodeG6rW4gVGjDoG5oLCBC4bqvYyBOaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1587742915664!5m2!1svi!2s"></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2><b>Contact Form</b></h2>
					<div class="space20">&nbsp;</div>
					<p>Điền thông tin theo form dưới đây nếu bạn cần chúng tôi hỗ trợ</p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Họ tên">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Email">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Chủ đề">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Lời nhắn"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2><b>Contact Information</b></h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						121, thị trấn Hồ, Thuận Thành, Bắc Ninh
						
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Thắc mắc về kinh doanh</h6>
					<p>
						Mọi thắc mắc liên quan tới hoặt động kinh doanh hoặc hợp tác kinh doanh, vui lòng gửi thư tới địa chỉ email:
						<a href="mailto:biz@betadesign.com"><b>longanh1199@gmail.com</b></a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Tuyển dụng</h6>
					<p>
						Chúng tôi luôn luôn tìm kiếm những người tài năng để
                        làm việc cùng chúng tôi. Vui lòng gửi cv về địa chỉ dưới đây: <br>
						<a href="hr@betadesign.com"><b>longutehy@gmail.com</b></a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection