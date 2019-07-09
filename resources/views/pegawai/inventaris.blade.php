@extends('pegawai.pegawai-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Inventaris yang terdaftar</h1>
            <p>Informasi deskripsi inventaris</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('pegawai.inventaris.create')}}">
                <i class="fa fa-plus"></i>Tambah Inventaris</a> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Daftar inventaris</h3>
                <div class="bs-component">
                    <table id="sampleTable" class="table table-sm">
                        <thead>
                            <tr>
                                <th>Jenis / Inventaris</th>
                                <th>Total Stok</th>
                                <th>Stok Tersisa</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventariss as $inventaris)
                            <tr>
                                <td><b>{{$inventaris->jenis}}</b></td>
                                <td>{{$inventaris->stok}}</td>
                                <td>{{$inventaris->stok - app('App\Models\Inventaris')->terpasang($inventaris->id)}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('pegawai.inventaris.show', ['id'=> $inventaris->id])}}">Detail</a>
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('pegawai.inventaris.edit', ['id'=>$inventaris->id])}}">Edit</a>
                                    <button onClick="hapus('{{route('pegawai.inventaris.delete', ['id'=> $inventaris->id])}}', 'Berita yakin ingin dihapus')" class="btn btn-danger btn-sm">Hapus</button>
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
