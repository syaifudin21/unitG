@extends('front.front-template')

@section('banner')
<div class="slider-img ">
  <div class="container">
    <div class="slider-info">
      <h5>{{env('APP_NAME')}}</h5>
      <h4> {{$profil->nama}}</h4>
      <p>{{env('APP_DESKRIPSI')}}</p>
    </div>
    <div class="outs_more-buttn mt-md-4 mt-3">
      <a href="{{route('pasien.daftar')}}">Daftar Sekarang</a>
    </div>
  </div>
</div>
@endsection

@section('content')
<section class="team py-lg-4 py-md-3 py-sm-3 py-3" id="team">
  <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
    <h5 class="top-title mb-lg-4 mb-3 text-center">Our Team</h5>
    <h3 class="title mb-lg-5 mb-md-4 mb-sm-4 mb-3 text-center">Meet Our Team</h3>
    <div class="row">
      <div class="col-lg-4 col-md-4 team-w3layouts-grids text-center my-3">
        <img src="{{asset('front/images/t1.jpg')}}" alt="news image" class="img-fluid">
        <div class="team-icons text-center mt-md-4 mt-3">
          <ul>
            <li class="facebook">
              <a href="#">
                <span class="fa fa-facebook"></span>
              </a>
            </li>
            <li class="twitter">
              <a href="#">
                <span class="fa fa-twitter"></span>
              </a>
            </li>
            <li class="rss">
              <a href="#">
                <span class="fa fa-rss"></span>
              </a>
            </li>
            <li class="gmail">
              <a href="#">
                <span class="fa fa-envelope"></span>
              </a>
            </li>
          </ul>
        </div>
        <p class="mt-2">sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet eiusmod tempor incididunt</p>
        <h6 class="mt-3"> Sophia Miller</h6>
      </div>
      <div class="col-lg-4 col-md-4 team-w3layouts-grids text-center my-3">
        <img src="{{asset('front/images/t2.jpg')}}" alt="news image" class="img-fluid">
        <div class="team-icons text-center mt-md-4 mt-3">
          <ul>
            <li class="facebook">
              <a href="#">
                <span class="fa fa-facebook"></span>
              </a>
            </li>
            <li class="twitter">
              <a href="#">
                <span class="fa fa-twitter"></span>
              </a>
            </li>
            <li class="rss">
              <a href="#">
                <span class="fa fa-rss"></span>
              </a>
            </li>
            <li class="gmail">
              <a href="#">
                <span class="fa fa-envelope"></span>
              </a>
            </li>
          </ul>
        </div>
        <p class="mt-2">sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet eiusmod tempor incididunt</p>
        <h6 class="mt-3">Marker Sam</h6>
      </div>
      <div class="col-lg-4 col-md-4 team-w3layouts-grids text-center my-3">
        <img src="{{asset('front/images/t3.jpg')}}" alt="news image" class="img-fluid">
        <div class="team-icons text-center mt-md-4 mt-3">
          <ul>
            <li class="facebook">
              <a href="#">
                <span class="fa fa-facebook"></span>
              </a>
            </li>
            <li class="twitter">
              <a href="#">
                <span class="fa fa-twitter"></span>
              </a>
            </li>
            <li class="rss">
              <a href="#">
                <span class="fa fa-rss"></span>
              </a>
            </li>
            <li class="gmail">
              <a href="#">
                <span class="fa fa-envelope"></span>
              </a>
            </li>
          </ul>
        </div>
        <p class="mt-2">sed do eiusmod tempor incididunt ut Lorem ipsum dolor sit amet eiusmod tempor incididunt</p>
        <h6 class="mt-3">Olivia Smith</h6>
      </div>
    </div>
  </div>
</section>
<!--//team -->
<!-- matter -->
<section class="advertise-count py-lg-4 py-md-3 py-sm-3 py-3">
  <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
    <div class="order-show-w3ls ">
      <h4>10 Health Benefits: What Secrets Do Watermelons Keep?</h4>
      <div class="outs_more-buttn mt-md-4 mt-3">
        <a href="#contact">Order Now</a>
      </div>
    </div>
  </div>
</section>
@endsection