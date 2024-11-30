<x-filament::page>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
      <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    
        <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
        
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
        
        <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
        
        <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">
        
        <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">    
    </head>
    
    <body>
    
                <div class="row">
                    @forelse ($menus as $menu)
                        <div class="col-md-4 mb-4">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end"
                                     style="background-image: url('{{ Storage::url($menu->thumbnail) }}'); height: 200px; background-size: cover;">
                                </div>
                                <div class="text p-3">
                                    <h2 class="mb-2">
                                        <a href="{{ route('menu.show', $menu->slug) }}">{{ $menu->title }}</a>
                                    </h2>
                                    <p class="price">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                                    <div class="d-flex justify-content-between">
                                        <form action="{{ route('cart.add', $menu->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="number" name="quantity" value="1" min="1" class="form-control mb-2">
                                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                                        </form>
                                        <a href="{{ route('menu.show', $menu->slug) }}" class="btn btn-secondary">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No menus available at the moment. Please check back later!</p>
                        </div>
                    @endforelse
                </div>

                @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
          @if(session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
    </body>
    
        <script src="{{ asset('frontend/js/jquery.min.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
        <script src="{{ asset('frontend/js/popper.min.js')}}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery.easing.1.3.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery.stellar.min.js')}}"></script>
        <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('frontend/js/aos.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
        <script src="{{ asset('frontend/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery.timepicker.min.js')}}"></script>
        <script src="{{ asset('frontend/js/scrollax.min.js')}}"></script>
        <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="{{ asset('frontend/js/google-map.js')}}"></script>
        <script src="{{ asset('frontend/js/main.js')}}"></script>
        
    </body>
    
    </html>
</x-filament::page>
