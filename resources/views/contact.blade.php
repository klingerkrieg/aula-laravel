@extends('layouts.template')

@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url('{{asset('clean-blog/assets/img/contact-bg.jpg')}}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Contact Me</h1>
                    <span class="subheading">Have questions? I have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{{__("Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!")}}</p>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                    {{session('success')}}
                    </div>
                @endif


                <div class="my-5">
                    
                    <form id="contactForm" action="{{route("contact.send")}}" method="POST" >
                        @csrf

                        <div class="form-floating">
                            <input class="form-control @error('name') is-invalid @enderror"
                                   name="name" id="name" 
                                   value="{{ old('name') }}"
                                   type="text" placeholder=" " />
                            <label for="name"> {{__('Name')}}</label>

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="form-floating">
                            <input class="form-control @error('email') is-invalid @enderror" 
                                    name="email" id="email" 
                                    value="{{ old('email') }}"
                                    type="email" placeholder=" " />
                            <label for="email">{{__('Email address')}}</label>

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input class="form-control phone @error('phone') is-invalid @enderror" 
                                    name="phone" id="phone" 
                                    value="{{ old('phone') }}"
                                    type="text" placeholder=" " />
                            <label for="phone">{{__('Phone Number')}}</label>

                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input class="form-control @error('subject') is-invalid @enderror" 
                                    name="subject" id="subject" 
                                    value="{{ old('subject') }}"
                                    type="text" placeholder=" " />
                            <label for="subject">{{__('Subject')}}</label>

                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                    name="message" id="message"
                                    placeholder=" " style="height: 12rem" >{{ old('message') }}</textarea>
                            <label for="message">{{__('Message')}}</label>

                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br />
                        
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">
                            {{__('Send')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Footer-->
@endsection