@extends('layouts.main')

@section('title')
    <h1>Pasiens Table</h1>
@endsection

@section('body-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the 
            <a target="_blank" href="https://datatables.net">official DataTables documentation</a>
        </p>

        @if(session()->has('Tambah'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('Tambah') }}',
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endif

        @if(session()->has('Hapus'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('Hapus') }}',
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endif

        @if(session()->has('Ubah'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('Ubah') }}',
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endif

        <!-- Create Data Pasiens -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pasienstable.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="pasien" class="form-label">Nama pasien</label>
                                    <input type="text" class="form-control" id="pasien" name="pasien" placeholder="Masukkan Nama Pasien">
                                </div>

                                <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jk" id="jk">
                                    <option value="">Jenis Kelamin</option>
                                        <option value="l">Pria</option>
                                        <option value="p">Wanita</option>
                                </select>
                                </div>

                                <div class="mb-3">
                                <label for="tl" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tl" id="tl" placeholder="Masukkan Tempat Lahir">
                                </div>
                    </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                    <label for="date" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="date" id="date">
                                </div>
                                <div class="mb-3">
                                    <label for="tlp" class="form-label">Telephone</label>
                                    <input type="number" class="form-control" name="tlp" id="tlp">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat">
                                </div>

                                @php
                                date_default_timezone_set('Asia/Jakarta'); // Set zona waktu ke Indonesia

                                $currentDateTime = date('Y-m-d H:i:s');
                                @endphp
                                <input type="hidden" class="form-control" name="created_at" id="created_at" value="{{$currentDateTime}}">
                            </div>

                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop"> 
                    + Tambah Pegawai
                </button>
        </div>
        
        {{-- Read Data Pasien --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Nomor Telephone</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id_pasien }}</td>
                        <td>{{ $item->nama_pasien }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->tempat_lahir }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#EditModal{{$item->id_pasien}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    |       <a href="#" data-toggle="modal" data-target="#HapusModal{{$item->id_pasien}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        {{-- Delete Data Pasien --}}
        @foreach ($data as $item)
        <div class="modal fade" id="HapusModal{{$item->id_pasien}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">Apakah Anda ingin menghapus data ini?</p>
                        <p>Keterangan</p>
                        <p>Nama Pegawai : <b>{{$item->nama_pasien}}</b></p>
                        <form action="{{ route('pasienstable.destroy', ['pasienstable' => $item->id_pasien]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" class="form-control" name="id_pasien" value="{{$item->id_pasien}}" id="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                        </form>
                 </div>
            </div>
        </div>
        @endforeach

        r<!-- Edit Data Pasien -->
        @foreach ($data as $item)
        <div class="modal fade" id="EditModal{{$item->id_pasien}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                <form action="{{ route('pasienstable.update', ['pasienstable' => $item->id_pasien]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <input type="hidden" class="form-control" name="id_pasien" value="{{$item->id_pasien}}" id="id">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="pasien" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" name="pasien" value="{{ $item->nama_pasien }}" id="pasien" placeholder="Nama Pasien">
                        </div>

                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jk" value="{{$item->jenis_kelamin}}" id="jk" placeholder="Masukkan Jenis Kelamin">
                        </div>

                        <div class="mb-3">
                            <label for="tl" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tl" value="{{$item->tempat_lahir}}" id="tl" placeholde="Masukkan tl">
                        </div>
                    </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                            <label for="date" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="date" value="{{$item->date}}" id="date" placeholder="Masukkan Tanggal">
                        </div>

                        <div class="mb-3">
                            <label for="tlp" class="form-label">Nomor Telephone</label>
                            <input type="integer" class="form-control" name="tlp" value="{{$item->telepon}}" id="tlp" placeholder="Masukkan No Telephone">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{$item->alamat}}" id="alamat" placeholder="Masukkan Alamat">
                        </div>

                    @php
                    date_default_timezone_set('Asia/Jakarta'); // Set zona waktu ke Indonesia

                    $currentDateTime = date('Y-m-d H:i:s');
                    @endphp
                    <input type="hidden" class="form-control" name="created_at" id="created_at" value="{{$currentDateTime}}">
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
                </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection