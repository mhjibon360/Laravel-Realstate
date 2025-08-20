@extends('frontend.layouts.frontend-master')
@section('title', 'dashboard')
@section('main')
    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-9.png);">
            </div>
            <div class="pattern-2" style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-10.png);">
            </div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Dashboard</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>dashboard</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <section class=" my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('frontend.layouts.includes.user-leftmenu')
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <nav class="breadcrumb" style="background: #ecf8f1;">
                                <a class="breadcrumb-item text-success" href="javascript::void();">Main</a>
                                <span class="breadcrumb-item active" aria-current="page">dashboard</span>
                            </nav>

                            <hr>
                            <h2>user dashboard</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
