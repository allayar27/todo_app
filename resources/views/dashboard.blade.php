<x-app-layout>
    <x-slot name="header">
        <nav class="flex justify-center space-x-4">
            <a href="{{ route('dashboard') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Home</a>
            <a href="{{ route('tasks.index') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Tasks</a>
            <a href="{{ route('users.index') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Users</a>
            <a href="{{ route('users.index') }}" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900">Reports</a>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="min-w-full border-b border-gray-200 shadow">
             <div id="app">
                <div id="autocomplete">
                </div>
             </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h4>Main Card</h4>
            </div>
            <div class="card-body">
                <p>{{ __('You are logged in') }}
                as {{ auth()->user()->hasRole('admin') == true
                    ? 'Admin'
                    : 'User' }}!</p>
            </div>
            <div class="card-footer">
                This is card footer
            </div>
        </div>

    </div>
    </div>
    </div>
</x-app-layout>
