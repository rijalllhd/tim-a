@extends('layouts.main')

    @section('title')
        <title>Tables</title>
    @endsection

    @section('body-content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- Read -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-primary" href="{{ route('tables.create') }}">+ Tambah Data Pasien</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                        <tr>
                                            @foreach ($data as $item)
                                                <td>{{ $item->nama_pasien }}</td>
                                                <td>{{ $item->jenis_kelamin }}</td>
                                                <td>{{ $item->tempat_lahir }}</td>
                                                <td>{{ $item->date }}</td>    
                                                <td>{{ $item->alamat }}</td>
                                                <td>
                                                    <a class="btn btn-success" href="">Edit</a>
                                                    <a class="btn btn-danger" href="">Delete</a>    
                                                </td>    
                                            @endforeach
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- End Read --}}

                </div>
                <!-- /.container-fluid -->

    @endsection
