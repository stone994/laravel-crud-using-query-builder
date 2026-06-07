<h3>user detail</h3>
@foreach ($data as $id => $user )
    <h3>name:{{ $user->name }}</h3>
    <h3>email:{{ $user->email }}</h3>
    <h3>age:{{ $user->age }}</h3>
    <h3>city:{{ $user->city }}</h3>

@endforeach