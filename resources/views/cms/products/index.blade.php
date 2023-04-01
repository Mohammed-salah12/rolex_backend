@extends('cms.parent')

@section('title' , ' Admin')

@section('main-title' , 'Index product')

@section('sub-title' , 'index product')

@section('styles')

@endsection

@section('content')
{{-- <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title"> Index Data of Admin</h3> --}}
                <a href="{{ route('products.create') }}" type="button" class="btn btn-info">Add New Product</a>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>img</th>
                      <th>name</th>
                      <th>price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product )
                    {{-- <td><span class="tag tag-success">Approved</span></td> --}}
                    <tr>
                        <td>
                            <img class="img-circle img-bordered-sm" src="{{asset('storage/images/products/'.$product->img)}}" width="60" height="60" alt="User Image">
                         </td>
                        <td>{{$product->product_name}}</td>
                        <td>{{ $product->price_product }}</td>



                        <td>
                            <div class="btn group">
                              <a href="{{route('products.edit' , $product->id)}}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                                {{-- <i class="far fa-edit"></i> --}}
                              </a>
                              <a href="#" type="button" onclick="performDestroy({{ $product->id }} , this)" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                              </a>

                            </div>
                          </td>

                        <td></td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{ $products->links()}}
          </div>
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@section('scripts')
  <script>
    function performDestroy(id , referance){
      let url = '/cms/admin/products/'+id;
      confirmDestroy(url , referance );
    }
</script>
@endsection
