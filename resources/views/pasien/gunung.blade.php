@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Informasi deskripsi gunung yang ada di Indonesia</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('admin.gunung.create')}}">
                <i class="fa fa-plus"></i>Tambah Gunung</a> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Daftar Gunung</h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama Gunung</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Publish</th>
                                <th class="text-center">Berita</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gunungs as $gunung)
                            <tr>
                                <td><b>{{$gunung->nama}}</b></td>
                                <td class="text-center">{{$gunung->status}}</td>
                                <td class="text-center">{{$gunung->publish}}</td>
                                <td class="text-center">{{$gunung->berita()->count()}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('admin.gunung.show', ['id'=> $gunung->id])}}">Detail</a>
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('admin.gunung.edit', ['id'=>$gunung->id])}}">Edit</a>
                                    <button onClick="hapus('{{route('admin.gunung.delete', ['id'=> $gunung->id])}}', 'Berita yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
                             
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$gunungs->links()}}

                </div>

            </div>

        </div>

        <div class="col-md-4">
            <div class="tile">
                <h3 class="tile-title">Status Gunung</h3>
                <hr>
                <div class="bs-component">
                    <b>1. Aktif Normal</b><br>
                    Status aktif normal artinya pada gunung api yang diamati tidak ada perubahan aktivitas secara visual, seismik, dan kejadian vulkanik. Ini menunjukan tidak ada letusan hingga kurun waktu tertentu.
                    <hr>

                    <b>2. Waspada</b><br>
                    Status Waspada menunjukkan mulai meningkatnya aktivitas seismik dan mulai muncul kejadian vulkanik. Pada status ini juga mulai terlihat perubahan visual di sekitar kawah. Mulai terjadi gangguan magmatik, tektonik, atau hidrotermal, namun diperkirakan tak terjadi erupsi dalam jangka waktu tertentu.
                    <hr>

                    <b>3. Siaga</b><br>
                    Pada status Siaga ada peningkatan seismik yang didukung dengan pemantauan vulkanik lainnya, serta terlihat jelas perubahan baik secara visual maupun perubahan aktivitas kawah. Berdasarkan analisis data observasi, kondisi itu akan diikuti dengan letusan utama. Artinya, jika peningkatan kegiatan gunung api terus berlanjut, kemungkinan erupsi besar mungkin terjadi dalam kurun dua pekan.
                    <hr>

                    <b>4. Awas</b><br>
                    Status Awas adalah kondisi paling memungkinkan terjadinya erupsi. Status Awas merujuk letusan utama yang dilanjutkan dengan letusan awal, diikuti semburan abu dan uap. Setelah itu akan diikuti dengan erupsi besar. Dalam kondisi ini, kemungkinan erupsi besar akan berlangsung dalam kurun 24 jam.
                    <hr>

                    <b>5. Gunung Mati / Non Aktif</b><br>
                    gunung yg sudah tidak mengeluarkan lava (asap) lagi

                </div>
            </div>


        </div>
    </div>
</main>


@endsection

@section('script')
<script src="{{asset('js/hapus.js')}}"></script>
<script src="{{asset('js/hapusfunc.js')}}"></script>
@endsection
