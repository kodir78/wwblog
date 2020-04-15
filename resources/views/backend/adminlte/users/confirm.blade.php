@extends('backend.adminlte.layouts.main')
@section("title") Confirm Delete @endsection
@section('styles')
<!-- Start styles Libraies -->
<!-- Jasny Bootstrap 4 -->
<link rel="stylesheet" href="/assets/backend/adminlte/plugins/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
<!-- End styles Libraies -->
@endsection
<!-- Start Content -->
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Confirm Delete</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Delete Confirmation</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
        .<div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class=" card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Confirmation
                            </h3>
                        </div>
                        {!! Form::model($user, [
                            'method' => 'DELETE',
                            'route'  => ['users.destroy', $user->id],
                            ]) !!}
                            <div class="card-body">
                                <p>
                                    You have specified this user for deletion:
                                </p>
                                <p>
                                    ID #{{ $user->id }} : {{ $user->name }}
                                </p>
                                <p>
                                    What should be done with content own by this user?
                                </p>
                                <p>
                                    <input type="radio" name="delete_option" value="delete" checked> Delete All Content
                                </p>
                                
                                <p>
                                    <input type="radio" name="delete_option" value="attribute"> Attribute content to:
                                    {!! Form::select('selected_user', $users, null) !!}
                                </p>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger">Confirm Deletion</button>
                                <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                            {!! Form::close() !!}
                            <!-- /.card-footer-->
                        </div>
                        {{-- card --}}
                    </div>
                    {{-- col-left --}}
                    <div class="col-md-4">
                        <div class=" card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Image
                                </h3>
                            </div>
                            <div class="card-body">
                                .<div class="form-group text-center">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">
                                            <img src="/assets/backend/adminlte/dist/img/no_image.png"  alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                                            <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                Footer
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        {{-- card --}}
                    </div>
                    {{-- col-right --}}
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- End Content -->
    @section('footer-scripts')
    <!-- Library Specific JS File -->
    <!-- Jasny Bootstrap 4 -->
    <script src="/assets/backend/adminlte/plugins/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
    <!-- Page Specific JS File -->
    
    @endsection
    @endsection
    
    