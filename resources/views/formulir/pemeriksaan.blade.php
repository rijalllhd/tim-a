@extends('layouts.main')

@section('title')
    <title>SB Admin 2 - Tables</title>
@endsection

@section('body-content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
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
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="/pemeriksaan/store" method="post">
            {{ csrf_field() }}
<div class="row">
    <div class="col-sm-6">
{{-- <div class="mb-3">
   <label for="pasien" class="form-label">Nama Pasien</label>
    <select class="form-control" name="pasien" id="pasien">
        <option value="">Pilih Pasien</option>
        @foreach ($tabel_dokter as $id => $nama)
            <option value="{{ $id }}">{{ $nama }}</option>
        @endforeach
    </select>
</div> --}}


<div class="mb-3">
     <label for="dokter" class="form-label">Nama Dokter</label>
    <select class="form-control" name="dokter" id="dokter">
        <option value="">Pilih Dokter</option>
        @foreach ($tabel_dokter as $id => $nama)
            <option value="{{ $id }}">{{ $nama }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
  <label for="gejala" class="form-label">Gejala</label>
  <input type="text" class="form-control" name="gejala" id="gejala" placeholder="Masukkan Gejala">
</div>

<div class="mb-3">
  <label for="diagnosis" class="form-label">Diagnosis</label>
  <input type="text" class="form-control" name="diagnosis" id="diagnosis" placeholder="Masukkan Diagnosis">
</div>

    </div>

<div class="col-sm-6">
<div class="mb-3">
  <label for="obat" class="form-label">Obat</label>
  <input type="number" class="form-control" name="obat" id="obat" placeholder="Masukkan Obat">
</div>

<div class="mb-3">
  <label for="keterangan" class="form-label">Keterangan</label>
  <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" rows="3"></textarea>

</div>

@php
   date_default_timezone_set('Asia/Jakarta'); // Set zona waktu ke Indonesia

$currentDateTime = date('Y-m-d H:i:s');
@endphp
  <input type="hidden" class="form-control" name="created_at" id="created_at" value="{{$currentDateTime}}">


</div>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
        + Tambah Dokter
    </button>
</div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                            <th>Nama Dokter</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemeriksaan as $key => $p)
		<tr>
			<td>{{ $key + 1 }}</td>
			<td>{{ $p->gejala }}</td>
			<td>{{ $p->gejala }}</td>
			<td>{{ $p->gejala }}</td>
			<td>{{ $p->gejala }}</td>
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

                @foreach ($pemeriksaan as $p)
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
        <form action="/dokter/update" method="post">
            {{ csrf_field() }}
               <input type="hidden" class="form-control" name="id" value="{{$p->id}}" id="id">
<div class="row">
    <div class="col-sm-6">
<div class="mb-3">
  <label for="dokter" class="form-label">Nama Dokter</label>
  <input type="text" class="form-control" name="nama_dokter" value="{{$p->gejala}}" id="nama_dokter" placeholder="Masukkan Nama Dokter">
</div>


<div class="mb-3">
     <label class="form-label">Jenis Kelamin</label>
  <div class="form-check ml-2">
  <input class="form-check-input" type="radio" name="jenis_kelamin" {{$p->gejala == 'L' ? 'checked' : '' }} value="L" id="laki">
  <label class="form-check-label" for="laki">
    Laki Laki
  </label>
</div>

        <div class="form-check ml-2">
  <input class="form-check-input" type="radio" name="jenis_kelamin" {{$p->gejala == 'P' ? 'checked' : '' }} value="P" id="perempuan">
  <label class="form-check-label" for="perempuan">
   Perempuan
  </label>
</div>
</div>

    </div>

<div class="col-sm-6">
<div class="mb-3">
  <label for="nohp" class="form-label">Telepon</label>
  <input type="number" class="form-control" name="nohp" value="{{$p->gejala}}" id="nohp" placeholder="Masukkan Telepon">
</div>

<div class="mb-3">
  <label for="alamat" class="form-label">Alamat</label>
  <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamar Dokter" rows="3">{{$p->gejala}}</textarea>

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
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
                @endforeach

                 @foreach ($pemeriksaan as $p)
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
        <p>Nama dokter : <b>{{$p->gejala}}</b></p>
        <form action="/dokter/hapus/{{ $p->id }}" method="get">
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
