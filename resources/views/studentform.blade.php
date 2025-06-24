<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Greycells-web</h2>
        <h3 class="mt-4">Student Form</h3>
       
        <form action="{{ route('addstudent') }}" class="mt-4" method="POST">
            @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="" class="form-label">Studentname</label>
                    <input type="text" name="studentname"  placeholder="Enter student name" value="{{ old('studentname') }}" required>
                   <span class="text-danger">@error('studentname'){{ $message }}@enderror</span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="" class="form-label">Email</label>
                    <input type="text" name="email"  placeholder="Enter student emil" value="{{ old('email') }}"required>
            </div>
        </div>

         <div class="row mb-3">
            <div class="col-md-3">
                <label for="" class="form-label">Mobile No</label>
                    <input type="text" name="mobileno"  placeholder="Enter student mobile number" value="{{ old('mobileno') }}"required>
            </div>
        </div>

         <div class="row mb-3">
            <div class="col-md-3">
                <label for="" class="form-label">Courses</label>
                <select name="courses" id="courses" class="form-select" required>
                    <option value="" disable>Select your Courses</option>
                    <option value="fullstack development">Fullstack Development</option>
                    <option value="digital marketing">Digital marketing</option>
                    <option value="app development">App development</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="" class="form-label">Gender</label>
                    <input type="radio" name="gender"   value="male"@checked(old('gender'))>Male
                    <input type="radio" name="gender"  value="female"@checked(old('gender'))>Female
            </div>
        </div>

         <div class="row mb-3">
            <div class="col-md-3">
                <label for="" class="form-label">Date of joining</label>
                    <input type="date" name="date"   value="{{ old('date') }}">

            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Addstudent</button>
            </div>
        </div>




    </div>
    </form>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</body>
</html>
