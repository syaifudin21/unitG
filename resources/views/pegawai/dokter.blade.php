@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Dokter yang terdaftar</h1>
            <p>Informasi deskripsi dokter</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('pegawai.dokter.create')}}">
                <i class="fa fa-plus"></i>Tambah dokter</a> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Daftar dokter</h3>
                <div class="bs-component">
                    <table id="sampleTable" class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama Dokter</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokters as $dokter)
                            <tr>
                                <td><b>{{$dokter->nama}}</b></td>
                                <td>{{$dokter->alamat}}</td>
                                <td>{{$dokter->username}}</td>
                                <td class="text-center">{{$dokter->status_on}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('pegawai.dokter.show', ['id'=> $dokter->id])}}">Detail</a>
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('pegawai.dokter.edit', ['id'=>$dokter->id])}}">Edit</a>
                                    <button onClick="hapus('{{route('pegawai.dokter.delete', ['id'=> $dokter->id])}}', 'Berita yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
                             
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

        <div class="col-md-4">
            <div class="tile">
                <h3 class="tile-title">Status Dokter</h3>
                <hr>
                <div class="bs-component">
                    <b> ON</b><br>
                    Status dokter masih bekerja
                    <hr>

                    <b> OFF</b><br>
                    Dokter tidak bisa diganggu
                   
                </div>
            </div>


        </div>
    </div>
</main>


@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

<script src="{{asset('js/hapus.js')}}"></script>
<script src="{{asset('js/hapusfunc.js')}}"></script>
@endsection
