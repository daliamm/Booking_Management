@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">

        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Booking Number</p>
                            <h5 class="my-1 text-info">{{$editData->code}}</h5>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                class='bx bxs-cart'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Booking Date:</p>
                            <h5 class="my-1 text-danger">
                                {{\Carbon\Carbon::parse($editData->created_at) ->format('d/m/Y')}}</h5>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i
                                class='bx bxs-wallet'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Payment Method</p>
                            <h4 class="my-1 text-success">{{$editData->payment_method}}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                class='bx bxs-bar-chart-alt-2'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Payment Status</p>
                            <h4 class="my-1 text-warning">@if($editData->payment_status =='1')
                                <span class="text-success">Complete</span>
                                @else
                                <span class="text-success">Pending</span>
                                @endif
                            </h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                class='bx bxs-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Booking Status</p>
                            <h4 class="my-1 text-warning">@if($editData->status =='1')
                                <span class="text-success">Complete</span>
                                @else
                                <span class="text-success">Pending</span>
                                @endif
                            </h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                class='bx bxs-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end row-->

    <div class="row">
        <div class="col-12 col-lg-8 d-flex">
            <div class="card radius-10 w-100">

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table align-middle md-0">
                            <thead>
                                <tr>
                                    <th>Room Type</th>
                                    <th>Total Room </th>
                                    <th>Price</th>
                                    <th>Check In/Out Date</th>
                                    <th>Total Days</th>
                                    <th>Total </th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$editData->room->type->name}}</td>
                                    <td>{{$editData->number_of_rooms}}</td>
                                    <td>{{$editData->actual_price}}</td>
                                    <td><span class="badge bg-primary">{{$item->check_in}}</span> / <br><span
                                            class="badge bg-waring text-dark">{{$item->check_out}}</span></td>
                                    <td>{{$editData->days}}</td>
                                    <td>{{$editData->actual_price * $editData->number_of_rooms}}</td>

                                </tr>
                            </tbody>

                        </table>
                        <div class="col-md-6" style="float:right">
                            <style>
                            .test_table td {
                                text-align: right;
                            }
                            </style>
                            <table class="table test_table" style="float:right" border="none">
                                <tr>
                                    <td>Subtotal</td>
                                    <td>${{$editData->subtotal}}</td>

                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>${{$editData->discount}}</td>

                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td>${{$editData->total_price}}</td>

                                </tr>
                            </table>
                        </div>
                        <div style="clear:both"></div>
                        <div style="margin-top:40px; margin-bottom:20px">
                            <a href="javascript:void(0)" class="btn btn-primary assign_room"> Assign Room</a>
                        </div>

                       @php
                         $assign_rooms=App\Models\BookingRoomList::with('room_number')->where('booking_id',$editData->id)->get();

                       @endphp
                       @if(count($assign_rooms) > 0)
                        <table class="table table-bordered">
                            <tr>
                                <th>Room Number</th>
                                <th>Action</th>
                            </tr>
                            @foreach($assign_rooms as assign_room)
                            <tr>
                                <td>{{$assign_room->room_number->room_no}}</td>
                                <td ><a  href="{{ route('assign_room_delete',$assign_room->id) }}" id="delete">
                                    Delete</a></td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-danger text-center">
                            Not Found Assign Room
                        </div>
                        @endif
                    </div>

                    <form action="{{route('update.booking.status',$editData->id)}}" method="post">
                        @csrf
                        <div class="row" style="margin-top:40px">
                            <div class="col-md-5">
                                <label for="">
                                    Payment Status
                                </label>
                                <select name="payment_status" type="text" class="form-control" id="input2"
                                    name="room_no">
                                    <option selected="">Select Status</option>
                                    <option value="0" {{$editData->payment_status == 0 ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="1" {{$editData->payment_status == 1 ? 'selected' : '' }}>
                                        Complete</option>

                                </select>
                            </div>



                            <div class="col-md-5">
                                <label for="">
                                    Booking Status
                                </label>
                                <select name="status" type="text" class="form-control" id="input2" name="room_no">
                                    <option selected="">Select Status</option>
                                    <option value="0" {{$editData->status == 0 ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="1" {{$editData->status == 1 ? 'selected' : '' }}>
                                        Complete</option>

                                </select>
                            </div>
                            <div class="col-md-12" style="margin-top:20px">

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('download.invoice',$editData->id)}}" class="btn btn-warning px-3 radius-10"><i class="lni lni-download"></i>Download Invoice</a>
                            </div>


                        </div>

                    </form>









                </div>
            </div>
        </div>



        <div class="col-12 col-lg-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Manage Room and Date</h6>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('update.booking',$editData->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 md-2">
                                <label for="">CheckIn</label>
                                <input type="date" required name="check_in" id="check_in" class="form-control"
                                    value="{{$editData->check_in}}">

                            </div>
                            <div class="col-md-12 md-2">
                                <label for="">Check Out</label>
                                <input type="date" required name="check_out" id="check_out" class="form-control"
                                    value="{{$editData->check_out}}">

                            </div>


                            <div class="col-md-12 md-2">
                                <label for="">Room</label>
                                <input type="number" required name="number_of_rooms" class="form-control"
                                    value="{{$editData->number_of_rooms}}">

                            </div>
                            <input type="hidden" id="available_room" name="available_room" class="form-control">

                            <div class="col-md-12 md-2">
                                <label for="">Availability:<span class="text-success availability"></span></label>

                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primsry">Update</button>

                            </div>



                        </div>
                    </form>
                </div>

            </div>

            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Coustomer Information</h6>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <label for="">Name:{{$editData['user']['name']}} </label><br>
                    <label for="" class="my-2">Email: {{$editData['user']['email']}}</label><br>
                    <label for="" class="my-2">Phone: {{$editData['user']['phone']}}</label><br>



                    <ul class="list-group list-group-flush">
                        <li
                            class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                            Name<span class="badge bg-success rounded-pill">{{$editData['user']['name']}} </span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Email <span class="badge bg-danger rounded-pill">{{$editData['user']['email']}}</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            Phone
                            <span class="badge bg-primary rounded-pill">{{$editData['user']['phone']}}</span>
                        </li>

                    </ul>













                </div>


            </div>







        </div>


        <!--end row-->
    </div>



    <!-- Modal -->
    <div class="modal fade myModel" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rooms</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>

            </div>
        </div>
    </div>












    <script>
    $(document).ready(function() {
        getAvaility();

        $(".assign_room").on('click', function() {
            $.ajax({
                url: "{{route('assign_room',$editData->id)}}",
                success: function(data) {
                    $('.myModel .model-body').html(data);
                    $('.myModel').modal('show');
                }
            });
            return false;
        });
    });

    function getAvaility() {
        var check_in = $('#check_in').val();
        var check_out = $('#check_out').val();
        var room_id = {
            {
                $editData - > rooms_id
            }
        };
        $.ajax({
            url: "{{ route('check_room_availability') }}",
            data: {
                room_id: room_id,
                check_in: check_in,
                check_out: check_out
            },
            success: function(data) {
                $(".availability").text(data['available_room']);
                $("#availability").val(data['available_room']);

            }


        });
    }
    </script>
    @endsection