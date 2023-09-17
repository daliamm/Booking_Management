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
                    @foreach($rooms as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="room-card">
                            <a href="{{url('room/deltails/'.$item->id)}}">
                                <img src="asset('upload/rooming/'.$item->image)" alt="Images" style="width:550px; height:300px; ">
                            </a>
                            <div class="content">
                                <h5><a href="{{url('room/details/'.$item->id)}}">{{$item['type']['name']}}</a></h5>
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

@endforeach
                </div>
            </div>
        </div>
        <!-- Room Area End -->
@endsection