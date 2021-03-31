@extends('frontend.layouts.main')
@section('title','Add Complaint')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Complaint</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Add Complaint</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <form action="{{route('society.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="nik" class="col-md-2 col-form-label">NIK</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="number" id="nik" name="nik" value="{{old('nik')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="username" class="col-md-2 col-form-label">Username</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" id="username" name="username" value="{{old('username')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="name" class="col-md-2 col-form-label">Name</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="phone_number" class="col-md-2 col-form-label">Phone Number</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="number" id="phone_number" name="phone_number">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="address" class="col-md-2 col-form-label">Address</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="address" id="address"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="photo" class="col-md-2 col-form-label">Photo</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="file" id="photo" name="photo">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="password" class="col-md-2 col-form-label">Password</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="password" id="password" name="password">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert-form">
                                        <img src="{{asset('assets/images/info.png')}}" class="img-info-form">
                                        Mohon lengkapi form yang sudah di sediakan untuk dapat melanjutkan proses !
                                    </div>
                                    <br>
                                    <button name="submit" type="submit" class="btn btn-primary" value="save">Save</button>
                                    <button name="submit" type="submit" class="btn btn-primary" value="more">Save & More</button>
                                    <a href="{{route('users.index')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection