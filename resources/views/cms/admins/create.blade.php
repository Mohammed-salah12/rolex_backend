
@extends('cms.parent')


@section('title' , 'Admin')

@section('main-title' , 'Create Admin')

@section('sub-title' , 'create Admin')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Data of Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">

                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Roles</label>
                              <select class="form-control select2" id="role_id" name="role_id" style="width: 100%;">
                                  {{-- <option selected="selected">Alabama</option> --}}
                                  @foreach($roles as $role)
                                      <option value="{{ $role->id }}">{{ $role->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>


                 <div class="row">

                <div class="form-group col-md-6">
                  <label for="gmail">Email of Admin</label>
                  <input type="gmail" class="form-control" id="gmail" name="gmail" placeholder="Enter Email of Admin">
                </div>

                <div class="form-group col-md-6">
                  <label for="password"> password of Admin</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password of Admin">
                </div>
              </div>



              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('admins.index') }}" type="button" class="btn btn-info">Return Back</a>

              </div>
            </form>
          </div>
          <!-- /.card -->


        </div>
        <!--/.col (left) -->


        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

@endsection


@section('scripts')
  <script>
    function performStore(){

      let formData = new FormData();
      formData.append('gmail',document.getElementById('gmail').value);
      formData.append('password',document.getElementById('password').value);
        formData.append('role_id',document.getElementById('role_id').value);


      store('/cms/admin/admins' , formData);
    }

  </script>
@endsection
