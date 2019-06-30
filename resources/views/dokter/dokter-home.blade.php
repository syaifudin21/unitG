@extends('dokter.dokter-template')
@section('css')

@endsection
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Selamat datang di dashboard Dokter</p>
        </div>

        <div class="toggle-flip">
        <label>
            <input type="checkbox"  onchange="status('{{Auth::user()->id}}')" {{(Auth::user()->status_on == 'ON')? 'checked' : '' }}  ><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
        </label>
        </div>
    </div>
  <div class="row">
      <div class="col-md-4 col-sm-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Pasien dalam Perawatan</h4>
              <p><b>{{$dokter->daftarperiksa()->whereNull('tanggal_keluar')->count()}}</b></p>
            </div>
          </div>
          <ul class="list-group">
              @foreach ($dokter->daftarperiksa()->whereNull('tanggal_keluar')->get() as $periksa)
              <li class="list-group-item">{!!$periksa->pasien->nomor.' - <b>'.$periksa->pasien->nama.'</b> - '.$periksa->jenis_kasus!!}</li>
              @endforeach
          </ul>
        </div>

      <div class="col-md-4 col-sm-12">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-newspaper-o fa-3x"></i>
            <div class="info">
              <h4>Diagnosa Dokter</h4>
              <p><b>{{$jml_diagnosa}}</b></p>
            </div>
          </div>
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-newspaper-o fa-3x"></i>
            <div class="info">
              <h4>Tugas Terlesaikan</h4>
              <p><b>{{$dokter->daftarperiksa()->whereNotNull('tanggal_keluar')->count()}}</b></p>
            </div>
          </div>
          <ul class="list-group">
              @foreach ($dokter->daftarperiksa()->whereNotNull('tanggal_keluar')->get() as $periksa)
              <li class="list-group-item">{!!$periksa->pasien->nomor.' - <b>'.$periksa->pasien->nama.'</b> - '.$periksa->jenis_kasus!!}</li>
              @endforeach
          </ul>
      </div>

      <div class="col-md-4">
        <div class="tile">
            <table class="table table-sm table-borderless">
                <tr><td>Nama</td> <th id="dokterNama">{{$dokter->nama}}</th></tr>
                <tr><td>Username</td> <th id="dokterUsername">{{$dokter->username}}</th></tr>
                <tr><td>Jenis Kelamin</td> <th id="dokterLp">{{$dokter->lp}}</th></tr>
                <tr><td>Alamat</td> <th id="dokterAlamat">{{$dokter->alamat}}</th></tr>
                <tr><td>HP</td> <th id="dokterHp">{{$dokter->hp}}</th></tr>
                <tr><td>Pendidikan</td> <th id="dokterPekerjaan">{{$dokter->pendidikan}}</th></tr>
                <tr><td>Spesialis</td> <th id="dokterAgama">{{$dokter->spesialis}}</th></tr>
                <tr><td>Agama</td> <th id="dokterAgama">{{$dokter->agama}}</th></tr>
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
<script>
  function status(no) {
        $.get('{{ route('dokter.dokter.status')}}?id='+no, function(response){
            $('#status_on_template').text('Dokter - '+response.status); 
        });
  }
</script>
@endsection
