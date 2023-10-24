@extends('layouts.master')
@section('tittle','Data User')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User</h1>
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
          <h3 class="card-title">Tabel Users</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Nomor HP</th>
              <th>Alamat</th>
              <th>Tanggal Lahir</th>
              <th>KTP</th>
              <th>Jenis Kelamin</th>                               
              <th>Email</th>                               
              <th>Opsi</th>                               
              </tr>
            </thead>
            <tbody>
            @foreach($user as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->userdetails->first_name ?? 'Not Found' }} {{ $item->userdetails->last_name ?? 'Not Found' }}</td> 
                <td>{{ $item->phone_number }}</td> 
                <td>{{ $item->userdetails->address ?? 'Not Found' }}</td> 
                <td>{{ $item->userdetails->date_of_birth ?? 'Not Found' }}</td> 
                @if ($item->userdetails)
                <td><img src="{{ asset('image/' . $item->userdetails->img_ktp) }}" alt="KTP Image" style="height:100px;width:200px;"></td>
                @else
                <td>Not Found</td>
                @endif
                @if ($item->userdetails)
                    <td>{{ $item->userdetails->gender === 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                @else
                    <td>Not Found</td>
                @endif
                <td>{{ $item->email }}</td>
                <td>
                  <a href="user/edit/{{$item->id}}" method="get">
                    <i class="nav-icon fas fa-edit"></i>
                  </a>
                  <a href="user/delete/{{$item->id}}" method="post" onclick="return confirm('Yakin ingin menghapus data?')">
                    <i class="nav-icon fas fa-trash"></i>
                  </a>
                </td> 
              </tr>     
            @endforeach             
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection

