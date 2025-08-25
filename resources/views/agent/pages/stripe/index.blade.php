@extends('agent.layouts.agent-master')
@section('title', 'stripe checkout')
@push('agent_style')
    <style>
        input.InputElement.is-complete.Input {
            color: white;
        }

        #card-element {
            color: white;
        }
    </style>
@endpush
@section('agent_content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-plan"><a href="javascript::void();">stripe checkout</a></li>
            <li class="breadcrumb-plan active" aria-current="page">/ payment</li>
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
                                            <h3 class=" mb-1 mt-4">Stripe </h3>
                                            <p class="text-muted  mb-2 pb-2">
                                                pay
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="">
                                                    <div class=" ">
                                                        <div class=" text-white">
                                                            @session('success')
                                                                <div class="alert alert-success" role="alert">
                                                                    {{ $value }}
                                                                </div>
                                                            @endsession

                                                            <form id='checkout-form' method='post'
                                                                action="{{ route('agent.stripe.payment') }}"
                                                                class=" text-white">
                                                                @csrf
                                                                <input type="hidden" name="package_id"
                                                                    value="{{ $plan->id }}">

                                                                <input type="hidden" name="amount"
                                                                    value="{{ $plan->package_price }}">

                                                                <input type="hidden" name="amount"
                                                                    value="{{ $plan->package_price }}">

                                                                <input type="hidden" name="property_count"
                                                                    value="{{ $plan->property_count }}">

                                                                <strong>Name:</strong>
                                                                <input type="input" class="form-control" name="name"
                                                                    placeholder="Enter Name"
                                                                    value="{{ Auth::user()->name }}">

                                                                <input type='hidden' name='stripeToken'
                                                                    id='stripe-token-id'>
                                                                <br>
                                                                <div id="card-element" class="form-control text-white">
                                                                </div>
                                                                <button id='pay-btn' class="btn btn-primary mt-5"
                                                                    type="button"
                                                                    style="margin-top: 20px; width: 100%;padding: 7px;"
                                                                    onclick="createToken()">PAY ${{ $plan->package_price }}
                                                                </button>
                                                                <form>
                                                    </div>
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
                                        <i data-feather="{{ $plan->package_icon }}" class=" icon-xxl d-block mx-auto my-3"
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
                                                    <p class=" {{ $plan->premium_app_status == '0' ? 'text-muted' : '' }}">
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
@push('agent_script')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        var stripe = Stripe('{{ env('STRIPE_KEY') }}')
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        /*------------------------------------------
        --------------------------------------------
        Create Token Code
        --------------------------------------------
        --------------------------------------------*/
        function createToken() {
            document.getElementById("pay-btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {

                if (typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                }

                /* creating token success */
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }
    </script>
@endpush
