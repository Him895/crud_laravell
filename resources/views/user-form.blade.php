<div>
{{ URL::full() }}
<br>
{{ URL::current() }}
<br>
{{ URL::previous() }}
    <h2>Add New user</h2>
    <form action="/adduser" method="post">
        @csrf
        <div class="input-wrapper">
            <input type="text" name="username"  placeholder="Enter user name" value="{{ old('username') }}"
            class="{{ $errors->first('username')?'input-error':'' }}" required>
            <span style="color:red">@error('username'){{ $message }}@enderror</span>
        </div>
        <br><br>
        <div class="input-wrapper">
            <input type="email" name="email" placeholder="Enter user email" value="{{ old('email') }}" required>
            <span style="color:red">@error('email'){{ $message }}@enderror</span>
        </div>
        <br><br>
        <div class="input-wrapper">

            <label for="city">Select City:</label>
            <br>
            <select name="city" id="city" value="{{ old('city') }}">
                <option value="" disabled selected>Select your city</option>
                <option value="nagpur">Nagpur</option>
                <option value="pune">Pune</option>
                <option value="mumbai">Mumbai</option>
                <option value="delhi">Delhi</option>


            </select>
            <span style="color:red">@error('city'){{ $message }}@enderror</span>
        </div>
        <div >
            <h4>Gender</h4>
            <input type="radio" id="male" name="gender" value="male" @checked(old('gender')== 'male') required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" @checked(old('gender')== 'female') required>
            <label for="male">female</label>
            <br>
            <span style="color:red">@error('gender'){{ $message }}@enderror</span>

        </div>
        <div>
            <h4>Hobbies</h4>
            <input type="checkbox" id="reading" name="hobbies[]" value="reading">
            <label for="reading">Reading</label>
            <input type="checkbox" id="travelling" name="hobbies[]" value="travelling">
            <label for="travelling">Travelling</label>
            <input type="checkbox" id="gaming" name="hobbies[]" value="gaming">
            <label for="gaming">Gaming</label>
            <br><br>
            <span style="color:red">@error('hobbies'){{ $message }} @enderror</span>
        </div>
        <br><br>
        <div class="input-wrapper">
            <button>Add New user</button>
        </div>
    </form>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>

<h2>All Users</h2>
<table border="1" cellpadding="9">
    <tr>
        <th>ID</th><th>Username</th><th>Email</th><th>City</th><th>Gender</th><th>Hobbies</th><th>Action</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->city }}</td>
        <td>{{ $user->gender }}</td>
        <td>{{ implode(', ', json_decode($user->hobbies)) }}</td>
        <td>
            <form action="{{ route('deleteuser', $user->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

        </td>mm
        <td>
            <form action="{{ route('edituser', $user->id) }}" method="get">
                @csrf
                <button type="submit">Edit</button>
            </form>



    </tr>
    @endforeach
</table>

<style>
.input-wrapper {
    display: flex;
    flex-direction: column;
    width: 300px;
}
.input-wrapper input {
    padding: 10px;

    border-radius: 4px;
    margin-bottom: 10px;
}
.input-wrapper input:valid{
    border: 1px solid #28a745;
}
.input-wrapper button {
    padding: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.input-wrapper button:hover {
    background-color: #218838;
}

.input-wrapper input::placeholder {
    color: #6c757d;
    opacity: 1;
}
.input-wrapper input:focus::placeholder {
    color: #80bdff;
}

.input-wrapper select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: white;
}
.input-wrapper select:focus {
    border-color: #80bdff;
    outline: none;
}
.input-wrapper select option {
    padding: 10px;
}
.input-wrapper select option:hover {
    background-color: #f8f9fa;
}
.input-wrapper select option:checked {
    background-color: #007bff;
    color: white;
}
.input-wrapper select option:checked:hover {
    background-color: #0056b3;
}
.input-wrapper label {
    margin-bottom: 5px;
    font-weight: bold;
}
.input-wrapper label:hover {
    color: #007bff;
}
.input-wrapper label:focus {
    color: #0056b3;
}


.input-wrapper select:focus::placeholder {
    color: #80bdff;
}
.input-wrapper select::placeholder {
    color: #6c757d;
    opacity: 1;
}
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color:rgb(126, 178, 231);
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
    color: #333;
    font-size: 16px;
    line-height: 1.5;
    transition: all 0.3s ease;
    border: 1px solid #ced4da;
    box-sizing: border-box;
    width: 100%;
    max-width: 500px;
    margin: 20px auto;
    align-items: center;

}

.input-error {
    border: 1px solid red;
    background-color: #f8d7da;
}

</style>
