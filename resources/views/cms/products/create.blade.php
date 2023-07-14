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
                  <label for="name">name_product</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name">
                </div>

                <div class="form-group col-md-6">
                  <label for="price">price_product</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Enter price of product">
                </div>
              </div>

              <div class="form-group col-md-12">
                <label for="img">Image of Author</label>
                <input type="file" class="form-control" id="img" name="img" placeholder="Enter img of product">
              </div>
               </div>
                <div class="form-group col-md-6 w-25 mb-1">
                    <label for="is_featured">Featured</label>
                    <input type="checkbox" class="form-control w-25 mb-1" id="is_featured" name="is_featured">
                </div>


              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('products.index') }}" type="button" class="btn btn-info">Return Back</a>

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
      formData.append('price',document.getElementById('price').value);
      formData.append('img',document.getElementById('img').files[0]);
      formData.append('is_featured', document.getElementById('is_featured').checked ? 1 : 0);

        store('/cms/admin/products' , formData);
    }

  </script>
@endsection
