<!DOCTYPE html>
<html>
<head>
    <title>My Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

    <h2 class="mb-4">My Tasks</h2>
    {{-- Logout Button --}}
<form action="{{ url('logout') }}" method="POST" class="mb-3">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Task Add Form --}}
    <form method="POST" action="{{ url('task/store') }}">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Due Date</label>
            <input type="date" name="due_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>

    <hr>

    {{-- Task List --}}
    <table class="table table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Due:Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if($task->status == 'completed')
                        <span class="badge bg-success">Completed</span>
                    @else
                        <form action="{{ url('task/complete/'.$task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-success">✔ Mark Done</button>
</td>

              <td>
    @if($task->due_date)
        {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}

        @if(\Carbon\Carbon::parse($task->due_date)->isPast())
            <span class="text-danger"> (Overdue)</span>
        @elseif(\Carbon\Carbon::parse($task->due_date)->isToday())
            <span class="text-warning"> (Due Today)</span>
        @endif
    @else
        <span class="text-muted">No Due Date</span>
    @endif
</td>

                        </form>
                    @endif
                     <td>{{ $task->created_at->format('d M Y H:i') }}</td>

            </tr>
            @endforeach

        </tbody>
    </table>

</div>
</body>
</html>
