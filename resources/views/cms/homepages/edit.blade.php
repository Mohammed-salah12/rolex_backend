

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
                  <label for="title">name title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $homepages->title ?? ''}}" placeholder="product name" >
                </div>

                <div class="form-group col-md-6">
                  <label for="discription">discription</label>
                  <input type="text" class="form-control" id="discription" name="discription" placeholder="discription" value="{{ $homepages->discription ?? ''}}">
                </div>

                <div class="form-group col-md-6">
                  <label for="price">price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="price of product" value="{{ $homepages->price ?? ''}}">
                </div>

                <div class="form-group col-md-12">
                  <label for="img">Image of Author</label>
                  <input type="file" class="form-control" id="img" name="img" placeholder="Enter img of product">
                </div>
                 </div>  



              <!-- /.card-body -->

              <div class="card-footer">
              <button type="button" onclick="performUpdate({{$homepages->id  ?? '' }})" class="btn btn-primary">Update</button>
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
    function performUpdate(id){

      let formData = new FormData();
      formData.append('title',document.getElementById('title').value);
      formData.append('discription',document.getElementById('discription').value);
      formData.append('price',document.getElementById('price').value);
      formData.append('img',document.getElementById('img').files[0]);

      storeRoute('/cms/admin/update-homepages/'+id , formData);
    }

  </script>
@endsection


