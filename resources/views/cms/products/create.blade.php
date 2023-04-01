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
                  <label for="product_name">name_product</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name">
                </div>

                <div class="form-group col-md-6">
                  <label for="price_product">price_product</label>
                  <input type="text" class="form-control" id="price_product" name="price_product" placeholder="Enter price of product">
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
      formData.append('product_name',document.getElementById('product_name').value);
      formData.append('price_product',document.getElementById('price_product').value);
      formData.append('img',document.getElementById('img').files[0]);
      store('/cms/admin/products' , formData);
    }

  </script>
@endsection
