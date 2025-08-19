@extends('backend.layouts.backend-master')
@section('title', 'all agent list')
@section('content')
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript::void();">Agent</a></li>
            <li class="breadcrumb-item active" aria-current="page">list</li>
        </ol>
    </nav>
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card mt-4">
                    <div class=" text-end">
                        <a href="{{ route('admin.add.account') }}" class=" btn btn-info">Create Account</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-capitalize ">List of agent </h5>
                        <hr>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-wrap">
                                <thead>
                                    <tr>
                                        <th>Si</th>
                                        <th>Agent Name</th>
                                        <th>Image</th>
                                        <th>E-mail</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Joing Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allagents as $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <img src="{{ isset($user->photo) ? asset($user->photo) : Avatar::create($user->name)->toBase64() }}"
                                                    class=" img-fluid img-thumbnail" style="height: 60px;width:60px;"
                                                    alt="">
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->phone }}</td>

                                            <td>
                                                <input data-id="{{ $user->id }}" class="status_agent_toggle_class"
                                                    type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                    data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                    {{ $user->status === 'active' ? 'checked' : '' }}>
                                            </td>
                                            <td>{{ $user->created_at->format('d-M-Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit.agent.account', $user->id) }}"
                                                    class="btn btn-inverse-warning mb-1 mb-md-0"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <form action="{{ route('admin.delete.agent.account', $user->id) }}"
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
            // featured agent
            $('.status_agent_toggle_class').change(function() {
                var status = $(this).prop('checked') ? 'active' : 'deactive';
                var id = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: route('admin.status.agent.account'),
                    data: {
                        _token: "{{ csrf_token() }}",

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
