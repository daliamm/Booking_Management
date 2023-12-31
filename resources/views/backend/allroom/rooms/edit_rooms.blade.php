@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

    <div class="container">
        <div class="main-body">
            <div class="row">


                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Manage Room </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Room Number</div>
                                    </div>
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content py-3">
                            <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
                                <div class="col-xl-6 mx-auto">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <h5 class="mb-4">Update Room</h5>
                                            <form class="row g-3" action="{{route('update.room',$editData->id)}}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-4">
                                                    <label for="input1" class="form-label">Room Type Name</label>
                                                    <input type="text" name="roomtype_id" class="form-control"
                                                        id="input1" value="{{$editData['type']['name']}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input2" class="form-label">Total Number </label>
                                                    <input type="text" class="form-control" id="input2" name="total"
                                                        value="{{$editData->total}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="input2" class="form-label">Room Capacity</label>
                                                    <input type="text" class="form-control" id="input2"
                                                        name="room_capacity" value="{{$editData->room_capacity}}">
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="input2" class="form-label">Number Of Seats</label>
                                                    <input type="text" class="form-control" id="input2"
                                                        name="number_seats" value="{{$editData->number_seats}}">
                                                </div>



                                                <div class="col-md-6">
                                                    <label for="input3" class="form-label">Main Image</label>
                                                    <input type="file" class="form-control" id="input3" name="image">
                                                    <img id="showImage"
                                                        src="{{(!empty($editData->image)) ? url('upload/rooming/'.$editData->image) : url('upload/no_image.jpg')}}"
                                                        alt="Admin" class=" bg-primary" width="70" height="50">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="input4" class="form-label">Gallery Image</label>
                                                    <input type="file" class="form-control" multiple id="multiImg"
                                                        name="multi_img[]"
                                                        accept="image/jpeg ,image/jpg ,image/gif ,image/png">
                                                    @foreach($multiimgs as $item)

                                                    <img src="{{(!empty($item->multi_img)) ? url('upload/rooming/multi_img/'.$item->multi_img) : url('upload/no_image.jpg')}}"
                                                        alt="room" class=" bg-primary" width="60">

                                                    <a href="{{route('multi.image.delete',$item->id)}}"><i
                                                            class="lni lni-close"></i></a>
                                                    @endforeach




                                                    <div class="row" id="preview_img"></div>


                                                </div>


                                                <div class="col-md-3">
                                                    <label for="input2" class="form-label">Room Price</label>
                                                    <input type="text" class="form-control" id="input2" name="price"
                                                        value="{{$editData->price}}">
                                                </div>


                                                <div class="col-md-3">
                                                    <label for="input2" class="form-label">Size</label>
                                                    <input type="text" class="form-control" id="input2" name="size"
                                                        value="{{$editData->size}}">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="input2" class="form-label">Discount ( % )</label>
                                                    <input type="text" class="form-control" id="input2" name="discount"
                                                        value="{{$editData->discount}}">
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="input11" class="form-label">Short Description</label>
                                                    <textarea class="form-control" id="input11" name="short_desc"
                                                        rows="3">{{$editData->short_desc}}</textarea>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="input11" class="form-label"> Description</label>
                                                    <textarea class="form-control" id="myeditorinstance"
                                                        name="description"
                                                        rows="3">{!! $editData->description !!}</textarea>
                                                </div>

                                        </div>




                                        <div class="row mt-2">
                                            <div class="col-md-12 mb-3">
                                                @forelse ($basic_facility as $item)
                                                <div class="basic_facility_section_remove"
                                                    id="basic_facility_section_remove">
                                                    <div class="row add_item">
                                                        <div class="col-md-8">
                                                            <label for="facility_name" class="form-label"> Room
                                                                Facilities </label>
                                                            <select name="facility_name[]" id="facility_name"
                                                                class="form-control">
                                                                <option value="">Select Facility</option>
                                                                <option value="Projectors"
                                                                    {{$item->facility_name == 'Projectors'?'selected':''}}>
                                                                    Projectors</option>
                                                                <option value="32/42 inch LED TV"
                                                                    {{$item->facility_name == '32/42 inch LED TV'?'selected':''}}>
                                                                    32/42 inch LED TV</option>

                                                                <option value="Smoke alarms"
                                                                    {{$item->facility_name == 'Smoke alarms'?'selected':''}}>
                                                                    Smoke alarms</option>

                                                                <option value="Security"
                                                                    {{$item->facility_name == 'Security'?'selected':''}}>
                                                                    Security</option>

                                                                <option value="Desks and Chairs"
                                                                    {{$item->facility_name == 'Desks and Chairs'?'selected':''}}>
                                                                    Desks and Chairs</option>

                                                                <option value="Wi-Fi"
                                                                    {{$item->facility_name == 'Wi-Fi'?'selected':''}}>
                                                                    Wi-Fi</option>

                                                                <option value="Conditioning"
                                                                    {{$item->facility_name == 'Conditioning'?'selected':''}}>
                                                                    Conditioning</option>

                                                                <option value="Audio Equipment"
                                                                    {{$item->facility_name == 'Audio Equipment'?'selected':''}}>
                                                                    Audio Equipment</option>

                                                                <option value="Phone Lines"
                                                                    {{$item->facility_name == 'Phone Lines'?'selected':''}}>
                                                                    Phone Lines</option>

                                                                <option value="Lighting"
                                                                    {{$item->facility_name == 'Lighting'?'selected':''}}>
                                                                    Lighting</option>

                                                                <option value="Collaboration Tools"
                                                                    {{$item->facility_name == 'Collaboration Tools'?'selected':''}}>
                                                                    Collaboration Tools</option>

                                                                <option value="Computers and Hardware"
                                                                    {{$item->facility_name == 'Computers and Hardware'?'selected':''}}>
                                                                    Computers and Hardware</option>

                                                                <option value="Electronic door lock"
                                                                    {{$item->facility_name == 'Electronic door lock'?'selected':''}}>
                                                                    Electronic door lock</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group" style="padding-top: 30px;">
                                                                <a class="btn btn-success addeventmore"><i
                                                                        class="lni lni-circle-plus"></a>
                                                                <span class="btn btn-danger btn-sm removeeventmore"><i
                                                                        class="lni lni-circle-minus"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @empty

                                                <div class="basic_facility_section_remove"
                                                    id="basic_facility_section_remove">
                                                    <div class="row add_item">
                                                        <div class="col-md-6">
                                                            <label for="facility_name" class="form-label">Room
                                                                Facilities </label>
                                                            <select name="facility_name[]" id="facility_name"
                                                                class="form-control">
                                                                <option value="">Select Facility</option>
                                                                <option value="Projectors">Projectors</option>
                                                                <option value="32/42 inch LED TV"> 32/42 inch LED TV
                                                                </option>
                                                                <option value="Smoke alarms">Smoke alarms</option>
                                                                <option value="Security"> Security
                                                                </option>
                                                                <option value="Desks and Chairs">Desks and Chairs
                                                                </option>
                                                                <option value="Wi-Fi">Wi-Fi</option>
                                                                <option value="Conditioning">Conditioning</option>
                                                                <option value="Audio Equipment">Audio Equipment</option>
                                                                <option value="Phone Lines">Phone Lines </option>
                                                                <option value="Lighting">Lighting</option>
                                                                <option value="Collaboration Tools">Collaboration Tools
                                                                </option>
                                                                <option value="Computers and Hardware">Computers and
                                                                    Hardware</option>
                                                                <option value="Electronic door lock">Electronic door
                                                                    lock</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group" style="padding-top: 30px;">
                                                                <a class="btn btn-success addeventmore"><i
                                                                        class="lni lni-circle-plus"></i></a>

                                                                <span class="btn btn-danger removeeventmore"><i
                                                                        class="lni lni-circle-minus"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforelse



                                            </div>
                                        </div>
                                        <br>

                                        <div class="col-md-12">
                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div>



                                <div class="tab-pane fade" id="primaryprofile" role="tabpanel">


                                    <div class="card">

                                        <div class="card-body">
                                            <a href="" class="card-title btn btn-primary float-right"
                                                onclick="addRoomNo()" id="addRoomNo">
                                                <i class="lni lni-plus">Add New</i>
                                            </a>

                                            <div class="roomnoHide" id="roomnoHide">
                                                <form action="{{route('store.room.no',$editData->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="room_type_id"
                                                        value="{{$endData-> roomtype_id}}">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="input2" class="form-label">Room No</label>
                                                            <input type="text" class="form-control" id="input2"
                                                                name="room_no">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="input2" class="form-label">Status</label>
                                                            <select type="text" class="form-control" id="input2"
                                                                name="room_no">
                                                                <option selected="">Select Status</option>
                                                                <option value="Active">Active</option>
                                                                <option value="Inactive">Inactive</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-success"
                                                            style="margin-top:28px">Save</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="card-body">
                                                <table class="table mb-0 table-striped" id="roomview">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Room Number</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($allroomNo as $item)

                                                        <tr>
                                                            <td>{{$item->room_no}}</td>
                                                            <td>{{$item->status}}</td>
                                                            <td>
                                                                <a href="{{route('edit.roomno',$item->id)}}"
                                                                    class="btn btn-warning px-3 radiue-30">Edit</a>
                                                                <a href="{{route('delete.roomno',$item->id)}}"
                                                                    class="btn btn-danger px-3 radiue-30"
                                                                    id="delete">Delete</a>

                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

















                                        </div>

                                    </div>





                                </div>

                            </div>
                        </div>
                    </div>








                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(e) {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#multiImg').on('change', function() {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                var data = $(this)[0].files;

                $.each(data, function(index, file) {

                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) {
                        type
                        var fRead = new FileReader();
                        fRead.onload = (function(file) {
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).width(100)
                                    .height(80);
                                $('#preview_img').append(img);
                            };
                        })(file);
                        fRead.readAsDataURL(file);
                    }
                });

                MEMO, [25 / 9 / 2023 12: 11 م]
            } else {
                alert("Your browser doesn't support File API!");
            }
        });
    });
    </script>
    <!-- <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="basic_facility_section_remove" id="basic_facility_section_remove">
                <div class="container mt-2">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="basic_facility_name">Room Facilities</label>
                            <select name="facility_name[]" id="basic_facility_name" class="form-control">
                                <option value="">Select Facility</option>
                                <option value="Complimentary Breakfast">Complimentary Breakfast</option>
                                <option value="32/42 inch LED TV"> 32/42 inch LED TV</option>
                                <option value="Smoke alarms">Smoke alarms</option>
                                <option value="Minibar"> Minibar</option>
                                <option value="Work Desk">Work Desk</option>
                                <option value="Free Wi-Fi">Free Wi-Fi</option>
                                <option value="Safety box">Safety box</option>
                                <option value="Rain Shower">Rain Shower</option>
                                <option value="Slippers">Slippers</option>
                                <option value="Hair dryer">Hair dryer</option>
                                <option value="Wake-up service">Wake-up service</option>
                                <option value="Laundry & Dry Cleaning">Laundry & Dry Cleaning</option>
                                <option value="Electronic door lock">Electronic door lock</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding-top: 20px">
                            <span class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></span>
                            <span class="btn btn-danger removeeventmore"><i class="lni lni-circle-minus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <script type="text/javascript">
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event) {
            $(this).closest("#basic_facility_section_remove").remove();
            counter -= 1
        });
    });
    </script>
    <!-- start Room Number -->
    <script>
    $('#roomnoHide').hide();
    $('#roomview').show();

    function addRoomNo() {
        $('#roomnoHide').show();
        $('#roomview').hide();
        $('#addRoomNo').hide();


    } 
   <script/>





















 @endsection