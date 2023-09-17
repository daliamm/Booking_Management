@extends('frontend.main_master')
@section('main')
<!-- Room Area -->
<div class="room-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">ROOMS</span>
            <h2>Our Rooms & Rates</h2>
        </div>
        <div class="row pt-45">
            <?php $empty_array=[]; ?>
            @foreach($rooms as $item)

            @php
            $bookings=App\Models\Booking::withCount('assign_rooms')->
            whereIn('id',$check_data_booking_ids)->where('rooms_id',
            $item->id
            )->get()->toArray();
            $total_book_room=array_sum(array_colum($bookings,
            'assign_rooms_count'
            ));
            $av_room=@$item->room_numbers_count - $total_book_room;
            @endphp


            @if($av_room>0 && old('persion')<= $item->guests_no)
                <div class="col-lg-4 col-md-6">
                    <div class="room-card">
                        <a href="{{route('search_room_details',$item->id.'?check_in='.old('check_in').'
                                
                              &check_out='.old('check_out').'&persion='.old('persion'))}}">
                            <img src="asset('upload/rooming/'.$item->image)" alt="Images"
                                style="width:550px; height:300px; ">
                        </a>
                        <div class="content">
                            <h5><a
                                    href="{{route('search_room_details',$item->id.'?check_in='.old('check_in').'
                                
                              &check_out='.old('check_out').'&persion='.old('persion'))}}">{{$item['type']['name']}}</a>
                            </h5>
                            <ul>
                                <li class="text-color">${{$item->price}}</li>
                                <li class="text-color">Per h</li>
                            </ul>
                            <div class="rating text-color">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star-half'></i>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <?php array_push($empty_array , $item->id) ?>
                @endif
                @endforeach
                @if(count($rooms)== count($empty_array))
                <p class="text-center text-danger">Sorry No Data Found</p>

                @endif


        </div>
    </div>
</div>
<!-- Room Area End -->
@endsection