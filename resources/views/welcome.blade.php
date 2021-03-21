@extends('layouts.app')

@section('content')
     <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper-container position-relative">

    <div class="swiper-wrapper">
        @foreach ($covers as $cover)
        <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ asset('uploads/apartments/'.head(json_decode($cover->house_image))) }})">
          <div class="overlay overlay-a"></div>
          <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="intro-body">
                      <p class="intro-title-top">{{ $cover->thana }}, {{ $cover->district }}
                        <br> {{ $cover->zip_code }}
                      </p>
                      <h1 class="intro-title mb-4 ">
                        <span class="color-b">{{ $cover->house_number }} </span> {{ $cover->name }}
                        <br> {{ $cover->road }}
                      </h1>
                      <p class="intro-subtitle intro-price">
                        <a href="/apartment/{{ $cover->id }}"><span class="price-a">rent | {{ $cover->rent }}TK</span></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="swiper-pagination"></div>

  </div><!-- End Intro Section -->

  <main id="main">
    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Our Services</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-cart"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Lifestyle</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                  convallis a pellentesque
                  nec, egestas non nisi.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-calendar4-week"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Loans</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Mauris blandit
                  aliquet elit, eget tincidunt
                  nibh pulvinar a.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-card-checklist"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Sell</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                  convallis a pellentesque
                  nec, egestas non nisi.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Latest Apartments</h2>
              </div>
              <div class="title-link">
                <a href="/apartments">All Apartments
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>


        <div id="property-carousel" class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($latests as $latest)
              <div class="carousel-item-b swiper-slide">
                <div class="card-box-a card-shadow">
                    <div class="img-box-a">
                        <img src="{{ asset('uploads/apartments/'. head(json_decode($latest->house_image))) }}" class="img-a img-fluid">
                    </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="/apartment/{{ $latest->id }}">{{ $latest->house_number }} {{ $latest->name }}
                            <br /> {{ $latest->road }}</a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <div class="price-box d-flex">
                          <span class="price-a">rent | {{ $latest->rent }}TK</span>
                        </div>
                        <a href="/apartment/{{ $latest->id }}" class="link-a">Click here to view
                          <span class="bi bi-chevron-right"></span>
                        </a>
                      </div>
                      <div class="card-footer-a">
                        <ul class="card-info d-flex justify-content-around">
                          <li>
                            <h4 class="card-info-title">Area</h4>
                            <span>{{ $latest->area }}m
                              <sup>2</sup>
                            </span>
                          </li>
                          <li>
                            <h4 class="card-info-title">Beds</h4>
                            <span>{{ $latest->beds }}</span>
                          </li>
                          <li>
                            <h4 class="card-info-title">Baths</h4>
                            <span>{{ $latest->baths }}</span>
                          </li>
                          <li>
                            <h4 class="card-info-title">Garages</h4>
                            <span>{{ $latest->garage }}</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End carousel item -->
              @endforeach
            </div>
          </div>
          <div class="propery-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Latest Properties Section -->

  </main><!-- End #main -->
@endsection
