@extends('layouts.layout')

@section('main')
    <section>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <main class="my-5">
            <div class="row">
                <div class="col-md-3 bg-success">
                    @include('subviews.sidebar')
                </div>
                <div class="col-md-9 bg-light">
                    <article class="p-4">
                        <h1 class="display-4">Add Student</h1>
                        <form action={{ URL('/students/create') }} method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="mb-2">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="mb-2">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="age" class="mb-2">Age</label>
                                <input type="number" name="age" id="age" class="form-control"
                                    placeholder="Enter age" value="{{ old('age') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="DOB" class="mb-2">DOB</label>
                                <input type="date" name="DOB" id="DOB" class="form-control"
                                    placeholder="Enter DOB" value="{{ old('DOB') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="score" class="mb-2">Score</label>
                                <input type="number" name="score" id="score" class="form-control"
                                    placeholder="Enter score" value="{{ old('score') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender" class="mb-2">Gender</label>
                                <div>
                                    <input type="radio" name="gender" id="male" value="m"
                                        class="form-check-input" {{ old('gender') == 'm' ? 'checked' : '' }}>
                                    <label for="male" class="form-check-label">Male</label>
                                    <input type="radio" name="gender" id="female" value="f"
                                        class="form-check-input" {{ old('gender') == 'f' ? 'checked' : '' }}>
                                    <label for="female" class="form-check-label">Female</label>
                                    <input type="radio" name="gender" id="others" value="o"
                                        class="form-check-input">
                                    <label for="others" class="form-check-label"
                                        {{ old('gender') == 'o' ? 'checked' : '' }}>Others</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Student</button>
                        </form>
                    </article>
                </div>
            </div>
        </main>
    </section>
@endsection
