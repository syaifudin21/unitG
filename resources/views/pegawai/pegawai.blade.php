@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Pegawai yang terdaftar</h1>
            <p>Informasi pegawai</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('pegawai.pegawai.create')}}">
                <i class="fa fa-plus"></i>Tambah pegawai</a> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Daftar pegawai</h3>
                <div class="bs-component">
                    <table id="sampleTable" class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Username</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawais as $pegawai)
                            <tr>
                                <td><b>{{$pegawai->nama}}</b></td>
                                <td>{{$pegawai->username}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('pegawai.pegawai.show', ['id'=> $pegawai->id])}}">Detail</a>
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('pegawai.pegawai.edit', ['id'=>$pegawai->id])}}">Edit</a>
                                    <button onClick="hapus('{{route('pegawai.pegawai.delete', ['id'=> $pegawai->id])}}', 'Berita yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

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
