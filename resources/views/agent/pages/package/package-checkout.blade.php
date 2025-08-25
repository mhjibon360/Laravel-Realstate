@extends('agent.layouts.agent-master')
@section('title', 'package ' . $plan->package_name)
@section('agent_content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-plan"><a href="javascript::void();">Package checkout</a></li>
            <li class="breadcrumb-plan active" aria-current="page">/ checkout</li>
        </ol>
    </nav>

    <div class="row profile-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 stretch-card grid-margin grid-margin-md-0">
                                    <div class="card">
                                        <div class="p-3">
                                            <h3 class=" mb-1 mt-4">You Choose Package {{ $plan->package_name }} </h3>
                                            <p class="text-muted  mb-2 pb-2">
                                                ${{ $plan->package_price }} / {{ $plan->package_validitytime }}
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <!--paypal-->
                                                <div class="col-md-4">
                                                    <div class="p-2 shadow">
                                                        <a href="">
                                                            <img src="https://easydigitaldownloads.com/wp-content/uploads/edd/2021/07/paypal-featured-image.png"
                                                                class=" img-fluid img-thumbnail"
                                                                style="height: 100px;width:400px;object-fit:cover;"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--stripe-->
                                                <div class="col-md-4">
                                                    <div class="p-2 shadow">
                                                        <form action="{{ route('agent.stripe.checkout') }}" method="post">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="hidden" value="{{ $plan->id }}"
                                                                name="id">
                                                            <button>
                                                                <img src="https://sitemile.com/wp-content/uploads/2021/03/stripe123-1536x768.png"
                                                                    class=" img-fluid img-thumbnail"
                                                                    style="height: 100px;width:400px;object-fit:cover;"
                                                                    alt="">
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!--banking-->
                                                <div class="col-md-4">
                                                    <div class="p-2 shadow">
                                                        <a href="">
                                                            <img src="https://www.swapnojatraa.com/wp-content/uploads/2021/08/top-10-sustainable-Bangladeshi-Bank.webp"
                                                                class=" img-fluid img-thumbnail"
                                                                style="height: 100px;width:400px;object-fit:cover;"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 stretch-card grid-margin grid-margin-md-0">
                                    <div class="card">

                                        <div class="card-body">
                                            <h4 class="text-center mt-3 mb-4">{{ $plan->package_name }}</h4>
                                            <i data-feather="{{ $plan->package_icon }}"
                                                class=" icon-xxl d-block mx-auto my-3"
                                                style="color: {{ $plan->package_cardcolor }}"></i>
                                            <h1 class="text-center">${{ $plan->package_price }}</h1>
                                            <p class="text-muted text-center mb-4 fw-light">
                                                {{ $plan->package_validitytime }}
                                            </p>
                                            <h5 class=" text-center mb-4" style="color: {{ $plan->package_cardcolor }};">
                                                {{ $plan->package_property }}
                                            </h5>
                                            <table class="mx-auto">
                                                <tr>
                                                    <td>
                                                        @if ($plan->account_dashboard_status == '1')
                                                            <i data-feather="check" class="icon-md text-primary me-2"></i>
                                                        @else
                                                            <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <p
                                                            class="{{ $plan->account_dashboard_status == '0' ? 'text-muted' : '' }}">
                                                            {{ $plan->account_dashboard }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if ($plan->invoice_status == '1')
                                                            <i data-feather="check" class="icon-md text-primary me-2"></i>
                                                        @else
                                                            <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <p class="{{ $plan->invoice_status == '0' ? 'text-muted' : '' }}">
                                                            {{ $plan->invoice }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if ($plan->online_payment_status == '1')
                                                            <i data-feather="check" class="icon-md text-primary me-2"></i>
                                                        @else
                                                            <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <p
                                                            class="{{ $plan->online_payment_status == '0' ? 'text-muted' : '' }}">
                                                            {{ $plan->online_payment }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if ($plan->brand_website_status == '1')
                                                            <i data-feather="check" class="icon-md text-primary me-2"></i>
                                                        @else
                                                            <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <p
                                                            class="{{ $plan->brand_website_status == '0' ? 'text-muted' : '' }}"">
                                                            {{ $plan->brand_website }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if ($plan->account_manager_status == '1')
                                                            <i data-feather="check" class="icon-md text-primary me-2"></i>
                                                        @else
                                                            <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <p
                                                            class="{{ $plan->account_manager_status == '0' ? 'text-muted' : '' }}"">
                                                            {{ $plan->account_manager }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if ($plan->premium_app_status == '1')
                                                            <i data-feather="check" class="icon-md text-primary me-2"></i>
                                                        @else
                                                            <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <p
                                                            class=" {{ $plan->premium_app_status == '0' ? 'text-muted' : '' }}">
                                                            {{ $plan->premium_app }}</p>
                                                    </td>
                                                </tr>
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
@endsection
