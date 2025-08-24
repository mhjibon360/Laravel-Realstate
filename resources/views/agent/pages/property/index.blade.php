@extends('agent.layouts.agent-master')
@section('title', 'all property list')
@section('agent_content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Property</a></li>
            <li class="breadcrumb-item active" aria-current="page">list</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize ">List of property </h5>
                        <hr>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Si</th>
                                        <th>Property Name</th>
                                        <th>Thumbnail</th>
                                        <th>Buy/Rent</th>
                                        <th>Price/Discount</th>
                                        <th>Hot</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allproperty as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->property_name }}</td>
                                            <td>
                                                <img src="{{ asset($item->thumbnail) }}" class=" img-fluid img-thumbnail" style="height: 60px;width:60px;" alt="">
                                            </td>
                                            <td>
                                                @if ($item->buy_rent_type == 'buy')
                                                    <span class="badge bg-primary">Buy</span>
                                                @else
                                                    <span class="badge bg-info">Rent</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->discount_price)
                                                    <span class=" text-success"> ${{ $item->discount_price }}</span>
                                                    <span class=" text-warning"><del>${{ $item->price }}</del></span>
                                                @else
                                                    <span class=" text-success"> ${{ $item->price }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                <input data-id="{{ $item->id }}"
                                                    class="hot_property_toggle_class btn-sm" type="checkbox"
                                                    data-onstyle="primary" data-offstyle="dark" data-toggle="toggle"
                                                    data-on="Active" data-off="Inactive"
                                                    {{ $item->hot_property ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <input data-id="{{ $item->id }}" class="featured_property_toggle_class"
                                                    type="checkbox" data-onstyle="info" data-offstyle="secondary"
                                                    data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                    {{ $item->featured_property ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <input data-id="{{ $item->id }}" class="status_property_toggle_class"
                                                    type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                    data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                    {{ $item->status ? 'checked' : '' }}>
                                            </td>
                                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                            <td>
                                                <a href="{{ route('agent.property.edit', $item->id) }}"
                                                    class="btn btn-inverse-warning mb-1 mb-md-0"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <form action="{{ route('agent.property.destroy', $item->id) }}"
                                                    method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" id="delete_btn"
                                                        class="btn btn-inverse-danger mb-1 mb-md-0 delete_btn"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>

                                                <a href="{{ route('agent.property.show', $item->id) }}"
                                                    class="btn btn-inverse-info mb-1 mb-md-0"><i
                                                        class="fa-solid fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->

    </div>
@endsection
@push('agent_script')
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

    <script>
        $(document).ready(function() {
            // hot property
            $('.hot_property_toggle_class').change(function() {
                var hot = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    url: route('agent.hot.property.status'),
                    data: {
                        hot: hot,
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        // start sweet alert
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 3500,
                            timerProgressBar: true,
                        });

                        if (response.success) {
                            Toast.fire({
                                icon: 'success',
                                title: response.success,
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.error,
                            })
                        }

                        //end sweetalert


                    }
                });
            });
            // featured property
            $('.featured_property_toggle_class').change(function() {
                var featured = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    url: route('agent.featured.property.status'),
                    data: {
                        featured: featured,
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        // start sweet alert
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 3500,
                            timerProgressBar: true,
                        });

                        if (response.success) {
                            Toast.fire({
                                icon: 'success',
                                title: response.success,
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.error,
                            })
                        }

                        //end sweetalert
                    }
                });
            });
            // featured property
            $('.status_property_toggle_class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    url: route('agent.property.status'),
                    data: {
                        status: status,
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        // start sweet alert
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 3500,
                            timerProgressBar: true,
                        });

                        if (response.success) {
                            Toast.fire({
                                icon: 'success',
                                title: response.success,
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.error,
                            })
                        }

                        //end sweetalert
                    }
                });
            });
        });
    </script>
@endpush
