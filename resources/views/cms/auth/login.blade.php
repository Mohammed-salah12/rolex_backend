<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <!-- Admin login form -->
            <form action="{{ route('login.submit', ['guard' => 'author']) }}" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="admin_gmail" name="admin_gmail" placeholder="Admin Gmail">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Admin Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="button" onclick="login('admin')" class="btn btn-primary btn-block">Sign In as Admin</button>
                    </div>
                </div>
            </form>

            <!-- Author login form -->
            <form>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="author_gmail" name="author_gmail" placeholder="Author Gmail">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="author_password" name="author_password" placeholder="Author Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="button" onclick="login('author')" class="btn btn-primary btn-block">Sign In as Author</button>
                    </div>
                </div>
            </form>

            <p class="mb-0">
                <a href="#" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

{{--function login() {--}}
{{--    var guard = '{{request('guard')}}';--}}
{{--    axios.post('/cms/'+guard+'/login', {--}}
{{--      gmail: document.getElementById('gmail').value,--}}
{{--      password: document.getElementById('password').value,--}}
{{--      guard: guard--}}
{{--    })--}}
{{--        .then(function (response) {--}}
{{--        window.location.href = '/cms/admin/'--}}
{{--    })--}}
{{--        .catch(function (error) {--}}
{{--            if (error.response.data.errors !== undefined) {--}}
{{--              showErrorMessages(error.response.data.errors);--}}

{{--            } else {--}}
{{--                showMessage(error.response.data);--}}
{{--            }--}}
{{--        });--}}
{{--  }--}}
<script>
    function login(guard) {
        var gmail = '';
        var password = '';

        if (guard === 'admin') {
            gmail = document.getElementById('admin_gmail').value;
            password = document.getElementById('admin_password').value;
        } else if (guard === 'author') {
            gmail = document.getElementById('author_gmail').value;
            password = document.getElementById('author_password').value;
        }

        axios.post('/cms/'+guard+'/login', {
            gmail: gmail,
            password: password,
            guard: guard
        })
            .then(function (response) {
                if (guard === 'admin') {
                    window.location.href = '/cms/admin/';
                } else if (guard === 'author') {
                    window.location.href = '/cms/admin/';
                }
            })
            .catch(function (error) {
                if (error.response.data.errors !== undefined) {
                    showErrorMessages(error.response.data.errors);
                } else {
                    showMessage(error.response.data);
                }
            });
    }
</script>


<script src="{{asset('cms/jss/crud.js')}}"></script>

</body>
</html>
