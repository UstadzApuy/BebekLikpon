@extends('frontend.layout')

@section('content')

<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('frontend/images/bg_1.jpg')}}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
        <div class="col-lg-8 ftco-animate">
          <div class="text w-100 text-center mb-md-5 pb-md-5">
            <h1 class="mb-4">Murah &amp; Enak Makan Disini</h1>
            <p style="font-size: 18px;">Bebek Goreng LIKPON, sejak 2018, menyajikan bebek goreng dan menu lainnya dengan fokus pada kualitas makanan dengan harga terjangkau dan pelayanan pelanggan yang ramah.
            </p>
            {{-- <a href="https://vimeo.com/45830194"
              class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
              <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-play"></span>
              </div>
              <div class="heading-title ml-5">
                <span>Easy steps for renting a car</span>
              </div>
            </a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-12	featured-top">
          <div class="row justify-content-center no-gutters">
            <div class="col-md-10 d-flex align-items-center">
              <div class="services-wrap rounded-right w-100">
                <h3 class="heading-section text-center mb-4">Mulai Memesan sekarang</h3>
                <div class="row d-flex mb-4">
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-route"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Datangi Lokasi Bebek LIKPON</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-handshake"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Konfirmasi Dengan Kasir Untuk Pendaftaran</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex justify-content-center align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-rent"></span></div>
                      <div class="text w-100 text-center mx-auto m-auto">
                        <h3 class="heading mb-2 text-center">Pemesanan Online Siap Dilakukan</h3>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="text-center mt-5"><a href="#"
                    class="btn text-center mx-auto m-auto ml-auto btn-primary py-3 px-4">Mulai Mendaftar Sekarang</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>


  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">Menu Kami</span>
          <h2 class="mb-2">Menu Unggulan</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="carousel-car owl-carousel">
            @foreach($menus as $menu)
            <div class="item">
              <div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end" style="background-image: url({{Storage::url($menu->thumbnail)}});">
                </div>
                <div class="text">
                  <h2 class="mb-0"><a href="#">{{$menu->title}}</a></h2>
                  <div class="d-flex mb-3">
                    <p class="price ml-auto">Rp. {{$menu->price}} ,-<span>/pcs</span></p>
                  </div>
                  <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Pesan Sekarang</a> <a
                      href="{{route('menu.show',$menu->slug)}}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-about">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
          style="background-image: url({{ asset('frontend/images/about.jpg')}});">
        </div>
        <div class="col-md-6 wrap-about ftco-animate">
          <div class="heading-section heading-section-white pl-md-5">
            <span class="subheading">About us</span>
            <h2 class="mb-4">Selamat datang di Bebek LIKPON</h2>

            <p>Bebek Goreng LIKPON adalah sebuah usaha kecil dan menengah yang bergerak pada sektor kuliner dengan menyediakan bebek goreng dan menu lainnya kepada masyarakat umum. LIKPON telah berdiri sejak tahun 2018 Sebagai bagian dari industri kuliner, LIKPON berperan dalam menyediakan makanan yang lezat dan berkualitas kepada pelanggannya.
            </p>
            <p>Selain itu, LIKPON memberikan perhatian terhadap pelayanan pelanggan yang baik. LIKPON memberikan pengalaman yang ramah kepada pelanggan dan memastikan kepuasan pelanggan selama kunjungan mereka.
            </p>
            <p><a href="#" class="btn btn-primary py-3 px-4">Liat Menu</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Layanan</span>
          <h2 class="mb-3">Layanan - Layanan Kami</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span
                class="flaticon-wedding-car"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Reservasi</h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span
                class="flaticon-transportation"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Pemesanan Online</h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Catering</h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span
                class="flaticon-transportation"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Whole City Tour</h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-md-6 heading-section heading-section-white ftco-animate">
          <h2 class="mb-3">Tunggu apalagi?</h2>
          <a href="#" class="btn btn-primary btn-lg">Ayo Daftar Untuk Memesan</a>
        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section testimony-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Testimonial</span>
          <h2 class="mb-3">Happy Clients</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">Marketing Manager</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_2.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">Interface Designer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_3.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">UI Designer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
@endsection