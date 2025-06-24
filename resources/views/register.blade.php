<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Login Form</h1>
     @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

    <div class="container d-flex justify-content-center">

        <form action="{{ url('register') }}" class="w-100 mt-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row d-block">
                <div class="col-md-3">
                    <label for="" class="fw-bold mb-2">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="please Enter username" value="{{ old('username') }}">
                     <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                </div>
            </div>
         <div class="row d-block">
            <div class="col-md-3">
                    <label for="" class="fw-bold mb-2 mt-2">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="please Enter email" value="{{ old('email') }}">
                     <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>
            </div>

           <div class="row d-block">
            <div class="col-md-3">
                    <label for="" class="fw-bold mb-2 mt-2">Gender</label><br>
                    <input type="radio"  name="gender" value="male"@checked(old('gender'))>Male
                    <input type="radio"  name="gender" value="female"@checked(old('female'))>female

                     <span class="text-danger">@error('gender'){{ $message }} @enderror</span>
                </div>
            </div>

            <div class="row d-block">
            <div class="col-md-3">
                    <label for="" class="fw-bold mb-2 mt-2">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="please Enter password" value="{{ old('password') }}">
                     <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
            </div>

            <div class="col-md-3">
                <input type="file" class="form-control mt-2" name="file" placeholder="please Enter image" value="{{ old('image') }}">
                <span class="text-danger">@error('image'){{ $message }} @enderror</span>
            </div>

            <div class="row d-block mt-3">
            <div class="col-md-3">
                <button type="submit" class="btn btn-success">Register</button>
            </div>
            </div>

        </form>

    </div>

</body>
</html>
