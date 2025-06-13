<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <form action="">
        <h2>Component user</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <x-input type="text" name="name" placeholder="enter your name" label="Enter full name"/>
                </div>

                <div class="col-md-3">
                    <x-input type="text" name="email" placeholder="enter your email" label="Enter full email"/>
                </div>

                <div class="col-md-3">
                    <x-input type="text" name="password" placeholder="enter your password" label="Enter password"/>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
