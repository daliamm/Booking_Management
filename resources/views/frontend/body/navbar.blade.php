<div class="navbar-area">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="{{asset('/img/logos/logo-1.png')}}" class="logo-one" alt="Logo">
                    <img src="{{asset('/img/logos/footer-logo1.png')}}" class="logo-two" alt="Logo">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light ">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('frontend/assets/img/logos/logo-1.png')}}" class="logo-one" alt="Logo">
                            <img src="{{asset('frontend/assets/img/logos/footer-logo1.png')}}" class="logo-two" alt="Logo">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="{{url('/')}}" class="nav-link active">
                                        Home 
                                    </a>
                                   
                                <li class="nav-item">
                                    <a href="about.html" class="nav-link">
                                        About
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Pages 
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="book.html" class="nav-link">
                                                Booking
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a href="team.html" class="nav-link">
                                                Team
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="faq.html" class="nav-link">
                                                FAQ
                                            </a>
                                        </li>



                                        <li class="nav-item">
                                            <a href="gallery.html" class="nav-link">
                                                Gallery
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="testimonials.html" class="nav-link">
                                                Testimonials
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="checkout.html" class="nav-link">
                                                Check out
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a href="sign-in.html" class="nav-link">
                                                Sign In
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="sign-up.html" class="nav-link">
                                                Sign Up
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="terms-condition.html" class="nav-link">
                                                Terms & Conditions
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="privacy-policy.html" class="nav-link">
                                                Privacy Policy
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="404.html" class="nav-link">
                                                404 page
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a href="coming-soon.html" class="nav-link">
                                                Coming Soon
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Services 
                                        <i class='bx bx-chevron-down'></i>
                                    </a> -->
            @php
            $room=App\Models\Room::latest()->get();
            @endphp                               

                                <li class="nav-item">
                                    <a href="{{route('froom.all')}}" class="nav-link">
                                         All Rooms
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($room as $item)
                                        
                                        <li class="nav-item">
                                            <a href="{{route('details.all','id')}}" class="nav-link">
                                                {{$item['type']['name'] }} 
                                            </a>
                                        </li>
                                      @endforeach
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="contact.html" class="nav-link">
                                        Contact
                                    </a>
                                </li>

                                <li class="nav-item-btn">
                                    <a href="#" class="default-btn btn-bg-one border-radius-5">Book Now</a>
                                </li>
                            </ul>

                            <div class="nav-btn">
                                <a href="#" class="default-btn btn-bg-one border-radius-5">Book Now</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>