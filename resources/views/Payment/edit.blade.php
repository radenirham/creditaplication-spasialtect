@extends('layouts.master')
@section('tittle','Update Payment Status')
@section('content')
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Credit Payment</h1>
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
                <!-- form start -->
                      <form method="POST" action='{{ url('payment/editpayment/'. $payment->id) }}' enctype="multipart/form-data">                    
                        @csrf
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Update Payment Status</h3>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-3">
                                <label for="barang">Credit</label>
                                <select class="custom-select" name="credit_id" id="credit_id">
                                    <option value="{{$payment->credit_id}}" readonly>{{$payment->credit->name ?? 'Not Found'}}</option>   
                                </select>
                              </div>
                              <div class="col-4">
                                <label for="nama">Amount</label>
                                <input type="text" class="form-control" value="{{$payment->amount}}" name="amount" id="amount" readonly>
                              </div>
                              <div class="col-5">
                                <label>Status</label>
                                <select class="custom-select" name="status" id="status">
                                  <option value="WAITING">WAITING</option>
                                  <option value="PROCESSED">PROCESSED</option>
                                  <option value="ONGOING">ONGOING</option>
                                  <option value="DONE">DONE</option>                  
                                </select>
                              </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <!-- /.card -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
@endsection

