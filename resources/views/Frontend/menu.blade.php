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
                    <span>Menu <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-3 bread">Our Delicious Menu</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
			@forelse ($menus as $menu)
			<div class="col-md-4">
				<div class="car-wrap rounded ftco-animate">
					<div class="img rounded d-flex align-items-end"
						 style="background-image: url({{ Storage::url($menu->thumbnail) }});">
					</div>
					<div class="text">
						<h2 class="mb-0">
							<a href="{{ route('menu.show', $menu->slug) }}">{{ $menu->title }}</a>
						</h2>
						<div class="d-flex mb-3">
							<p class="price ml-auto">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
						</div>
						<p class="d-flex mb-0 d-block">
							{{-- <form action="{{ route('cart.add', $menu->id) }}" method="POST">
								@csrf
								<div class="input-group mb-3">
									<input type="number" name="quantity" value="1" min="1" class="form-control">
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit">Add to Cart</button>
									</div>
								</div>
							</form> --}}
							<a href="{{ route('menu.show', $menu->slug) }}" class="btn btn-secondary py-2 ml-1">Details</a>
						</p>
						
					</div>
					
				</div>
			</div>
		@empty
			<div class="col-12">
				<p>No menus available at the moment. Please check back later!</p>
			</div>
		@endforelse
		
        </div>
    </div>
</section>
@endsection
