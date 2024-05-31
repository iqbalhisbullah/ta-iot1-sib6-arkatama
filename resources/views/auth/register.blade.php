@extends('layouts.auth')

@section('content')
    <section class="text-white bg-primary sign-in-page">
        <div class="p-0 container-fluid">
            <div class="row no-gutters">
                <div class="col-sm-6 align-self-center">
                    <div class="sign-in-from">
                        <h1 class="mb-0 text-white">Sign Up</h1>
                        <p>Enter your email address and password to access admin panel.</p>
                        @include('layouts.alerts.dangeralerts')
                        <form class="mt-4" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <h4 class="text-white card-title">Your Full Name</h4>
                                <input name="name" type="text" class="mb-0 form-control" id="exampleInputEmail1"
                                    placeholder="Your Full Name">
                            </div>
                            <div class="form-group">
                                <h4 class="text-white card-title">Email address</h4>
                                <input name="email" type="email" class="mb-0 form-control" id="exampleInputEmail2"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <h4 class="text-white card-title">Password</h4>
                                <input name="password" type="password" class="mb-0 form-control" id="password"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <h4 class="text-white card-title">Password Confirmation</h4>
                                <input name="password_confirmation" type="password" class="mb-0 form-control" id="password_confirmation"
                                    placeholder="Password">
                            </div>
                            <div class="d-inline-block w-100">
                                <button type="submit" class="float-right mb-3 btn btn-danger">Sign Up</button>
                            </div>
                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a
                                        href="{{ route('login') }}"  class="mb-1 text-white">Log In</a></span>
                                <ul class="iq-social-media">
                                    <li><a href="https://github.com/iqbalhisbullah"><i class="ri-github-line"></i></a></li>
                                    <li><a href="https://www.instagram.com/iqball._/"><i class="ri-instagram-line"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/iqbalhisbullah"><i class="ri-linkedin-line"></i></a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center col-sm-6">
                    <div class="text-white sign-in-detail"
                        style="background: url(images/login/2.jpg) no-repeat 0 0; background-size: cover;">
                        <a></a>
                        <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true"
                            data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1"
                            data-items-mobile-sm="1" data-margin="0">
                            <div class="item">
                                <img src="images/login/1.png" class="mb-4 img-fluid" alt="logo">
                                <h4 class="text-primary">Monitor and manage your IoT devices with ease.</h4>
                            </div>
                            <div class="item">
                                <img src="images/login/1.png" class="mb-4 img-fluid" alt="logo">
                                <h4 class="text-primary">Monitor and manage your IoT devices with ease.</h4>
                            </div>
                            <div class="item">
                                <img src="images/login/1.png" class="mb-4 img-fluid" alt="logo">
                                <h4 class="text-primary">Monitor and manage your IoT devices with ease.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
