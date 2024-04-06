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

                            <form method="POST" action="{{ route('tasks.store') }}">
                                @csrf
                                <div class="">
                                    <label> Name </label>
                                    <input type="text" class="form-control form-control-sm" name="name"
                                        value="{{ old('name') }}" placeholder="task name" required>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="">
                                    <label> Description </label>
                                    <textarea type="text" class="form-control form-control-sm" name="description" placeholder="task description"
                                        required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-success btn-success">Save</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
