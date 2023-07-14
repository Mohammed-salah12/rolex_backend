

@extends('cms.parent')

@section('title' , 'outhers')

@section('main-title' , 'Create outhers')

@section('sub-title' , 'create outhers')

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
              <h3 class="card-title">edit product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">
              <div class="row">

                <div class="form-group col-md-6">
                  <label for="name">name product</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $products->name ?? ''}}" placeholder="product name" >
                </div>

                <div class="form-group col-md-6">
                  <label for="price">price of product</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="price of product" value="{{ $products->price ?? ''}}">
                </div>
                <div class="form-group col-md-12">
                  <label for="img">Image of Author</label>
                  <input type="file" class="form-control" id="img" name="img" placeholder="Enter img of product">
                </div>
                 </div>
                  <div class="form-group col-md-6">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="is_featured"
                                 name="is_featured" {{ $products->is_featured == 1 ? 'checked' : '' }}>
                          <label class="form-check-label" for="is_featured">Featured</label>
                      </div>
                  </div>

                  @csrf
                  @method('PUT')

              <!-- /.card-body -->

              <div class="card-footer">
              <button type="submit" onclick="performUpdate({{$products->id  ?? '' }})" class="btn btn-primary">Update</button>
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
    function performUpdate(id){

      let formData = new FormData();
      formData.append('name',document.getElementById('name').value);
      formData.append('price',document.getElementById('price').value);
        formData.append('img',document.getElementById('img').files[0]);
        formData.append('is_featured', document.getElementById('is_featured').checked ? 1 : 0);

      storeRoute('/cms/admin/update-products/'+id , formData);
    }

  </script>
@endsection


