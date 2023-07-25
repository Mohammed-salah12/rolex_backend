
@extends('cms.parent')

@section('title' , ' Admin')

@section('main-title' , 'Index Admin')

@section('sub-title' , 'index Admin')

@section('styles')

@endsection

@section('content')
{{-- <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title"> Index Data of Admin</h3> --}}
                <a href="{{ route('admins.create') }}" type="button" class="btn btn-info">Add New Admin</a>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($admins as $admin)
                      <tr>
                          <td>{{$admin->id}}</td>
                          <td>{{$admin->gmail}}</td>
                          <td>
                              @foreach ($admin->roles as $role)
                                  {{ $role->name }}
                                  @if (!$loop->last)
                                  @endif
                              @endforeach
                          </td>
                          <td>
                              <div class="btn-group">
                                  <a href="{{ route('admins.edit', $admin->id) }}" type="button" class="btn btn-info">
                                      <i class="fas fa-edit"></i>
                                  </a>

                                  @if ($admin->trashed())
                                      <form action="{{ route('admins.restore', $admin->id) }}" method="POST" style="display: inline">
                                          @csrf
                                          @method('PATCH')
                                          <button type="submit" class="btn btn-success">Restore</button>
                                      </form>
                                  @else
                                      <a href="#" onclick="performDestroy({{ $admin->id }}, this)" class="btn btn-danger">
                                          <i class="fas fa-trash-alt"></i>
                                      </a>
                                  @endif
                              </div>
                          </td>
                      </tr>
                  @endforeach
                  @endsection

                  <!-- Add the following script at the end of your view -->

                  @section('scripts')
                      <script>
                          function performDestroy(id, reference) {
                              let url = '/cms/admin/admins/' + id;
                              confirmDestroy(url, reference);
                          }

                          function performRestore(id, reference) {
                              let url = '/cms/admin/admins/' + id + '/restore';
                              confirmRestore(url, reference);
                          }

                          function confirmDestroy(url, reference) {
                              Swal.fire({
                                  title: 'Are you sure?',
                                  text: 'This action cannot be undone.',
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
                                                  'Admin has been deleted.',
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
                      </script>
@endsection
