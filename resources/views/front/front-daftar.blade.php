@extends('front.front-template')

@section('banner')
<div class="slider-img ">
  <div class="container">
    <div class="slider-info">
      <h5>Pendaftar {{env('APP_NAME')}}</h5>
      <h4> {{$profil->nama}}</h4>
      <p>Pendaftaran tidak perlu menunggu sakit, Lakukan pendaftaran agar proses penanganan pasien yang terhambat  admnistrasi lebih cepat</p>
    </div>
  </div>
</div>
@endsection

@section('content')

<section class="contact" id="contact">
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-7 col-md-6 contact-form-txt">
        <form action="#" method="post">
          <div class="form-group contact-forms">
            <input type="text" class="form-control" placeholder="Nama" required="" name="nama" value="{{old('nama')}}">
            @if ($errors->has('nama'))
                <strong class="text-danger">{{ $errors->first('nama') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <input type="text" class="form-control" placeholder="Username" required="" name="username" value="{{old('username')}}">
            @if ($errors->has('username'))
                <strong class="text-danger">{{ $errors->first('username') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <input type="password" class="form-control" placeholder="Password" required="" name="password">
          </div>
          <div class="form-group contact-forms">
            <select name="lp" class="form-control">
              <option>Laki-laki</option>
              <option>Perempuan</option>
            </select>
            @if ($errors->has('lp'))
                <strong class="text-danger">{{ $errors->first('lp') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <input type="text" class="form-control" placeholder="Kota" required="" name="kota" value="{{old('kota')}}">
            @if ($errors->has('kota'))
                <strong class="text-danger">{{ $errors->first('kota') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <input type="text" class="form-control" placeholder="Nomor HP" required="" name="hp_pasien" value="{{old('hp_pasien')}}">
            @if ($errors->has('hp_pasien'))
                <strong class="text-danger">{{ $errors->first('hp_pasien') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <textarea class="form-control" placeholder="Alamat" rows="3" name="alamat_pasien" required="">{{old('alamat_pasien')}}</textarea>
            @if ($errors->has('alamat_pasien'))
                <strong class="text-danger">{{ $errors->first('alamat_pasien') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <input type="text" class="form-control" placeholder="Golongan Darah" required="" name="gol_darah"value="{{old('gol_darah')}}">
            @if ($errors->has('gol_darah'))
                <strong class="text-danger">{{ $errors->first('gol_darah') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <input type="text" class="form-control" placeholder="Pekerjaan" required="" name="pekerjaan" value="{{old('pekerjaan')}}">
            @if ($errors->has('pekerjaan'))
                <strong class="text-danger">{{ $errors->first('pekerjaan') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <select name="agama" class="form-control">
              <option>Islam</option>
              <option>Kristen</option>
              <option>Katolik</option>
              <option>Hindu</option>
              <option>Budha</option>
              <option>Kong Hu Chu</option>
            </select>
            @if ($errors->has('agama'))
                <strong class="text-danger">{{ $errors->first('agama') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <input type="text" class="form-control" placeholder="Nama Wali" required="" name="nama_wali" value="{{old('nama_wali')}}">
            @if ($errors->has('nama_wali'))
                <strong class="text-danger">{{ $errors->first('nama_wali') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <input type="text" class="form-control" placeholder="Nomor HP Wali" required="" name="hp_wali" value="{{old('hp_wali')}}">
            @if ($errors->has('hp_wali'))
                <strong class="text-danger">{{ $errors->first('hp_wali') }}</strong>
            @endif
          </div>
          <div class="form-group contact-forms">
            <textarea class="form-control" placeholder="Alamat Wali" rows="3" name="alamat_wali" required="">{{old('alamat_wali')}}</textarea>
            @if ($errors->has('alamat_wali'))
                <strong class="text-danger">{{ $errors->first('alamat_wali') }}</strong>
            @endif
          </div>
          <button type="submit" class="btn sent-butnn">Daftar</button>
        </form>
      </div>
      <div class="col-md-5 contact-grided-right">
        <h5 class="top-title mb-lg-4 mb-3 text-center">Contact Us</h5>
        <h3 class="title mb-lg-5 mb-md-4 mb-sm-4 mb-3 text-center">{{$profil->nama}}</h3>
        <div class=" footer-top text-center">
          <p>
            <span>Address</span> : {{$profil->kota}}
            <br>{{$profil->alamat}}</p>
          <p class="pt-lg-3 pt-2">
            <span> Phone</span> : {{$profil->telephone}}</p>
          <p class="pt-lg-3 pt-2">
            <span>Email</span> :
            <a href="mailto:info@example.com">info@example1.com</a>
          </p>
        </div>


      </div>
    </div>
  </div>
</section>

@endsection