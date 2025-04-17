@extends('layouts.app')

@section('content')

    <!-- Video Modal Start -->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Video Modal End -->
 <!-- Header Start -->
    <div class="container-fluid bg-dark d-flex align-items-center mb-5 py-5" id="home" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 pl-lg-0 pb-5 pb-lg-0">
                    <img class="img-fluid w-100 rounded-circle shadow-sm" src="{{ asset("storage/$user?->profile_pic") }}" alt="">
                </div>
                <div class="col-lg-7 text-center text-lg-left">
                    <h3 class="text-white font-weight-normal mb-3">I'm</h3>
                    <h1 class="display-3 text-uppercase text-primary mb-2" style="-webkit-text-stroke: 2px #ffffff;">{{ $user?->name }}</h1>
                    <h1 class="typed-text-output d-inline font-weight-lighter text-white"></h1>
                    <div class="typed-text d-none">{{ $user?->job }}</div>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="{{ $setting->cv_url }}" target="_blank" class="btn btn-outline-light mr-5">Download CV</a>
                        {{-- <button type="button" class="btn-play" data-toggle="modal"
                            data-src="{{$setting->video_url }}" data-target="#videoModal">
                            <span></span>
                        </button> --}}
                        {{-- <h5 class="font-weight-normal text-white m-0 ml-4 d-none d-sm-block">Play Video</h5> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- Header End -->

 
   <!-- About Start -->
        <div class="container-fluid py-5" id="about">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-6 text-uppercase text-light-grey" style="-webkit-text-stroke: 1px #dee2e6;">About Me</h1>
                    {{-- <h1 class="position-absolute text-uppercase text-primary">About Me</h1> --}}
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5 pb-4 pb-lg-0">
                        <img class="img-fluid rounded "  style="width: 400px; height: auto;" src="{{ Storage::url($user->profile_pic) }}" alt="profile_picture">
                    </div>
                    <div class="col-lg-7">
                        <h3 class="mb-4"></h3>
                        <p></p>
                        <div class="row mb-3">
                            <div class="col-sm-6 py-2"><h6>Name: <span class="text-secondary">{{ $user?->name }}</span></h6></div>
                            <div class="col-sm-6 py-2"><h6>Birthday: <span class="text-secondary">{{ $user?->birthday }}</span></h6></div>
                            <div class="col-sm-6 py-2"><h6>Degree: <span class="text-secondary">{{ $user?->degree }}</span></h6></div>
                            <div class="col-sm-6 py-2"><h6>Experience: <span class="text-secondary">{{ $user?->experience }} Years</span></h6></div>
                            <div class="col-sm-6 py-2"><h6>Phone: <span class="text-secondary">{{ $user?->phone }}</span></h6></div>
                            <div class="col-sm-6 py-2"><h6>Email: <span class="text-secondary">{{ $user?->email }}</span></h6></div>
                            <div class="col-sm-6 py-2"><h6>Address: <span class="text-secondary">{{ $user?->address }}</span></h6></div>
                            <div class="col-sm-6 py-2"><h6>Freelance: <span class="text-secondary">Available</span></h6></div>
                        </div>
                        {{-- <a href="{{ $setting->freelance_url }}" class="btn btn-outline-primary mr-4">Hire Me</a> --}}
                        {{-- <a href="" class="btn btn-outline-primary">Learn More</a> --}}
                    </div>
                </div>
            </div>
        </div>
   <!-- About End -->


<!-- Education and Experience Start -->
   <div class="container-fluid py-5 bg-dark text-white" id="qualification">
    <div class="container">
        <div class="position-relative d-flex align-items-center justify-content-center">
            <h1 class="display-6 text-uppercase text-light-grey" style="-webkit-text-stroke: 1px #dee2e6;">Education and Experience</h1>
            {{-- <h1 class="position-absolute text-uppercase text-primary">About Me</h1> --}}
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h3 class="mb-4">My Education</h3>
                <div class="border-left border-primary pt-2 pl-4 ml-2">
                    @foreach ($educations as $education)
                    <div class="position-relative mb-4">
                        <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                        <h5 class="font-weight-bold mb-1 text-white">{{ $education->title }}</h5>
                        <p class="mb-2"><strong>{{ $education->association }}</strong> | <small>{{ $education->from }} - {{ $education->to }}</small></p>
                        <p>{{ $education->description }} </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="mb-4">My Education</h3>
                <div class="border-left border-primary pt-2 pl-4 ml-2">
                    @foreach ($works as $work)
                    <div class="position-relative mb-4">
                        <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                        <h5 class="font-weight-bold mb-1  text-white">{{ $work->title }}</h5>
                        <p class="mb-2"><strong>{{ $work->association }}</strong> | <small>{{ $work->from }} - 
                            @if ($work->to == today()->toDateString())
                            Current
                            @else
                            {{ $work->to }}
                            @endif
                        </small>
                    </p>
                        <p>{{ $work->description }} </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
   </div>
<!-- Education and Experience End -->


<!-- Skill Start -->
   <div class="container-fluid py-5" id="skill">
    <div class="container">
        <div class="position-relative d-flex align-items-center justify-content-center">
            <h1 class="display-6 text-uppercase text-light-grey" style="-webkit-text-stroke: 1px #dee2e6;">Skills</h1>
            {{-- <h1 class="position-absolute text-uppercase text-primary">About Me</h1> --}}
        </div>
        <div class="row align-items-center">

            @foreach ($skills->chunk(ceil($skills->count() / 3)) as $chunk)
                <div class="col-md-6">
                    @foreach($chunk as $skill)
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">{{ $skill->name }}</h6>
                            <h6 class="font-weight-bold">{{$skill->percent}}%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->percent}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill->percent}}%; background-color: {{$skill->color}}"></div>
                        </div>
                    @endforeach
                </div>
            @endforeach

        </div>
    </div>
    </div>
