<!DOCTYPE html>
<html>
<head>
    <title>Weekly Task Report</title>
</head>
<body>
    <h1>Weekly Task Report</h1>
    <h2>Completed Tasks Last Week</h2>
    <ul>
        @foreach ($completedTasksLastWeek as $task)
            <li>{{ $task->name }} - Completed at {{ $task->updated_at->format('Y-m-d H:i:s') }}</li>
        @endforeach
    </ul>

    {{-- Add more sections here for additional data --}}

</body>
</html>
