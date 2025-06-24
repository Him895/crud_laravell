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


    <table class="table table-striped table-bordered">
        <thead class="table-dark">

            <tr>
                <a href="{{ url('/studentform') }}" class="btn btn-primary">Add</a>
            </tr>
             @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif

            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile no</th>
                <th>Gender</th>
                <th>courses</th>
                <th>date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @if($student->isEmpty())
            <tr>
                <td colspan="8" class="text-center text-danger">No student records found!</td>
            </tr>
            @else
            @foreach($student as $key => $val)
            <tr>
                <th>{{ ++$key }}</th>
                <td>{{ $val->studentname }}</td>
                <td>{{ $val->email }}</td>
                <td>{{ $val->mobileno }}</td>
                <td>{{ $val->gender }}</td>
                <td>{{ $val->courses }}</td>
                <td>{{ $val->date }}</td>

                <td>
                    <!-- Action buttons -->

                    <a href="{{ url('del',['id'=>$val['id']]) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

</body>
</html>


</body>
</html>
