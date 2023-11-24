@extends('layouts.main')

@section('title')
    <title>Data Pengguna</title>
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

@if(session()->has('Error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Opps!',
            text: '{{ session('Error') }}',
            showConfirmButton: false,
            timer: 2500
        });
    </script>
@endif

@if(session()->has('ErrorPengguna'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Opps!',
            text: '{{ session('ErrorPengguna') }}',
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
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/pengguna/store" method="post">
            {{ csrf_field() }}
<div class="row">
    <div class="col-sm-6">
<div class="mb-3">
    <label for="pegawai" class="form-label">Nama Pegawai</label>
    <select class="form-control" name="pegawai" id="pegawai">
        <option value="">Pilih Pegawai</option>
        @foreach ($pegawaiData as $id => $nama)
            <option value="{{ $id }}">{{ $nama }}</option>
        @endforeach
    </select>
</div>


<div class="mb-3">
  <label for="username" class="form-label">Username</label>
  <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
</div>

<div class="mb-3">
 <label for="password" class="form-label">Password</label>
  <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
</div>

    </div>

<div class="col-sm-6">
    <div class="mb-3">
    <label for="level" class="form-label">Level</label>
  <select class="form-control" name="level" id="level">
        <option value="">Pilih Level</option>
            <option value="1">User</option>
            <option value="0">Admin</option>
    </select>
</div>
<div class="mb-3">
    <label for="status" class="form-label">Status</label>
  <select class="form-control" name="status" id="status">
        <option value="">Pilih Status</option>
            <option value="a">Aktif</option>
            <option value="t">Tidak Aktif</option>
    </select>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal">Understood</button>
      </div>
    </div>
  </div>
</div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
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
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Aktif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pengguna as $key => $p)
		<tr>
			<td>{{ $key + 1 }}</td>
			<td>{{ $p->nama_pegawai ?: 'Data Tidak Ada' }}</td>
			<td>{{ $p->username }}</td>
			<td>{{ $p->level == '1' ? 'User' : 'Admin' }}</td>
			<td>{{ $p->aktif == 'a' ? 'Aktif' : 'Tidak Aktif' }}</td>
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

                @foreach ($pengguna as $p)
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
         <form action="/pengguna/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" name="id" value="{{$p->id}}" id="id">
<div class="row">
    <div class="col-sm-6">
<div class="mb-3">
    <label for="pegawai" class="form-label">Nama Pegawai</label>
    <select class="form-control" name="pegawai" id="pegawai">
        <option value="">Pilih Pegawai</option>
        @foreach ($pegawaiData as $id => $nama)
            <option value="{{ $id }}" {{ $id == $p->id_user_pegawai ? 'selected' : '' }}>{{ $nama }}</option>
        @endforeach
    </select>
</div>



<div class="mb-3">
  <label for="username" class="form-label">Username</label>
  <input type="text" class="form-control" name="username" value="{{$p->username}}" id="username" placeholder="Masukkan Username">
</div>

<div class="mb-3">
 <label for="password" class="form-label">Password</label>
  <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
</div>

    </div>

<div class="col-sm-6">
    <div class="mb-3">
    <label for="level" class="form-label">Level</label>
  <select class="form-control" name="level" id="level">
        <option value="">Pilih Level</option>
            <option value="1" {{$p->level == '1' ? 'selected' : ''}}>User</option>
            <option value="0" {{$p->level == '0' ? 'selected' : ''}}>Admin</option>
    </select>
</div>
<div class="mb-3">
    <label for="status" class="form-label">Status</label>
  <select class="form-control" name="status" id="status">
        <option value="">Pilih Status</option>
            <option value="a" {{$p->aktif == 'a' ? 'selected' : ''}}>Aktif</option>
            <option value="t" {{$p->aktif == 't' ? 'selected' : ''}}>Tidak Aktif</option>
    </select>
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
        <button type="button" class="btn btn-primary" data-dismiss="modal">Understood</button>
      </div>
    </div>
  </div>
</div>
                @endforeach

                 @foreach ($pengguna as $p)
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
        <p>Nama Pegawai : <b>{{$p->username}}</b></p>
        <form action="/pengguna/hapus/{{ $p->id }}" method="get">
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
