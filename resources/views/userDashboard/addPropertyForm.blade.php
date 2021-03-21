@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 120px; margin-bottom: 30px">
        <div class="col-md-12">
            <h3 class="mb-5">Add Property Form</h3>
            <form method="post" action="/apartment/{{ Auth::user()->id }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" cols="20" rows="10"></textarea>
                  </div>
                <div class="mb-3">
                  <label for="house_number" class="form-label">House Number</label>
                  <input type="text" class="form-control" name="house_number" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="road" class="form-label">Road</label>
                    <input type="text" class="form-control" name="road" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="area" class="form-label">Area</label>
                    <input type="text" class="form-control" name="area" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="thana" class="form-label">Thana</label>
                    <input type="text" class="form-control" name="thana" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="district" class="form-label">District</label>
                    <input type="text" class="form-control" name="district" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="division" class="form-label">Division</label>
                    <input type="text" class="form-control" name="division" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="zip_code" class="form-label">Zip Code</label>
                    <input type="text" class="form-control" name="zip_code" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="rent" class="form-label">Rent</label>
                    <input type="text" class="form-control" name="rent" required autofocus>
                </div>

                <h3 class="my-3">Insert Apartment Images</h3>

                <div class="input-group hdtuto control-group lst increment" >
                    <input type="file" name="images[]" class="myfrm form-control" required autofocus>
                    <div class="input-group-btn">
                      <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                  </div>
                  <div class="clone hide">
                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                      <input type="file" name="images[]" class="myfrm form-control">
                      <div class="input-group-btn">
                        <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                      </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-3">
                        <label for="beds">Number of Bed Rooms</label>
                        <select class="form-select" name="beds">
                            <option selected value="0">Zero</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="beds">Number of Bath Rooms</label>
                        <select class="form-select" name="baths">
                            <option selected value="0">Zero</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="beds">Number of garage</label>
                        <select class="form-select" name="garage">
                            <option selected value="0">Zero</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="beds">Number of Balcony</label>
                        <select class="form-select" name="balcony">
                            <option selected value="0">Zero</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Submit</button>
              </form>
        </div>
    </div>
</div>

@endsection
