


@extends('rolex.parent')

@section('title' , 'Rolex|main')

@section('styles')


@endsection






@section('someAdditional')


            <div class="hero container mx-auto" id="scrollspyHeading1">
                <div class="container justify-content-start align-items-center row">
                    <div class="col-12 col-lg-7 position-relative p-5">
                        <div class="scoial-links">
                            <a href="">Facebook</a>
                            <a href="">Twttier</a>
                            <a href="">Instgram</a>
                        </div>

                        <div class="content ps-5 ms-3 pt-5 mt-4">
                            <h1 class="fw-bold display-6">
                                {{$homepages->title}} <br />
                            </h1>
                            <p class="pt-4 pe-lg-5 pe-1">
                                {{$homepages->discription}}
                            </p>

                            <div class="price pt-3 pb-5">{{$homepages->price}}$</div>
                            <div class="btns d-flex align-items-center">
                                <button class="one btn rounded-0 py-2 px-3">Discover</button>
                                <button class="btntwo btn btn-dark btn-lg rounded-0 py-3 px-4">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="HeroImg col-lg-5 col-12 ms-3 m-lg-0">
                        <div class="box"><img class="img-circle img-bordered-sm" src="{{asset('storage/images/homepages/'.$homepages->img)}}" width="60" height="60" alt="User Image">
                        </div>
                    </div>
                </div>
            </div>
    </main>

        @endsection



@section('content')


    <section class="feature py-4" id="scrollspyHeading2">
      <div class="container py-5 px-lg-5">
        <h2>FEATURED</h2>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row pt-5 row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4">
                  @foreach ($featuredProducts as $featuredProduct )

                  <div class="col">
                  <div class="card">
                    <span class="catg">sale</span>
                    <div class="imgboxs">
                        <img class="img-circle img-bordered-sm" src="{{asset('storage/images/products/'.$featuredProduct->img)}}" width="60" height="60" alt="User Image">
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title">{{$featuredProduct->name}}</h5>
                      <h6 class="card-subtitle my-3">{{$featuredProduct->price}}</h6>
                      <button type="button" class="btn btn-dark text-uppercase rounded-0 py-2 px-4">
                        add to cart
                      </button>
                    </div>
                  </div>
                </div>
                  @endforeach
          <button class="btnone carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <i class="fa-solid fa-arrow-left-long"></i>
          </button>
          <button class="btntwo carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <i class="fa-solid fa-arrow-right-long"></i>
          </button>
        </div>
      </div>
    </section>

    <section class="story">
      <div class="container">
        <div class="row row-cols-1 row-cols-md-2">
          <div class="left col">
            <div class="imgbox">
              <img src="{{asset('rolex/assets/img/story.png')}}" alt="" />
            </div>
          </div>
          <div class="right col">
            <h3>OUR STORY</h3>
            <h4 class="display-6 fw-bold mb-4">
              Inspirational Watch of this year
            </h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio
              aliquid tempora, non quae deserunt vel minus ipsum enim fugiat
              praesentium?
            </p>
            <a href="" class="dis">DISCOVER </a>
          </div>
        </div>
      </div>
    </section>

    <section class="product py-3" id="scrollspyHeading3">
      <div class="container py-5 px-lg-5">
        <h2>PRODUCTS</h2>

        <div class="row pt-5 row-cols-1 row-cols-md-2 row-cols-lg-3 gx-5  px-5">
            @foreach ($products as $product )

            <div class="col">
            <div class="card">
              <div class="imgboxs">
                  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/products/'.$product->img)}}" width="60" height="60" alt="User Image">
              </div>
              <div class="card-body text-center ">
                <h5 class="card-title">{{$product->name}}</h5>
                <h6 class="card-subtitle my-3">{{$product->price}}$</h6>
                <i class="fa-regular fa-lock"></i>

              </div>
            </div>
          </div>
            @endforeach



        </div>

      </div>
    </section>

    <section class="comment">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2">
                <div id="comment" class="carousel slide left mb-5">
                    <div class="carousel-inner">
                        @foreach ($latestOpinions as $key => $latestOpinion)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <div class="card p-4 col">
                                    <i class="fa-solid fa-quote-left py-4"></i>
                                    <p>{{$latestOpinion->massage}}</p>
                                    <h6>{{$latestOpinion->created_at}}</h6>
                                    <div class="imgbox d-flex align-items-center">
                                        <div class="img">
                                            <img class="img-circle img-bordered-sm" src="{{asset('storage/images/opinions/'.$latestOpinion->img)}}" width="60" height="60" alt="User Image">
                                        </div>
                                        <div class="text">
                                            <h5>{{$latestOpinion->name}}</h5>
                                            <small>{{$latestOpinion->job_name}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev btnone" type="button" data-bs-target="#comment" data-bs-slide="prev">
                        <i class="fa-solid fa-arrow-left-long"></i>
                    </button>
                    <button class="carousel-control-next btntwo" type="button" data-bs-target="#comment" data-bs-slide="next">
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </button>
                </div>
                <div class="right col">
                    <div class="imgbox">
                        <img src="{{asset('rolex/./assets/img/testimonial.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="product py-3" id="scrollspyHeading3">
        <div class="container py-5 px-lg-5">
            <h2>new arrive</h2>

            <div class="row pt-5 row-cols-1 row-cols-md-2 row-cols-lg-3 gx-5  px-5">
                @foreach ($newProducts as $newProduct )

                    <div class="col">
                        <div class="card">
                            <span class="catg">sale</span>
                            <div class="imgboxs">
                                <img class="img-circle img-bordered-sm" src="{{asset('storage/images/products/'.$product->img)}}" width="60" height="60" alt="User Image">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{$newProduct->name}}</h5>
                                <h6 class="card-subtitle my-3">{{$newProduct->price}}</h6>
                                <button type="button" class="btn btn-dark text-uppercase rounded-0 py-2 px-4">
                                    add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    </div>

  <section class="footup">
    <div class="container">
      <div class="row pt-5 row-cols-1 row-cols-md-2  g-md-5 g-3">
        <div class="left col">
          <h3>Subscribe Our Newsletter</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Pariatur ullam laborum voluptatum cum facere animi reiciendis
            omnis nesciunt fugiat tempora.</p>
        </div>
        <div class="right col">
          <div class="subscribe d-flex align-items-center">
            <div class="lab">
              <form method="get">
                <label>
                  <input type="email" placeholder="Enter your email" required>
                </label>
            </div>
            <div class="link">
              <button type="submit">SUBSCRIBE</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')


@endsection
