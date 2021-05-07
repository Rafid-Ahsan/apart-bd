@extends('admin.layouts.app')

@section('content')
<div class="container">
    @if(Session::has('msg'))
        <p class="alert alert-success">{{ Session::get('msg') }}</p>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th>Name</th>
            <th>Description</th>
            <th>House Number</th>
            <th>Image</th>
            <th>Rent</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($apartments as $apartment)
            <tr>
                <th scope="row">1</th>
                <td>{{ $apartment->name }}</td>
                <td>{{ $apartment->description }}</td>
                <td>{{ $apartment->house_number }}</td>
                <td><img style="height: 5em; width: 8em;" src="{{ asset('uploads/apartments/'.head(json_decode($apartment->house_image))) }}" alt="{{ $apartment->name }}" alt=""></td>
                <td>{{ $apartment->rent }}</td>
                <td>
                    <form action="/apartment/update/status/{{ $apartment->id }}" method="post">
                        @csrf
                        @method('put')

                        <div class="dropdown">
                            <select name="status" class="btn btn-success" onchange="this.form.submit()">
                                <option selected>{{ $apartment->status}}</option>
                                <option value="sale">Sale</option>
                                <option value="sold">Sold</option>
                            </select>
                        </div>
                    </form>
                </td>
                <td>
                    <div class="row">
                        <div class="col-lg-6">
                            {{-- <a href="/apartment/update/{{ $apartment->id }}" class="btn btn-primary">Update</a> --}}
                        </div>
                        <div class="col-lg-6">
                            <a href="/apartment/delete/{{ $apartment->id }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  {{ $apartments->links() }}
</div>
@endsection
