<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Employee Registration Form</h2>

@php
    $employeeHobbies = isset($employee) ? json_decode($employee->hobbies, true) : [];
@endphp

    <form action="{{ url(!empty($employee->id)&& $employee->id ? '/update/'.$employee->id :'/addemployee') }}" method="POST">
      @csrf

      <div class="row mb-3">
        <div class="col-md-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $employee->name ?? '') }}">
          <span class="text-danger">@error('username'){{ $message }}@enderror</span>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email',$employee->email ?? '') }}">
          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>
      </div>

        <div class="row mb-3">
            <div class="col-md-3">
            <label for="city" class="form-label">City</label>
            <select name="city" id="city" class="form-select">
    <option value="" disabled>Select your city</option>
    <option value="nagpur" @selected(old('city', $employee->city ?? '') == 'nagpur')>Nagpur</option>
    <option value="pune" @selected(old('city', $employee->city ?? '') == 'pune')>Pune</option>
    <option value="mumbai" @selected(old('city', $employee->city ?? '') == 'mumbai')>Mumbai</option>
    <option value="delhi" @selected(old('city', $employee->city ?? '') == 'delhi')>Delhi</option>
    <option value="bangalore" @selected(old('city', $employee->city ?? '') == 'bangalore')>Bangalore</option>
</select>

            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>
            </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Gender</label>
                <br>
                <input type="radio" id="male" value="male" name="gender" @checked(old('gender',$employee->gender ?? '')== 'male') required>Male
                <input type="radio" id="female" value="female" name="gender" @checked(old('gender',$employee->gender ?? '')== 'female') required>Female
                <input type="radio" id="other" value="other" name="gender" @checked(old('gender',$employee->gender ?? '')== 'other') required>Other
                <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
                </div>
                </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Hobbies</label>
                <br>
                <input type="checkbox" id="running" name="hobbies[]" value="running"
  @checked(in_array('running', old('hobbies', $employeeHobbies)))> Running

<input type="checkbox" id="travelling" name="hobbies[]" value="travelling"
  @checked(in_array('travelling', old('hobbies', $employeeHobbies)))> Travelling

<input type="checkbox" id="reading" name="hobbies[]" value="reading"
  @checked(in_array('reading', old('hobbies', $employeeHobbies)))> Reading

                <span class="text-danger">@error('hobbies'){{ $message }}@enderror</span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">AddEmployee</button>
            </div>
        </div>

    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
