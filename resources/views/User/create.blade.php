@extends('layouts.master')
@section('tittle','Create Data User')
@section('content')
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

              <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Silahkan input data</h3>
              </div>
                <!-- form start -->
                    <form action="{{route('user.createuser')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">Nama Depan</label>
                                <input type="text" class="form-control" id="first_name" placeholder="Input Nama Depan" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Nama Belakang</label>
                                <input type="text" class="form-control" id="last_name" placeholder="Input Nama Belakang" name="last_name">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">No HP</label>
                                <input type="text" class="form-control" id="phone_number" placeholder="Input No HP" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control" id="address" placeholder="Input Alamat" name="address">
                            </div>
                            <div class="form-group">
                              <label>Tanggal Lahir</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="date_of_birth" data-target="#reservationdatetime"/>
                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="img_ktp">Foto KTP</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="img_ktp" name="img_ktp">
                                  <label class="custom-file-label" for="img_ktp">Choose file</label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="custom-select" name="gender" id="gender">
                                    <option value="1"> Laki-laki</option>
                                    <option value="2"> Perempuan</option>                      
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Input Email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Input Password" name="password">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <!-- /.card -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection

