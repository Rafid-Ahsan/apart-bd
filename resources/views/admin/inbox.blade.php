@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    @if(Session::has('msg'))
        <p class="alert alert-success">{{ Session::get('msg') }}</p>
    @endif
    <div class="list-group">
        @foreach ($inboxes as $inbox)
            <div class="list-group-item list-group-item-action active" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <a class="text-white" href="/profile/{{ $inbox->seller_info($inbox->seller_id)->id }}" style="text-decoration: none">
                        <h5 class="mb-1"><strong>Seller: </strong><span>{{ $inbox->seller_info($inbox->seller_id)->first_name }}</span></h5>
                    </a>
                    <small>{{ $inbox->seller_info($inbox->seller_id)->mobile_number }}</small>
                </div>

                <form action="/inbox/update/{{ $inbox->id }}" method="post">
                    @csrf
                    @method('put')

                    <div class="d-flex w-100 justify-content-between my-3">
                        <p><strong>Message: </strong>{{ $inbox->message }}</p>
                        <div class="dropdown">
                            <select name="status" class="btn btn-danger" onchange="this.form.submit()">
                                <option selected>{{ $inbox->status}}</option>
                                <option value="unread">Unread</option>
                                <option value="read">Read</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                    </div>
                </form>

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
