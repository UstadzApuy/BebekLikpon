@extends('frontend.layout')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('frontend/images/bg_3.jpg')}}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span>
                    <span>Cart <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-3 bread">Daftar Keranjang</h1>
            </div>
        </div>
    </div>
</section>

<div class="container my-5">
    <h2 class="text-center">Shopping Cart</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (empty($cart))
        <p class="text-center">Your cart is empty.</p>
    @else
        <table class="table table-bordered">
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
                        <td ><img src="{{ Storage::url($item['thumbnail']) }}" alt="{{ $item['name'] }}" width="50"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" style="width: 60px;">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                        <td>Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="text-right">Total: Rp{{ number_format($total, 0, ',', '.') }}</h4>

        <a href="{{ route('cart.checkout') }}" class="btn btn-success float-right">Checkout</a>
    @endif
</div>
@endsection
