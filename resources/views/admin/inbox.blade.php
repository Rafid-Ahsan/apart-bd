@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="list-group">
        @foreach ($inboxes as $inbox)
            <div class="list-group-item list-group-item-action active" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <a class="text-white" href="/profile/{{ $inbox->seller_info($inbox->seller_id)->id }}" style="text-decoration: none">
                        <h5 class="mb-1"><strong>Seller: </strong><span>{{ $inbox->seller_info($inbox->seller_id)->first_name }}</span></h5>
                    </a>
                    <small>{{ $inbox->seller_info($inbox->seller_id)->mobile_number }}</small>
                </div>

                <p class="my-3"><strong>Message: </strong>{{ $inbox->message }}</p>

                <div class="d-flex w-100 justify-content-between">
                    <a class="text-white" href="/profile/{{ $inbox->buyer_info($inbox->buyer_id)->id }}" style="text-decoration: none">
                        <h5 class="mb-1"><strong>Buyer: </strong><span>{{ $inbox->buyer_info($inbox->buyer_id)->first_name }}</span></h5>
                    </a>
                    <small>{{ $inbox->seller_info($inbox->buyer_id)->mobile_number }}</small>
                </div>
            </div>
        @endforeach
      </div>
</div>
@endsection
