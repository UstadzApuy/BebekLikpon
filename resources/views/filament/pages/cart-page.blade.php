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
        
            <h2 class="text-2xl font-bold">Shopping Cart</h2>
            @if (empty($cart))
                <p>Your cart is empty.</p>
            @else
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach ($cart as $id => $item)
                            @php $total += $item['price'] * $item['quantity']; @endphp
                            <tr>
                                <td><img src="{{ Storage::url($item['thumbnail']) }}" alt="{{ $item['name'] }}" class="w-16 h-16"></td>
                                <td>{{ $item['name'] }}</td>
                                <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $item['id']) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" style="width: 60px;">
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                    </form>
                                    
                                </td>
                                <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4 class="text-right">Total: Rp{{ number_format($total, 0, ',', '.') }}</h4>

                <a href="{{ route('cart.checkout') }}" class="btn btn-success float-right">Checkout</a>
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
    