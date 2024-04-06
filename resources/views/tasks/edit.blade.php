@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">


                        <div class="">
                            <a class="" href="{{ route('tasks.index') }}">Task</a>

                            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $task->name) }}" placeholder="Task Name" required>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Task Description" required>{{ old('description', $task->description) }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control form-control-sm" id="status" name="status">
                                        <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>


                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
