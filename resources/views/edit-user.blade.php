

<form action="{{ route('updateuser', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    Username: <input type="text" name="username" value="{{ $user->username }}"><br>
    Email: <input type="email" name="email" value="{{ $user->email }}"><br>
    City: <input type="text" name="city" value="{{ $user->city }}"><br>

    Gender:
    <select name="gender">
        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
        <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
    </select><br>

    Hobbies:
    @php
        $userHobbies = json_decode($user->hobbies, true);
    @endphp
    <input type="checkbox" name="hobbies[]" value="reading" {{ in_array('reading', $userHobbies) ? 'checked' : '' }}> Reading
    <input type="checkbox" name="hobbies[]" value="travelling" {{ in_array('travelling', $userHobbies) ? 'checked' : '' }}> travelling
    <input type="checkbox" name="hobbies[]" value="gaming" {{ in_array('gaming', $userHobbies) ? 'checked' : '' }}> Gameing
    <br>

    <button type="submit">Update</button>
</form>




