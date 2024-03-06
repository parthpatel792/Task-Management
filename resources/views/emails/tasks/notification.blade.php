<!DOCTYPE html>
<html>
<head>
    <title>Task Notification</title>
</head>
<body>
    <h4>Tasks Due Soon</h4>
    @foreach ($dueSoonTasks as $task)
        <p>{{ $task->title }} - Due: {{ $task->due_date }}</p>
    @endforeach

    <h4>Recently Added Tasks</h4>
    @foreach ($recentTasks as $task)
        <p>{{ $task->title }} - Added: {{ $task->created_at->toDateString() }}</p>
    @endforeach
</body>
</html>
