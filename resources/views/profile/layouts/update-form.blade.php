<form action="/profile/update/{{ $user->id }}" method="post">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input name="first_name" type="text" value="{{ $user->first_name }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input name="last_name" type="text" value="{{ $user->last_name }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input name="description" type="text" value="{{ $user->description }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="mobile_number" class="form-label">Mobile Number</label>
        <input name="mobile_number" type="text" value="{{ $user->mobile_number }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="skype" class="form-label">Skype</label>
        <input name="skype" type="text" value="{{ $user->skype }}" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" value="{{ $user->email }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
