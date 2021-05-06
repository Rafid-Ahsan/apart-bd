<div class="card">
    <img src="{{ $user->image }}" class="card-img-top" alt="{{ $user->image }}">
    <div class="card-body">
      <h5 class="card-title">{{ $user->first_name }}</h5>
      <p class="card-text mb-2">{{ $user->description }}</p>

      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Mobile: </strong> {{ $user->mobile_number }}</li>
        <li class="list-group-item"><strong>Skype: </strong> {{ $user->skype }}</li>
        <li class="list-group-item"><strong>Email: </strong> {{ $user->email }}</li>
      </ul>
    </div>
  </div>
