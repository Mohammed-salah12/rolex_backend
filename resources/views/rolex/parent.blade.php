<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ROLEX</title>
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css" />

  <link rel="stylesheet" href="{{asset('rolex/assets/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('rolex/assets/css/main.css')}}" />

    <title>Rolex| @yield('title')</title>
</head>

@yield('styles')


<body>
<div class="offcanvas offcanvas-end w-50 w-sm-25" tabindex="-1" id="offcanvasRight"
     aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">ROLEX</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="navbar-nav me-auto mb-2 mb-lg-0 ps-5" id="navbarSupportedContent">
            <a class="nav-link active pb-3" aria-current="page" href="#">Home</a>
            <a class="nav-link pb-3" href="#">Feature</a>
            <a class="nav-link pb-3" href="#">Product</a>
            <a class="nav-link" href="#">New </a>
        </div>
    </div>
</div>

<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example "
     tabindex="0">

    <main class="min-vh-100">

        <nav class="navbar navbar-expand-lg py-3 fixed-top" id="navbar-example2">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fa-regular fa-watch pe-2"></i><span class="fw-bold">ROLEX</span>
                </a>

                <div class="collapse navbar-collapse nav ps-5 ms-3" id="navbarSupportedContent">
                    <a class="nav-link active" aria-current="page" href="#scrollspyHeading1">Home</a>
                    <a class="nav-link" href="#scrollspyHeading2">Feature</a>
                    <a class="nav-link" href="#scrollspyHeading3">Product</a>
                    <a class="nav-link" href="#scrollspyHeading4">New </a>
                </div>

                <div class="icon fs-4 pe-5 me-4 ms-auto">
                    <span class="darkmood"> <i class="fa-regular fa-moon pe-3 ms-auto"></i></span>
                    <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight"><i
                            class="fa-regular fa-lock"> <span class="num"></span> </i></span>
                </div>

                <button class="navbar-toggler order-last" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fa-solid fa-bars text-dark"></i>
                </button>
            </div>
        </nav>

         @yield('someAdditional')


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight2" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Purchased products</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body offCanvABody">


        </div>
    </div>
        @yield('content')

  <footer>
    <div class="container mt-4 mb-4">
      <div class="row pt-5 row-cols-1 row-cols-md-2 row-cols-lg-4 g-md-5 g-3">

        <div class="col">
          <h4>Our information</h4>
          <div>
            <a href="">1234-Preu</a>
            <a href="">La Libertad 43210</a>
            <a href="">123-456-789</a>
          </div>
        </div>
        <div class="col">
          <h4>About Us</h4>
          <div>
            <a href="">Support Center</a>
            <a href="">Customer Support</a>
            <a href="">About Us</a>
            <a href="">Copy Right</a>
          </div>
        </div>

        <div class="col">
          <h4>Product</h4>
          <div>
            <a href="">Road bikes</a>
            <a href="">Mountain bikes</a>
            <a href="">Electric</a>
            <a href="">Accesories</a>
          </div>
        </div>

        <div class="col">
          <h4>Social</h4>
          <div class="icon">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-instagram"></i>
          </div>
        </div>

      </div>
    </div>
    <div class="text-center pb-4">© BedimeCode. All rights reserved</div>
  </footer>

  <div class="up">
    <i class="fa-solid fa-arrow-up-long"></i>
  </div>




        <script src="{{asset('cms/jss/crud.js')}}"></script>
  <script src="{{asset('rolex/assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('rolex/assets/js/myJs.js')}}"></script>

        @yield('scripts')
</body>

</html>
