@extends('layouts.main')

@section('title')
    <title>Data Pegawai</title>
@endsection

@section('body-content')
                <!-- Begin Page Content -->
                <div class="container-fluid">


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




<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/formulir/store" method="post">
            {{ csrf_field() }}
<div class="row">
    <div class="col-sm-6">
<div class="mb-3">
  <label for="pegawai" class="form-label">Nama Pegawai</label>
  <input type="text" class="form-control" name="pegawai" id="pegawai" placeholder="Masukkan Nama Pegawai">
</div>

<div class="mb-3">
  <label for="jabatan" class="form-label">Jabatan</label>
  <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan">
</div>

<div class="mb-3">
     <label for="pegawai" class="form-label">Jenis Kelamin</label>
  <div class="form-check ml-2">
  <input class="form-check-input" type="radio" name="jk" value="L"  id="laki">
  <label class="form-check-label" for="laki">
    Laki Laki
  </label>
</div>

        <div class="form-check ml-2">
  <input class="form-check-input" type="radio" name="jk" value="P"  id="perempuan">
  <label class="form-check-label" for="perempuan">
   Perempuan
  </label>
</div>
</div>

    </div>

<div class="col-sm-6">
<div class="mb-3">
  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
</div>

<div class="mb-3">
  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tempat Lahir">
</div>

<div class="mb-3">
  <label for="telepon" class="form-label">Telepon</label>
  <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Masukkan Telepon">
</div>

<div class="mb-3">
  <label for="Alamat" class="form-label">Alamat</label>
<textarea class="form-control" id="Alamat" name="alamat" rows="3"></textarea>
</div>

@php
   date_default_timezone_set('Asia/Jakarta'); // Set zona waktu ke Indonesia

$currentDateTime = date('Y-m-d H:i:s');
@endphp
  <input type="hidden" class="form-control" name="created_at" id="created_at" value="{{$currentDateTime}}">

<button type="submit" class="btn btn-primary">Simpan</button>

</div>

</div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h2 class="m-0 font-weight-bold text-success">Data Pegawai</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
        + Tambah Pegawai
    </button>
</div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pegawai as $key => $p)
		<tr>
			<td>{{ $key + 1 }}</td>
			<td>{{ $p->nama_pegawai }}</td>
			<td>{{ $p->jabatan }}</td>
            <td>{{ $p->jenis_kelamin == 'l' ? 'Laki - Laki' : 'Perempuan'}}</td>
			<td>{{ $p->tempat_lahir }}</td>
			<td>
				<a href="#" data-toggle="modal" data-target="#EditModal{{$p->id}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
				|
				<a href="#" data-toggle="modal" data-target="#HapusModal{{$p->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
			</td>
		</tr>
		@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                @foreach ($pegawai as $p)
                 <!-- Edit Modal-->
  <div class="modal fade" id="EditModal{{$p->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/formulir/update" method="post">
                                    {{ csrf_field() }}
  <input type="hidden" class="form-control" name="id" value="{{$p->id}}" id="id">

<div class="row">
    <div class="col-sm-6">
<div class="mb-3">
  <label for="pegawai" class="form-label">Nama Pegawai</label>
  <input type="text" class="form-control" name="pegawai" value="{{$p->nama_pegawai}}" id="pegawai" placeholder="Masukkan Nama Pegawai">
</div>

<div class="mb-3">
  <label for="jabatan" class="form-label">Jabatan</label>
  <input type="text" class="form-control" name="jabatan" value="{{$p->jabatan}}" id="jabatan" placeholder="Masukkan Jabatan">
</div>

<div class="mb-3">
    <label for="pegawai" class="form-label">Jenis Kelamin</label>

    <div class="form-check ml-2">
        <input class="form-check-input" type="radio" name="jk" value="L" id="laki" {{ $p->jenis_kelamin == 'l' ? 'checked' : '' }}>
        <label class="form-check-label" for="laki">Laki Laki</label>
    </div>

    <div class="form-check ml-2">
        <input class="form-check-input" type="radio" name="jk" value="P" id="perempuan" {{ $p->jenis_kelamin == 'p' ? 'checked' : '' }}>
        <label class="form-check-label" for="perempuan">Perempuan</label>
    </div>
</div>


    </div>

<div class="col-sm-6">
<div class="mb-3">
  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
  <input type="text" class="form-control" name="tempat_lahir" value="{{$p->tempat_lahir}}" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
</div>

<div class="mb-3">
  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{$p->tanggal_lahir}}" placeholder="Masukkan Tempat Lahir">
</div>

<div class="mb-3">
  <label for="telepon" class="form-label">Telepon</label>
  <input type="number" class="form-control" name="telepon" value="{{$p->telepon}}" id="telepon" placeholder="Masukkan Telepon">
</div>

<div class="mb-3">
  <label for="Alamat" class="form-label">Alamat</label>
<textarea class="form-control" id="Alamat" name="alamat" rows="3">{{$p->alamat}}</textarea>
</div>

@php
   date_default_timezone_set('Asia/Jakarta'); // Set zona waktu ke Indonesia

$currentDateTime = date('Y-m-d H:i:s');
@endphp
  <input type="hidden" class="form-control" name="updated_at" id="updated_at" value="{{$currentDateTime}}">

<button type="submit" class="btn btn-primary">Simpan</button>

</div>

</div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                @endforeach

                 @foreach ($pegawai as $p)
                 <!-- Edit Modal-->
  <div class="modal fade" id="HapusModal{{$p->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        <p>Nama Pegawai : <b>{{$p->nama_pegawai}}</b></p>
        <form action="/formulir/hapus/{{ $p->id }}" method="get">
                                    {{ csrf_field() }}
  <input type="hidden" class="form-control" name="id" value="{{$p->id}}" id="id">

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


@endsection
