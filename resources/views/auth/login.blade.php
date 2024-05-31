@extends('layouts.auth')

@section('content')
    <section class="text-white sign-in-page card bg-primary iq-mb-3">
        <div class="p-0 container-fluid">
            <div class="row no-gutters">
                <div class="col-sm-6 align-self-center">
                    <div class="sign-in-from">
                        <h1 class="mb-0 text-white">Sign in</h1>
                        <p>Enter your email address and password to access admin panel.</p>
                        @include('layouts.alerts.dangeralerts')
                        <form class="mt-4" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <h4 class="text-white card-title">Email Address</h4>
                                <input name="email" type="email" class="mb-0 form-control" id="exampleInputEmail1"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <h4 class="text-white card-title">Password</h4>
                                <input name="password" type="password" class="mb-0 form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="d-inline-block w-100">
                                <button type="submit" class="float-right mb-3 btn btn-danger">Sign in</button>
                            </div>
                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Don't have an account? <a
                                        href="{{ route('register') }}" class="mb-1 text-white">Sign up</a></span>
                                <ul class="iq-social-media">
                                    <li><a href="https://github.com/iqbalhisbullah"><i class="ri-github-line"></i></a></li>
                                    <li><a href="https://www.instagram.com/iqball._/"><i class="ri-instagram-line"></i></a>
                                    </li>
                                    <li><a href="https://www.linkedin.com/in/iqbalhisbullah"><i
                                                class="ri-linkedin-line"></i></a></li>
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
