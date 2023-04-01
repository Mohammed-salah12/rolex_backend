 @extends('cms.parent')

@section('title' , 'Admin')

@section('main-title' , 'Create product')

@section('sub-title' , 'create product')

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
              <h3 class="card-title">Create new product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">
              <div class="row">

                <div class="form-group col-md-6">
                  <label for="title">title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                </div>

                <div class="form-group col-md-6">
                  <label for="discription">discription</label>
                  <input type="text" class="form-control" id="discription" name="discription" placeholder="Enter discription">
                </div>
              </div>

              <div class="form-group col-md-6">
                <label for="price">price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
              </div>
            </div>

              <div class="form-group col-md-12">
                <label for="img">Image of Author</label>
                <input type="file" class="form-control" id="img" name="img" placeholder="Enter img of product">
              </div>
               </div>


              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('homepages.index') }}" type="button" class="btn btn-info">Return Back</a>

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
      formData.append('title',document.getElementById('title').value);
      formData.append('discription',document.getElementById('discription').value);
      formData.append('price',document.getElementById('price').value);
      formData.append('img',document.getElementById('img').files[0]);
      store('/cms/admin/homepages' , formData);
    }

  </script>
@endsection
