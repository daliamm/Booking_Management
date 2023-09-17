@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"> Add Room Type </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <!-- <div class="breadcrumb-title pe-3">All Team </div> -->
                    <a href="{{route('add.room.type')}}" class="btn btn-outline-primary px-5 radius-30">Add Room
                        Type</a>

                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Room Type List</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>

                        <tr>
                            <th>SI</th>
                            <th>Image</th>
                            <th>Nmae</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $key=>$item)
                        @php
                        $rooms=App\Models\Room::where('roomtype_id',$item->id)->get();
                        @endphp
                        <tr>
                            <td>{{$key+1}}</td>
							<td><img src="{{(!empty($item->room->image)) ? url('upload/roomimg/'.$item->room->image):url('upload/no_image.jpg')}}" alt="" style="width:50px; height:30px;"></td>
                            <td>{{$item->name}}</td>

                            <td>
                             @foreach($rooms as $roo)
                                <a href="{{route('edit.room',$roo->id)}}"
                                    class="btn btn-warning px-3 radiue-30">Edit</a>
                                <a href="{{route('delete.room',$roo->id)}}" class="btn btn-danger px-3 radiue-30"
                                    id="delete">Delete</a>

                              

							@endforeach



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