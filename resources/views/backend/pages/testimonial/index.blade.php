@extends('backend.layouts.backend-master')
@section('title', 'all testimonial list')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Testimonial</a></li>
            <li class="breadcrumb-item active" aria-current="page">list</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize ">List of Testimonial </h5>
                        <hr>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-wrap">
                                <thead>
                                    <tr>
                                        <th>Si</th>
                                        <th>Client Name</th>
                                        <th>Image</th>
                                        <th>Profession</th>
                                        <th style="width: 10%">Message</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alltestimonial as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->client_name }}</td>
                                            <td>
                                                <img src="{{ asset($item->client_image) }}" class=" img-fluid img-thumbnail"
                                                    style="height: 60px;width:60px;" alt="">
                                            </td>
                                            <td>{{ $item->client_profession }}</td>
                                            <td style="width: 10%">{{ $item->client_message }}</td>

                                            <td>
                                                <input data-id="{{ $item->id }}" class="status_testimonial_toggle_class"
                                                    type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                    data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                    {{ $item->status ? 'checked' : '' }}>
                                            </td>
                                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.testimonial.edit', $item->id) }}"
                                                    class="btn btn-inverse-warning mb-1 mb-md-0"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <form action="{{ route('admin.testimonial.destroy', $item->id) }}"
                                                    method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" id="delete_btn"
                                                        class="btn btn-inverse-danger mb-1 mb-md-0 delete_btn"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>


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

    <script>
        $(document).ready(function() {
            // featured testimonial
            $('.status_testimonial_toggle_class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    url: route('admin.testimonial.status'),
                    data: {
                        status: status,
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

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
