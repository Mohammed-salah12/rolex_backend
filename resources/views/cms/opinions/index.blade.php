@extends('cms.parent')

@section('title' , ' opinion')

@section('main-title' , 'Index opinions')

@section('sub-title' , 'index opinions')

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
                <a href="{{ route('opinions.create') }}" type="button" class="btn btn-info">Add New Product</a>

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
                      <th>id</th>
                      <th>name</th>
                        <th>job name</th>
                        <th>massage</th>
                        <th>created_at</th>



                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($opinions as $opinion )
                    {{-- <td><span class="tag tag-success">Approved</span></td> --}}
                    <tr>
                        <td>
                            <img class="img-circle img-bordered-sm" src="{{asset('storage/images/opinion/'.$opinion->img)}}" width="60" height="60" alt="User Image">
                         </td>
                        <td>{{$opinion->id}}</td>
                        <td>{{$opinion->name}}</td>
                        <td>{{$opinion->job_name}}</td>
                        <td>{{$opinion->massage}}</td>
                        <td>{{$opinion->created_at}}</td>





                        <td>
                            <div class="btn group">
                              <a href="{{route('opinions.edit' , $opinion->id)}}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                                {{-- <i class="far fa-edit"></i> --}}
                              </a>
                              <a href="#" type="button" onclick="performDestroy({{ $opinion->id }} , this)" class="btn btn-danger">
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
            {{ $opinions->links()}}
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
      let url = '/cms/admin/opinions/'+id;
      confirmDestroy(url , referance );
    }
</script>
@endsection
