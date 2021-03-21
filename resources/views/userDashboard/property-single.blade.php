@extends('layouts.app')

@section('content')
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                <h1 class="title-single">{{ $user->name }}</h1>
                <span class="color-text-a">{{ $user->district }}, {{ $user->thana }} {{ $user->house_number }}</span>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                    <a href="/dashboard/{{ $user->user_id }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    {{ $user->name }}
                    </li>
                </ol>
                </nav>
            </div>
            </div>
        </div>
        </section><!-- End Intro Single-->

        <!-- ======= Property Single ======= -->
        <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="property-single-carousel" class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($images as $image)
                    <div class="carousel-item-b swiper-slide">
                        <img src="{{ asset('uploads/apartments/'.$image) }}" alt="">
                    </div>
                    @endforeach
                </div>
                </div>
                <div class="property-single-carousel-pagination carousel-pagination"></div>
            </div>
            </div>

            <div class="row">
            <div class="col-sm-12">

                <div class="row justify-content-between">
                <div class="col-md-5 col-lg-4">
                    <div class="property-price d-flex justify-content-center foo">
                    <div class="card-header-c d-flex">
                        <div class="card-box-ico">
                        <span class="bi bi-cash">$</span>
                        </div>
                        <div class="card-title-c align-self-center">
                        <h5 class="title-c">{{ $user->rent }}</h5>
                        </div>
                    </div>
                    </div>
                    <div class="property-summary">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="title-box-d section-t4">
                            <h3 class="title-d">Quick Summary</h3>
                        </div>
                        </div>
                    </div>
                    <div class="summary-list">
                        <ul class="list">
                        <li class="d-flex justify-content-between">
                            <strong>Property ID:</strong>
                            <span>{{ $user->id }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Location:</strong>
                            <span>{{ $user->district }}, {{ $user->thana }} {{ $user->house_number}}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Property Type:</strong>
                            <span>Apartment</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Status:</strong>
                            <span>{{ $user->status}}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Area:</strong>
                            <span>{{ $user->area }}m
                            <sup>2</sup>
                            </span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Beds:</strong>
                            <span>{{ $user->beds }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Baths:</strong>
                            <span>{{ $user->baths }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Garage:</strong>
                            <span>{{ $user->garage }}</span>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 section-md-t3">
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box-d">
                        <h3 class="title-d">Property Description</h3>
                        </div>
                    </div>
                    </div>
                    <div class="property-description">
                    <p class="description color-text-a">
                        {{ $user->description }}
                    </p>
                    </div>
                    <div class="row section-t3">
                    <div class="col-sm-12">
                        <div class="title-box-d">
                        <h3 class="title-d">Amenities</h3>
                        </div>
                    </div>
                    </div>
                    <div class="amenities-list color-text-a">
                    <ul class="list-a no-margin">
                        <li>Balcony</li>
                        <li>Outdoor Kitchen</li>
                        <li>Cable Tv</li>
                        <li>Deck</li>
                        <li>Tennis Courts</li>
                        <li>Internet</li>
                        <li>Parking</li>
                        <li>Sun Room</li>
                        <li>Concrete Flooring</li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-md-12 mb-5">
                <div class="row section-t3">
                <div class="col-sm-12">
                    <div class="title-box-d">
                    <h3 class="title-d">Contact Agent</h3>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 col-lg-4">
                    <img src="{{ asset('uploads/'.$agent->image)}}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="property-agent">
                    <h4 class="title-agent">{{ $agent->first_name ." ". $agent->last_name}}</h4>
                    <p class="color-text-a">

                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between">
                        <strong>Phone:</strong>
                        <span class="color-text-a">{{ $agent->mobile_number }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                        <strong>Email:</strong>
                        <span class="color-text-a">{{ $agent->email }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                        <strong>Skype:</strong>
                        <span class="color-text-a">{{ $agent->skype }}</span>
                        </li>
                    </ul>
                </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="property-contact">
                    @if ($user->status == 'Sale')
                        <form class="form-a" method="post" action="/order/{{ Auth::user()->id }}/{{ $apartment_id }}">
                            @csrf
                            <div class="row">
                            <h4 class="mb-3">Write us to Rent the Apartment</h4>
                            <div class="col-md-12 mb-1">
                                <div class="form-group">
                                <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-a">Send Message</button>
                            </div>
                            </div>
                        </form>
                    @else
                        <h2>This Apartment is Rented</h2>
                    @endif
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section><!-- End Property Single-->
        <script>
            // Initialize and add the map
            function initMap() {
              // The location of Uluru
              const uluru = { lat: -25.344, lng: 131.036 };
              // The map, centered at Uluru
              const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: uluru,
              });
              // The marker, positioned at Uluru
              const marker = new google.maps.Marker({
                position: uluru,
                map: map,
              });
            }
          </script>

        <div id="map"></div>

        <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
        <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJle3c3q0vA2CyPIpwnG34XfUb-aZq7NE&callback=initMap&libraries=&v=weekly"
        async
        ></script>

    </main><!-- End #main -->
@endsection

