@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Booking</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <!-- <div class="breadcrumb-title pe-3">All Team </div> -->
                    <a href="{{route('booking.report')}}" class="btn btn-outline-primary px-5 radius-30">Booking
                        Search</a>
                    <a href="{{route('booking.report')}}" class="btn btn-outline-primary px-5 radius-30">
                        <span class="badge bg-success">{{$startDate}}</span>to <span
                            class="badge bg-danger">{{$endtDate}}</span> </a>

                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Booking</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>

                        <tr>
                            <th>SI</th>
                            <th>Code</th>
                            <th>Nmae</th>
                            <th>Email</th>
                            <th>Payment Method</th>
                            <th>Total Price</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->payment_method}}</td>
                            <td>${{$item->total_price}}</td>
                            <td><a href="{{route('download.invoice',$item->id)}}"
                                    class="btn btn-warning px-3 radius-10"><i class="lni lni-download"></i>Download
                                    Invoice</a></td>








                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>


</div>
@endsection