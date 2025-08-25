@extends('agent.layouts.agent-master')
@section('title', 'your purchase package')
@section('agent_content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">purchase-package</a></li>
            <li class="breadcrumb-item active" aria-current="page">package</li>
        </ol>
    </nav>

    <div class="row profile-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-3 mt-4">Your Purchase Package</h3>
                        <p class="text-muted text-center mb-4 pb-2">
                            this package you purchased
                        </p>
                        <div class="container">
                            <div class="row g-4">
                                @foreach ($purchaehistory as $item)
                                    @if ($item->package)
                                        <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="text-center mt-3 mb-4">{{ $item->package->package }}</h4>
                                                    <i data-feather="{{ $item->package->package_icon }}"
                                                        class=" icon-xxl d-block mx-auto my-3"
                                                        style="color: {{ $item->package->package_cardcolor }}"></i>
                                                    <h1 class="text-center">${{ $item->package->package_price }}</h1>
                                                    <p class="text-muted text-center mb-4 fw-light">
                                                        {{ $item->package->package_validitytime }}
                                                    </p>
                                                    <h5 class=" text-center mb-4"
                                                        style="color: {{ $item->package->package_cardcolor }};">
                                                        {{ $item->package->package_property }}
                                                    </h5>
                                                    <table class="mx-auto">
                                                        <tr>
                                                            <td>
                                                                @if ($item->package->account_dashboard_status == '1')
                                                                    <i data-feather="check"
                                                                        class="icon-md text-primary me-2"></i>
                                                                @else
                                                                    <i data-feather="x"
                                                                        class="icon-md text-danger me-2"></i>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                <p
                                                                    class="{{ $item->package->account_dashboard_status == '0' ? 'text-muted' : '' }}">
                                                                    {{ $item->package->account_dashboard }}</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                @if ($item->package->invoice_status == '1')
                                                                    <i data-feather="check"
                                                                        class="icon-md text-primary me-2"></i>
                                                                @else
                                                                    <i data-feather="x"
                                                                        class="icon-md text-danger me-2"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <p
                                                                    class="{{ $item->package->invoice_status == '0' ? 'text-muted' : '' }}">
                                                                    {{ $item->package->invoice }}</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                @if ($item->package->online_payment_status == '1')
                                                                    <i data-feather="check"
                                                                        class="icon-md text-primary me-2"></i>
                                                                @else
                                                                    <i data-feather="x"
                                                                        class="icon-md text-danger me-2"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <p
                                                                    class="{{ $item->package->online_payment_status == '0' ? 'text-muted' : '' }}">
                                                                    {{ $item->package->online_payment }}</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                @if ($item->package->brand_website_status == '1')
                                                                    <i data-feather="check"
                                                                        class="icon-md text-primary me-2"></i>
                                                                @else
                                                                    <i data-feather="x"
                                                                        class="icon-md text-danger me-2"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <p
                                                                    class="{{ $item->package->brand_website_status == '0' ? 'text-muted' : '' }}"">
                                                                    {{ $item->package->brand_website }}</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                @if ($item->package->account_manager_status == '1')
                                                                    <i data-feather="check"
                                                                        class="icon-md text-primary me-2"></i>
                                                                @else
                                                                    <i data-feather="x"
                                                                        class="icon-md text-danger me-2"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <p
                                                                    class="{{ $item->package->account_manager_status == '0' ? 'text-muted' : '' }}"">
                                                                    {{ $item->package->account_manager }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                @if ($item->package->premium_app_status == '1')
                                                                    <i data-feather="check"
                                                                        class="icon-md text-primary me-2"></i>
                                                                @else
                                                                    <i data-feather="x"
                                                                        class="icon-md text-danger me-2"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <p
                                                                    class=" {{ $item->package->premium_app_status == '0' ? 'text-muted' : '' }}">
                                                                    {{ $item->package->premium_app }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="d-grid">
                                                        <a class="delete_btn btn btn-inverse-info mb-1 mb-md-0  mt-4"
                                                            >
                                                            {{ $item->created_at->format('d-M-Y') }} ({{ $item->created_at->diffForHumans() }})
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
