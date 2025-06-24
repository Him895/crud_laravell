<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Registration Form</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ url(!empty($student->id) ? '/updates/'.$student->id : '/addst') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $student->name ?? '') }}" required>
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $student->email ?? '') }}" required>
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>

                    <div class="mb-3">
                        <label>Mobile No</label>
                        <input type="text" name="mobileno" class="form-control" value="{{ old('mobileno', $student->mobileno ?? '') }}" required>
                        <span class="text-danger">@error('mobileno'){{ $message }} @enderror</span>
                    </div>

                    <div class="mb-3">
                        <label>Date of Joining</label>
                        <input type="date" name="doj" class="form-control" value="{{ old('doj', $student->doj ?? '') }}" required>
                        <span class="text-danger">@error('doj'){{ $message }} @enderror</span>
                    </div>

                    <div class="mb-3">
                        <label>Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="male"
                                {{ old('gender', $student->gender ?? '') == 'male' ? 'checked' : '' }} required>
                            <label class="form-check-label">Male</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="female"
                                {{ old('gender', $student->gender ?? '') == 'female' ? 'checked' : '' }} required>
                            <label class="form-check-label">Female</label>
                        </div>

                        <br><span class="text-danger">@error('gender'){{ $message }} @enderror</span>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
