<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgb(140, 175, 209);
        }
        .table {
            background-color:rgb(68, 116, 122);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            vertical-align: middle;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td {
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }




    </style>
</head>
<body>
   <div class="container mt-5">
    @if(session()->has ('success'))
    {{  (session()->get ('success')) }}
    @endif

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <a href="{{ url('/employeeform') }}" class="btn btn-primary">Add</a>
            </tr>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($employee as $key => $val)
            <tr>
                <th>{{ ++$key }}</th>
                <td>{{ $val->name }}</td>
                <td>{{ $val->email }}</td>
                <td>{{ $val->city }}</td>
                <td>{{ $val->gender }}</td>
                <td>
                    @php
                        $hobbies = json_decode($val->hobbies, true);
                    @endphp
                    {{ is_array($hobbies) ? implode(', ', $hobbies) : $hobbies }}
                </td>
                <td>
                    <!-- Action buttons -->
                    <a href="{{ url('edit',['id'=>$val['id']]) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ url('delete',['id'=>$val['id']]) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
