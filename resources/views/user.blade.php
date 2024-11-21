<!DOCTYPE html>
<html>

<head>
    <title>Users Information</title>
</head>

<body>

    {{-- @foreach ($user['data'] as $item)
        <h1>Nama {{ $item['name'] }}</h1>
        <p>Email: {{ $item['email'] }}</p>
        <p>role: {{ $item['role'] }}</p>
        <p>profession: {{ $item['profession'] }}</p>
    @endforeach --}}
    <form action="{{ route('postuser') }}" method="post">
         @csrf
        <label for="">Name</label>
        <input type="text" name="name"><br>
        <label for="">Email</label>
        <input type="text" name="email"><br>
        <label for="">password</label>
        <input type="password" name="password"><br>
        <label for="">Role</label>
        <input type="text" name="role"><br>
        <label for="">Profession</label>
        <input type="text" name="profession"> <br>
        <button type="submit">submit</button>
    </form>
</body>

</html>
