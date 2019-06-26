@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>pasien yang terdaftar</h1>
            <p>Informasi deskripsi pasien</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('pegawai.pasien.create')}}">
                <i class="fa fa-plus"></i>Tambah pasien</a> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Daftar pasien</h3>
                <div class="bs-component">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama pasien</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasiens as $pasien)
                            <tr>
                                <td><b>{{$pasien->nama}}</b></td>
                                <td>{{$pasien->alamat}}</td>
                                <td>{{$pasien->username}}</td>
                                <td class="text-center">{{$pasien->status_on}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('pegawai.pasien.show', ['id'=> $pasien->id])}}">Detail</a>
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('pegawai.pasien.edit', ['id'=>$pasien->id])}}">Edit</a>
                                    <button onClick="hapus('{{route('pegawai.pasien.delete', ['id'=> $pasien->id])}}', 'Berita yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
                             
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$pasiens->links()}}

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
