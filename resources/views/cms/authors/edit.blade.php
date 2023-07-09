@extends('cms.parent')

@section('title' , 'Admin')

@section('main-title' , 'Edit Admin')

@section('sub-title' , 'Edit Admin')

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
              <h3 class="card-title">Edit Data of Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">
              <div class="row">



                 <div class="row">

                <div class="form-group col-md-6">
                  <label for="email">Email of Admin</label>
                  <input type="email" class="form-control" id="gmail" name="email"
                  value="{{$authors->gmail ?? ""}}" placeholder="Enter Email of Admin">
                </div>

                <div class="form-group col-md-6">
                  <label for="password"> password of Admin</label>
                  <input type="password" class="form-control" disabled id="password" name="password" placeholder="Enter password of Admin">
                </div>
              </div>








              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{$authors->id}})" class="btn btn-primary">update</button>
                <a href="{{ route('authors.index') }}" type="button" class="btn btn-info">Return Back</a>

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
    function performUpdate(id){

      let formData = new FormData();
      formData.append('gmail',document.getElementById('gmail').value);
      storeRoute('/cms/admin/update-authors/'+id , formData);
    }

  </script>
@endsection
