@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Room List </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <!-- <div class="breadcrumb-title pe-3">All Team </div> -->
                    <a href="{{route('add.team')}}" class="btn btn-outline-primary px-5 radius-30">Add Booking</a>

                </ol>
            </nav>
        </div>

    


    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{route('add.room.list')}}"
             class="btn btn-outline-primary px-5 radius-30">Add Booking</a>
        </div>

    </div>


</div>

    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">All Room List</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>

                        <tr>
                            <th>SI</th>
                            <th>Room Type</th>
                            <th>Room Number</th>
                            <th>Booking Status</th>
                            <th>In/Out Date</th>
                            <th>Booking Number</th>
                            <th>Customer</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($room_number_list as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->room_no}}</td>

                            <td>
                                @if($item->booking_id !='')
                                @if($item->booking_status ==1)
                                <span class="badge bg-danger">Booked</span>
                                @else
                                <span class="badge bg-danger">Pending</span>
                                @endif

                                @else
                                <span class="badge bg-success">Available</span>
                                @endif
                            </td>

                            <td>
                                @if($item->booking_id !='')
                                <span class="badge rounded-pill bg-secondary">
                                    {{date('d-m-Y',strtotime($item->check_in))}}
                                </span>
                                to
                                <span class="badge rounded-pill bg-info text-dark">
                                    {{date('d-m-Y',strtotime($item->check_out))}}
                                </span>

                                @endif
                            </td>
                            <td>
                                @if($item->booking_id != '')
                                {{$item->booking_no}}
                                @endif
                            </td>
                            <td>
                                @if($item->booking_id != '')
                                {{$item->customer_name}}
                                @endif
                            </td>

                            <td>
                                @if($item->status =='Active')
                                <span class="badge bg-success">Published</span>
                                @else
                                <span class="badge bg-danger">InActive</span>

                                @endif


                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <h6 class="mb-0 text-uppercase">DataTable Import</h6>
    <hr />

</div>
@endsection