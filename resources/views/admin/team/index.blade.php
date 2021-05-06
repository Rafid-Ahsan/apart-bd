@extends('admin.layouts.app')

@section('content')
    <div class="container" style="margin-top: 2em; margin-bottom: 5em;">
        @if(Session::has('msg'))
            <p class="alert alert-success">{{ Session::get('msg') }}</p>
        @endif

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <form action="/team/update/{{ $user->id }}" method="post">
                            @csrf
                            @method('put')

                            <th scope="row">1</th>
                            <td>{{ $user->first_name }}</td>
                            <td>
                                <select class="form-select" name="role">
                                    <option selected>{{ $user->roles->pluck('name')->first() }}</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="/team/deleteRole/{{ $user->id }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </form>
                    </tr>
                @endforeach

            </tbody>
          </table>
        </div>
@endsection
