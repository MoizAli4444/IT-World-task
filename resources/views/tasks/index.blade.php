@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="">
                            <a class="" href="{{ route('tasks.create') }}"> Create Task</a>

                            <table class="table table-striped ">
                                <thead>
                                    <th>Task</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($tasks as  $task)
                                        <tr>
                                            <td>{{ $task->name ?? '-' }}</td>
                                            <td>{{ $task->description ?? '-' }}</td>
                                            <td>{{ $task->status ? 'Active' : 'InActive' }}</td>
                                            <td>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('tasks.edit', $task->id) }}" target="_self">Edit</a>
                                                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}"
                                                        onsubmit="return confirm('Are you sure you want to delete this task?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                    </form>

                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
