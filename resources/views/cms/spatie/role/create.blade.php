
@extends('cms.parent')


@section('title' , 'role')

@section('main-title' , 'Create role')

@section('sub-title' , 'create role')

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
              <h3 class="card-title">Create Data of role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
              @csrf

              <form>

              <div class="card-body">


                 <div class="row">

                <div class="form-group col-md-6">
                  <label for="name">name of role</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name of role">
                </div>


              <div class="form-group col-md-6">
                  <label for="guard_name">guard</label>
                  <select class="form-select form-select-sm form-control" name="guard_name" id="guard_name" aria-label=".form-select-sm example">
                      <option value="admin">
                          admin
                      </option>
                      <option value="author">
                          author
                      </option>
                  </select>

              </div>



              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('roles.index') }}" type="button" class="btn btn-info">Return Back</a>

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
      formData.append('name',document.getElementById('name').value);
      formData.append('guard_name',document.getElementById('guard_name').value);


      store('/cms/admin/roles' , formData);
    }

  </script>
@endsection
