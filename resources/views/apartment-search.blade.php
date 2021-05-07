@extends('layouts.app')

@section('content')

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">
                    @empty($apartments)
                        <h1>No matching Apartments</h1>
                    @else
                        <h1>Your Serach List</h1>
                    @endempty
                </h1>
                <span class="color-text-a">Search apartments</span>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Search Apartments
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section><!-- End Intro Single-->

      <!-- ======= Property Grid ======= -->
      <section class="property-grid grid">
        <div class="container">
            @foreach ($apartments->chunk(3) as $items)
            <div class="row">
                @foreach ($items as $apartment)
                <div class="col-md-4">
                    <div class="card-box-a card-shadow">
                      <div class="img-box-a">
                        <img src="{{ asset('uploads/apartments/'.head(json_decode($apartment->house_image))) }}" alt="{{ $apartment->name }}" class="img-a img-fluid">
                      </div>
                      <div class="card-overlay">
                        <div class="card-overlay-a-content">
                          <div class="card-header-a">
                            <h2 class="card-title-a">
                              <a href="/apartment/{{ $apartment->id }}">{{ $apartment->house_number }} {{ $apartment->name }}
                                <br /> Road - {{ $apartment->road }}</a>
                            </h2>
                          </div>
                          <div class="card-body-a">
                            <div class="price-box d-flex">
                              <span class="price-a">rent | {{ $apartment->rent }}</span>
                            </div>
                            <a href="/apartment/{{ $apartment->id }}" class="link-a">Click here to view
                              <span class="bi bi-chevron-right"></span>
                            </a>
                          </div>
                          <div class="card-footer-a">
                            <ul class="card-info d-flex justify-content-around">
                              <li>
                                <h4 class="card-info-title">Area</h4>
                                <span>{{ $apartment->area }}m
                                  <sup>2</sup>
                                </span>
                              </li>
                              <li>
                                <h4 class="card-info-title">Beds</h4>
                                <span>{{ $apartment->beds }}</span>
                              </li>
                              <li>
                                <h4 class="card-info-title">Baths</h4>
                                <span>{{ $apartment->baths }}</span>
                              </li>
                              <li>
                                <h4 class="card-info-title">Garages</h4>
                                <span>{{ $apartment->garage }}</span>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
            @endforeach
          <div class="row">
            <div class="col-sm-12">
              <nav class="pagination-a">
                <ul class="pagination justify-content-end">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <span class="bi bi-chevron-left"></span>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item next">
                    <a class="page-link" href="#">
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </section><!-- End Property Grid Single-->

    </main><!-- End #main -->

@endsection
