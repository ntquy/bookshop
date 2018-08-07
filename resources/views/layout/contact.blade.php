@extends('layout.main_layout')
@section('title', trans('messages.contact'))

@section('content')
<section class="row-fluid">
	<div class="heading-bar">
		<h2>{{ trans('messages.contact') }}</h2>
		<span class="h-line"></span>
	</div>
	<section class="map-holder">       
		<iframe class="contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5846070144767!2d105.85330394993767!3d21.009281993751536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abf5a83b2a55%3A0x91888587bb7639ce!2zNDM0IFRy4bqnbiBLaMOhdCBDaMOibiwgUGjhu5EgSHXhur8sIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1533622531853" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section>   
	<div class="span6">
		<strong>{{ trans('messages.contact_info') }}</strong>
		<p>Phòng Đào tạo công ty Framgia Inc. - Chi nhánh Laboratory,<br /> Tầng 9, Tòa nhà HTP, 434 Trần Khát Chân, Quận Hai Bà Trưng, Hà Nội, <br />Việt Nam.</p>
		<p>{{ trans('messages.phone') }}: (0123) 456-7899 <br />Fax: +08 (123) 456-7899 <br />Email: <a href="#">contact@framgia.com</a> <br />Web: <a href="{{ url( '/' )}}">bookshoppe.com</a></p>
		<strong>{{ trans('messages.slogan') }}</strong>
		<p>{{ trans('messages.make') }}</p>
	</div>
		
</section>
	   
</section>
@endsection
