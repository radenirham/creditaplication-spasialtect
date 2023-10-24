@extends('layouts.master')
@section('tittle','Data Payment')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Payment</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Payment</li>
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
          <h3 class="card-title">Tabel Payment</h3>

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
              <th>Credit</th>
              <th>Tipe Credit</th>
              <th>Total Credit</th>
              <th>Amount</th> 
              <th>Status</th>   
              <th>Tanggal Dibuat</th>                                     
              <th>Update</th>                                     
              </tr>
            </thead>
            <tbody>
            @foreach($payment as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->credit->name ?? 'Not Found' }}</td> 
                <td>{{ $item->credit->credit_type ?? 'Not Found'}}</td> 
                <td>{{ $item->credit->total_credit ?? 'Not Found'}}</td> 
                <td>{{ $item->amount ?? 'Not Found'}}</td> 
                <td>{{ $item->status ?? 'Not Found'}}</td> 
                <td>{{ $item->created_at ?? 'Not Found'}}</td> 
                <td>
                  <a href="payment/edit/{{$item->id}}" method="get">
                    <i class="nav-icon fas fa-edit"></i>
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

