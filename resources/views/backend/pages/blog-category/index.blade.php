@extends('backend.layouts.backend-master')
@section('title', 'all blog category')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Blog-Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">list</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <!-- Button trigger modal -->
                    <div>
                        <button type="button" class="btn btn-inverse-success" data-bs-toggle="modal"
                            data-bs-target="#addcategorymodal">
                            Add Category
                        </button>
                    </div>

                    <!--Add New Category Modal -->
                    <div class="modal fade" id="addcategorymodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.blog-category.store') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <!--from group-->
                                        <div class="mb-3">
                                            <label for="category_name" class="form-label text-capitalize">Blog Category
                                                Name</label>
                                            <input type="text" name="category_name" id="category_name"
                                                class="form-control {{ $errors->has('category_name') ? 'is-invalid' : '' }}"
                                                value="{{ old('category_name') }}" />
                                            @error('category_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="my-3">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class=" btn btn-primary">Save Now</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="card-body">
                        <h5 class="card-title text-capitalize ">List of Blog category</h5>
                        <hr>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Si</th>
                                        <th>Blog-category Name</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allblogcategory as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                            <td>
                                                {{-- <a href="{{ route('admin.blog-category.edit', $item->id) }}"
                                                    class="btn btn-inverse-warning mb-1 mb-md-0">Edit</a> --}}

                                                <button type="button" class="btn btn-inverse-warning"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editcategorymodal-{{ $item->id }}">
                                                    Edit
                                                </button>

                                                <form action="{{ route('admin.blog-category.destroy', $item->id) }}"
                                                    method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" id="delete_btn"
                                                        class="btn btn-inverse-danger mb-1 mb-md-0 delete_btn">Delete</button>
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

        @foreach ($allblogcategory as $item)
            <!--Edit Category Modal -->
            <div class="modal fade" id="editcategorymodal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.blog-category.update',$item->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <!--from group-->
                                <div class="mb-3">
                                    <label for="category_name" class="form-label text-capitalize">Blog Category
                                        Name</label>
                                    <input type="text" name="category_name" id="category_name"
                                        class="form-control {{ $errors->has('category_name') ? 'is-invalid' : '' }}"
                                        value="{{ $item->category_name }}" />
                                    @error('category_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="my-3">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class=" btn btn-primary">Save Now</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

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