<!-- Skill End -->


 <!-- Service Start -->
    <div class="container-fluid py-5" id="qualification">
        {{-- <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center"> --}}
                {{-- <h1 class="display-6 text-uppercase text-light-grey" style="-webkit-text-stroke: 1px #dee2e6;">Services</h1> --}}
            {{-- </div> --}}
            {{-- <div class="row pb-3"> --}}

                @foreach ($services as $service)
                    {{-- <div class="col-lg-4 col-md-6 text-center mb-5">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <i class="{{ $service->icon }} service-icon bg-primary text-white mr-3"></i>
                            <h4 class="font-weight-bold m-0">{{ $service->name }}</h4>
                        </div>
                        <p>{{ $service->description }}</p>
                    </div> --}}
                @endforeach

            {{-- </div>
        </div>
        </div> --}}
<!-- Service End -->

  <!-- Portfolio Start -->
    <div class="container-fluid py-5 bg-dark text-white" id="portfolio">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-6 text-uppercase text-darkt-grey" style="-webkit-text-stroke: 1px #dee2e6;">Portfolio</h1>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-sm btn-outline-primary m-1 active" data-filter="*">All</li>
                        @foreach ($categories as $category)
                            <li class="btn btn-sm btn-outline-primary m-1" data-filter=".{{ Str::slug($category->name) }}">
                                {{ $category->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 text-centere  mb-5 portfolio-item {{ Str::slug($portfolio->category->name) }}">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <i class="{{ $portfolio->icon }} service-icon bg-primary text-white mr-3"></i>
                            <h4 class="font-weight-bold m-0  text-white">{{ $portfolio->category->name }}</h4>
                        </div>
                        <p>{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
  <!-- Portfolio End -->



  {{-- contact-us-page start--}}
    <div class="container-fluid py-5" id="contact">
        <div class="container">
            
        <div class="row d-flex contact-info mb-5">
            <div class="col-md-6 col-lg-3 d-flex ftco-animate fadeInUp ftco-animated">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <i class="far fa-address-card "  style="font-size: 40px"></i>
                    </div>
                    <h3 class="mb-4 mt-2">Address</h3>
                <p>Anuththara, Lindara, Mirirgama</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex ftco-animate fadeInUp ftco-animated">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <i class="fas fa-phone-alt" style="font-size: 40px"></i>
                    </div>
                    <h3 class="mb-4 mt-2">Contact Number</h3>
                <p><a href="tel:+94716897175">+94 71 689 7175</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex ftco-animate fadeInUp ftco-animated">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <i class="fas fa-mail-bulk" style="font-size: 40px"></i>
                    </div>
                    <h3 class="mb-4 mt-2">Email Address</h3>
                <p><a href="mailto:nethmiwelgamvila@gmail.com" target="_blank">nethmiwelgamvila<br>@gmail.com</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex ftco-animate fadeInUp ftco-animated">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <i class="fa fa-linkedin" style="font-size: 40px"></i>
                    </div>
                    <h3 class="mb-4 mt-2">Linkedin</h3>
                <p><a href="https://www.linkedin.com/in/nethmi96/" target="_blank">Nethmi Welgamvila</a></p>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="position-relative d-flex align-item-center justify-content-center">
                <h1 class="display-6 text-uppercase text-light-grey" style="-webkit-text-stroke: 1px #dee2e6;">Contact US</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form text-center">
                        @if(Session::has('message'))
                            <div class="alert alert-primary" role="alert">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{route('contacts')}}" id="contactForm" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" name="name" id="name" placeholder="your name" class="form-control p-4" value="{{ old('name')}}" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" name="email" id="email" placeholder="your email" class="form-control p-4" value="{{ old('email')}}" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="control-group">
                                <input type="text" name="subject" id="subject" placeholder="Subject" class="form-control p-4" value="{{ old('subject')}}" required>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                            <textarea class="form-control py-3 px-4" name="content" placeholder="message"  id="message" cols="30" rows="10" required>{{ old('content')}}</textarea>
                            <p class="help-block text-danger"></p>
                            </div>

                            <div class="">
                                <button class="btn btn-outline-primary" type="submit" id="sendMessageButton">Send Message</button>
                            </div>

                            @if($errors->any())
                            <br>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  {{-- contact-us-page end--}}



   <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="container text-center py-5">
            <div class="d-flex justify-content-center mb-4">
                <a class="btn btn-light btn-social mr-2" href="{{ $setting->github_url }}"  target="_blank"><i class="fab fa-github"></i></a>
                <a class="btn btn-light btn-social mr-2" href="{{ $setting->fb_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-light btn-social mr-2" href="{{ $setting->linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-light btn-social mr-2" href="https://medium.com/@nethmiwelgamvila" target="_blank"><i class="fab fa-medium"></i></a>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <a class="text-white" href="#">Privacy</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Terms</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">FAQs</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Help</a>
            </div>
            {{-- <p class="m-0">&copy; <a class="text-white font-weight-bold" href="#">Domain Name</a>. All Rights Reserved. Designed by <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
            </p> --}}
        </div>
    </div>
<!-- Footer End -->
@endsection
