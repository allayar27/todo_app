<x-app-layout>
    <x-slot name="header">
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a href="/"><span class="navbar-brand mb-0 h1">Edit Task</span></a>
                <a href="{{ route('tasks.index') }}"><button class="btn btn-danger">Cancel</button></a>
            </div>
        </nav>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('tasks.update', $task->id) }}" method="post" class="mt-3 p-3">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}">
                    @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3"> {{ $task->description }} </textarea>
                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <button class="btn btn-success">update</button>
            </form>
        </div>
    </div>
</x-app-layout>


