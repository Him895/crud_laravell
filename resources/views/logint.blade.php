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
    <div class="container d-flex justify-content-center">
        <form action=""  class="w-100 mt-3" method="post">
            @csrf
            <div class="row d-block">
                <div class="col-md-3">
                    <label for="" class="fw-bold mb-2">Usename</label>
                    <input type="text" name="username" class="form-control"placeholder="Enter username"value={{ old('username') }}>
                    <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                </div>
            </div>

             <div class="row d-block">
                <div class="col-md-3">
                    <label for=""class="fw-bold mb-2">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Enter username"value={{ old('password') }}>
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
            </div>

             <div class="row d-block mt-3">
            <div class="col-md-3">
                <button type="submit" class="btn btn-success">Log In</button>
            </div>
            </div>

        </form>
    </div>

</body>
</html>
