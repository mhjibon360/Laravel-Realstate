@extends('backend.layouts.backend-master')
@section('title', 'all pricing')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Package Plan</a></li>
            <li class="breadcrumb-item active" aria-current="page">pricing</li>
        </ol>
    </nav>

    <div class="row profile-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-3 mt-4">Choose a plan</h3>
                        <p class="text-muted text-center mb-4 pb-2">
                            Choose the features and functionality your team need today.
                            Easily upgrade as your company grows.
                        </p>
                        <div class="container">
                            <div class="row">
                                @foreach ($allplan as $item)
                                    <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="text-center mt-3 mb-4">{{ $item->package_name }}</h4>
                                                <i data-feather="{{ $item->package_icon }}"
                                                    class=" icon-xxl d-block mx-auto my-3"
                                                    style="color: {{ $item->package_cardcolor }}"></i>
                                                <h1 class="text-center">${{ $item->package_price }}</h1>
                                                <p class="text-muted text-center mb-4 fw-light">
                                                    {{ $item->package_validitytime }}
                                                </p>
                                                <h5 class=" text-center mb-4"
                                                    style="color: {{ $item->package_cardcolor }};">
                                                    {{ $item->package_property }}
                                                </h5>
                                                <table class="mx-auto">
                                                    <tr>
                                                        <td>
                                                            @if ($item->account_dashboard_status == '1')
                                                                <i data-feather="check"
                                                                    class="icon-md text-primary me-2"></i>
                                                            @else
                                                                <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <p
                                                                class="{{ $item->account_dashboard_status == '0' ? 'text-muted' : '' }}">
                                                                {{ $item->account_dashboard }}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            @if ($item->invoice_status == '1')
                                                                <i data-feather="check"
                                                                    class="icon-md text-primary me-2"></i>
                                                            @else
                                                                <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <p
                                                                class="{{ $item->invoice_status == '0' ? 'text-muted' : '' }}">
                                                                {{ $item->invoice }}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            @if ($item->online_payment_status == '1')
                                                                <i data-feather="check"
                                                                    class="icon-md text-primary me-2"></i>
                                                            @else
                                                                <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <p
                                                                class="{{ $item->online_payment_status == '0' ? 'text-muted' : '' }}">
                                                                {{ $item->online_payment }}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            @if ($item->brand_website_status == '1')
                                                                <i data-feather="check"
                                                                    class="icon-md text-primary me-2"></i>
                                                            @else
                                                                <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <p
                                                                class="{{ $item->brand_website_status == '0' ? 'text-muted' : '' }}"">
                                                                {{ $item->brand_website }}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            @if ($item->account_manager_status == '1')
                                                                <i data-feather="check"
                                                                    class="icon-md text-primary me-2"></i>
                                                            @else
                                                                <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <p
                                                                class="{{ $item->account_manager_status == '0' ? 'text-muted' : '' }}"">
                                                                {{ $item->account_manager }}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            @if ($item->premium_app_status == '1')
                                                                <i data-feather="check"
                                                                    class="icon-md text-primary me-2"></i>
                                                            @else
                                                                <i data-feather="x" class="icon-md text-danger me-2"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <p
                                                                class=" {{ $item->premium_app_status == '0' ? 'text-muted' : '' }}">
                                                                {{ $item->premium_app }}</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a href="{{ route('admin.package-plan.edit', $item->id) }}"
                                                                class="btn btn-primary mt-4">
                                                                Edit
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form
                                                                action="{{ route('admin.package-plan.destroy', $item->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="delete_btn btn btn-danger mt-4">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('admin_script')
    <script>
        $(document).ready(function() {
            $('.delete_btn').click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');


                swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "me-2",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: true,
                    })
                    .then((result) => {
                        if (result.value) {
                            form.submit();
                            swalWithBootstrapButtons.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                        } else if (
                            // Read more about handling dismissals
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                "Cancelled",
                                "Your imaginary file is safe :)",
                                "error"
                            );
                        }
                    });

            });
        });
    </script>
@endpush
