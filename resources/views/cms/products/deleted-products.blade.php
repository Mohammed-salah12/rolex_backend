@extends('cms.parent')

@section('title', 'Deleted Authors')

@section('main-title', 'Deleted Authors')

@section('sub-title', 'Deleted Authors')

@section('styles')

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Deleted Authors</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>img</th>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>status</th> <!-- New column for status/badge -->
                                    <th>featured</th> <!-- New column for status/badge -->
                                    <th>actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($deletedProducts as $product)
                                    <tr>
                                        <td>
                                            <img class="img-circle img-bordered-sm" src="{{asset('storage/images/products/'.$product->img)}}" width="60" height="60" alt="User Image">
                                        </td>
                                        <td>{{$product->id}}</td>

                                        <td>{{$product->name}}</td>
                                        <td>{{ $product->price }}</td>

                                        <td>
                                            @if ($product->is_new==1)
                                                <span class="badge badge-success">New</span>
                                            @else
                                                <span class="badge badge-secondary">Old</span>
                                            @endif
                                        </td>
                                        <td>

                                            @if ($product->is_featured == 1)
                                                <span class="badge badge-primary">Featured</span>

                                            @else
                                                <span class="badge badge-secondary">normal</span>

                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('products.restore', $product->id) }}" method="POST"
                                                      style="display: inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success">Restore</button>
                                                </form>
                                                <form action="{{ route('products.forceDelete', $product->id) }}"
                                                      method="POST" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Force Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <script>
        function confirmRestore(url, reference) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will restore the admin.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, restore it!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.patch(url)
                        .then(() => {
                            Swal.fire(
                                'Restored!',
                                'Admin has been restored.',
                                'success'
                            );
                            $(reference).closest('tr').fadeOut(300, function () {
                                $(this).remove();
                            });
                        })
                        .catch(() => {
                            Swal.fire(
                                'Error!',
                                'An error occurred.',
                                'error'
                            );
                        });
                }
            });
        }

        function confirmForceDelete(url, reference) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will permanently delete the admin.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(url)
                        .then(() => {
                            Swal.fire(
                                'Deleted!',
                                'Admin has been permanently deleted.',
                                'success'
                            );
                            $(reference).closest('tr').fadeOut(300, function () {
                                $(this).remove();
                            });
                        })
                        .catch(() => {
                            Swal.fire(
                                'Error!',
                                'An error occurred.',
                                'error'
                            );
                        });
                }
            });
        }
    </script>
@endsection
