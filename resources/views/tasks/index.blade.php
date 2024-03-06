
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks List') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-4">Add task</a>
                        <ul class="list-group">
                            @foreach ($tasks as $task)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $task->title }} - {{ $task->priority }}

                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary btn-sm m-2">View</a>
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary btn-sm m-2">Edit</a>

                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm m-2">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
