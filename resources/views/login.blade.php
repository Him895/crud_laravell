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
        <form action="login" method="post" class="w-100">
            @csrf
            <div class="row d-block">
                <div class="col-md-3">
                    <label for="">Username</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="username">
                    <span class="text-danger">@error('username'){{ $message }}
                    @enderror</span>
                </div>
            </div>

           

            <div class="row">
                <div class="col-md-3">
                    <label for="">Password</label>
                    <input type="text" class="form-control" placeholder="Enter password" name="password">
                    <span class="text-danger">@error('password'){{ $message }}
                    @enderror</span>
                </div>
            </div>

            <div class="col-md-3">
                <input type="submit" class="btn btn-success mt-3">
            </div>
        </form>
    </div>

</body>
</html>
