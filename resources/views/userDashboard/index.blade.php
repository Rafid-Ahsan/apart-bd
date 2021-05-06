@extends('layouts.app')

@section('content')
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Apartments by {{ Auth::user()->first_name . " " . Auth::user()->last_name}}</h1>
              <span class="color-text-a">Latest to oldest</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Dashboard
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
        @if (isset($users[0]) == null)
            <h3>Upload Property to show here</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="grid-option">
                        <a href="/add-property" class="btn btn-lg btn-primary">Add property</a>
                        <a href="/profile/{{ Auth::user()->id }}" class="btn btn-lg btn-success">Edit Profile</a>
                    </div>
                </div>
            </div>
        @else
        @foreach($users->chunk(3) as $items)
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
                <a href="/add-property" class="btn btn-lg btn-primary">Add property</a>
            </div>
          </div>
          @foreach($items as $user)
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="{{ asset('uploads/apartments/'.head(json_decode($user->house_image))) }}" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">{{ $user->name }}
                        <br /> {{ $user->house_number . " ". $user->road . " " . $user->thana . " " . $user->district . " " . $user->division . " " . $user->zip_code}}</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | TK {{ $user->rent }}</span>
                    </div>
                    <a href="/apartment/{{ $user->id }}" class="link-a">Click here to view
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span>{{ $user->area }}m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>{{ $user->beds }}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>{{ $user->baths }}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span>{{ $user->garage }}</span>
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
        @endif
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
                  <a class="page-link active " style="color: #0000;" href="{{ $users->links() }}">{{ $users->links() }}</a>
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
@endsection
