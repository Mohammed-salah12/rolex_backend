 @extends('cms.parent')

@section('title' , 'opinions')

@section('main-title' , 'Create opinions')

@section('sub-title' , 'create opinions')

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
              <h3 class="card-title">Create new opinions</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">
              <div class="row">

                <div class="form-group col-md-6">
                  <label for="massage">massage</label>
                  <input type="text" class="form-control" id="massage" name="massage" placeholder="Enter massage">
                </div>


                  <div class="form-group col-md-6">
                      <label for="name">name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                  </div>

                <div class="form-group col-md-6">
                  <label for="job_name">job_name</label>
                  <input type="text" class="form-control" id="job_name" name="job_name" placeholder="Enter job_name">
                </div>
              </div>

              <div class="form-group col-md-12">
                <label for="img">Image of person</label>
                <input type="file" class="form-control" id="img" name="img" placeholder="Enter img of product">
              </div>
               </div>



              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('opinions.index') }}" type="button" class="btn btn-info">Return Back</a>

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
      formData.append('massage',document.getElementById('massage').value);
      formData.append('name',document.getElementById('name').value);
      formData.append('job_name',document.getElementById('job_name').value);
      formData.append('img',document.getElementById('img').files[0]);

        store('/cms/admin/opinions' , formData);
    }

  </script>
@endsection
