@extends('pasien.pasien-template')
@section('css')

@endsection
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Selamat datang di dashboard Pasien</p>
        </div>
    </div>
  <div class="row">
      <div class="col-md-4 col-sm-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Perawatan ke UGD</h4>
              <p><b>{{$jml_ugd}}</b></p>
            </div>
          </div>

            <ul class="list-group">
              @foreach ($pasien->daftarperiksa()->get() as $periksa)
              <li class="list-group-item">{{hari_tanggal_waktu($periksa->tanggal_masuk,false). ' - '.$periksa->jenis_kasus}}</li>
              @endforeach
            </ul>
        </div>

      <div class="col-md-4 col-sm-12">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-newspaper-o fa-3x"></i>
            <div class="info">
              <h4>Keluhan</h4>
              <p><b>{{$jml_keluhan}}</b></p>
            </div>
          </div>

          <ul class="list-group">
              @foreach ($pasien->observasilanjutan()->get() as $observasi)
              <li class="list-group-item">{{$observasi->keluhan}}</li>
              @endforeach
          </ul>
      </div>

      <div class="col-md-4 col-sm-12">
        <div class="tile">
          <table class="table table-sm table-borderless">
              <tr><td>Nomor Pasien</td> <th id="pasienNama">{{$pasien->nomor}}</th></tr>
              <tr><td>Nama</td> <th id="pasienNama">{{$pasien->nama}}</th></tr>
              <tr><td>Username</td> <th id="pasienUsername">{{$pasien->username}}</th></tr>
              <tr><td>Jenis Kelamin</td> <th id="pasienLp">{{$pasien->lp}}</th></tr>
              <tr><td>Kota</td> <th id="pasienKota">{{$pasien->kota}}</th></tr>
              <tr><td>Alamat</td> <th id="pasienAlamat">{{$pasien->alamat_pasien}}</th></tr>
              <tr><td>Golongan Darah</td> <th id="pasienGolDarah">{{$pasien->gol_darah}}</th></tr>
              <tr><td>HP</td> <th id="pasienHp">{{$pasien->hp_pasien}}</th></tr>
              <tr><td>Pekerjaan</td> <th id="pasienPekerjaan">{{$pasien->pekerjaan}}</th></tr>
              <tr><td>Agama</td> <th id="pasienAgama">{{$pasien->agama}}</th></tr>
              <tr><td>Nama Wali</td> <th id="pasienNamaWali">{{$pasien->nama_wali}}</th></tr>
              <tr><td>HP Wali</td> <th id="pasienHpWali">{{$pasien->hp_wali}}</th></tr>
              <tr><td>Alamat Wali</td> <th id="pasienAlamatWali">{{$pasien->alamat_wali}}</th></tr>
          </table>
        </div>
      </div>

  </div>


    {{-- <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="tile mb-1">
            <div class="page-header">
              <h6 class="mb-3 line-head" id="containers">Gunung Terkhir diupdate</h6>
            </div>
            <div class="bs-component">
                @foreach (App\Models\Gunung::limit(5)->orderBy('updated_at','desc')->get() as $gunung)
                  
                <div class="media">
                  <div class="media-body">
                    <a href="{{route('admin.gunung.show', ['id'=>$gunung->id])}}"><h5 class="mt-0">{{$gunung->nama}}</h5></a>
                    {{$gunung->alamat}}
                  </div>
                </div><br>
              @endforeach
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="tile mb-1">
          <div class="page-header">
              <h6 class="mb-3 line-head" id="containers">Berita Terkhir diupdate</h6>
            </div>
            <div class="bs-component">
              @foreach (App\Models\Berita::limit(5)->orderBy('updated_at','desc')->get() as $berita)
                  
                <div class="media">
                  <div class="media-body">
                    <a href="{{route('admin.gunung.show', ['id'=>$berita->id])}}"><h5 class="mt-0">{{$berita->judul}}</h5></a>
                    {{$berita->text_pembuka}}
                  </div>
                </div><br>
              @endforeach
            </div>
          </div>
      </div>
    </div> --}}
           
    
</main>

@endsection

@section('script')

@endsection
