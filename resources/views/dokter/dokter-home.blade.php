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
    </div>
  <div class="row">
      <div class="col-md-3 col-sm-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Gunung</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>

      <div class="col-md-3 col-sm-12">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-newspaper-o fa-3x"></i>
            <div class="info">
              <h4>Berita</h4>
              <p><b>10</b></p>
            </div>
          </div>
      </div>

      <div class="col-md-3 col-sm-12">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Gunung Private</h4>
              <p><b>10</b></p>
            </div>
          </div>
      </div>

      <div class="col-md-3 col-sm-12">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-newspaper-o fa-3x"></i>
            <div class="info">
              <h4>Berita Private</h4>
              <p><b>100</b></p>
            </div>
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
