<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-sm m-2">< Back</a>
                    <p>Title: {{ $task->title }}</p>
                    <p>Description: {{ $task->description }}</p>
                    <p>Priority: {{ $task->priority }}</p>
                    <p>Due Date: {{ $task->due_date }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
