
@extends('cms.parent')


@section('title' , 'Author')

@section('main-title' , 'Create Author')

@section('sub-title' , 'create Author')

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
              <h3 class="card-title">Create Data of Author</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">


                 <div class="row">

                <div class="form-group col-md-6">
                  <label for="gmail">Email of Author</label>
                    <input type="email" class="form-control" id="gmail" name="email" placeholder="Enter Email of Author">
                </div>

                <div class="form-group col-md-6">
                  <label for="password"> password of Author</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password of Author">
                </div>
              </div>



              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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
    function performStore(){

      let formData = new FormData();
      formData.append('gmail',document.getElementById('gmail').value);
      formData.append('password',document.getElementById('password').value);


      store('/cms/admin/authors' , formData);
    }

  </script>
@endsection
