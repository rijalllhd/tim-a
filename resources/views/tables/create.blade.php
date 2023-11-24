@extends('layouts.main')

@section('title')
    <title>Create Table Pasien</title>
@endsection

@section('body-content')

    <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer py-3">
                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                        </div>  
                    </div>
                    {{-- End Read --}}

                </div>
@endsection
