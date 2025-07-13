@extends('layouts.layout')

@section('main')
    <section>
        <main class="my-5">
            <div class="row">
                <div class="col-md-3 bg-success">
                    @include('subviews.sidebar')
                </div>
                <div class="col-md-9 bg-light">
                    <article class="p-4">
                        <h1 class="display-4">Edit Student</h1>
                        <form action="{{ URL('/students/update', $student->id) }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="mb-2">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter name" value="{{ $student->name }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="mb-2">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter email" value="{{ $student->email }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="age" class="mb-2">Age</label>
                                <input type="number" name="age" id="age" class="form-control"
                                    placeholder="Enter age" min="18" max="30" value="{{ $student->age }}"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="DOB" class="mb-2">DOB</label>
                                <input type="date" name="DOB" id="DOB" class="form-control"
                                    placeholder="Enter DOB" value="{{ $student->DOB }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="score" class="mb-2">Score</label>
                                <input type="number" name="score" id="score" class="form-control"
                                    value="{{ $student->score }}" placeholder="Enter score" min="0" max="100"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender" class="mb-2">Gender</label>
                                <div>
                                    <input type="radio" name="gender" id="male" value="m"
                                        {{ $student->gender == 'm' ? 'checked' : '' }} class="form-check-input">
                                    <label for="male" class="form-check-label">Male</label>
                                    <input type="radio" name="gender" id="female" value="f"
                                        {{ $student->gender == 'f' ? 'checked' : '' }} class="form-check-input">
                                    <label for="female" class="form-check-label">Female</label>
                                    <input type="radio" name="gender" id="others" value="o"
                                        {{ $student->gender == 'o' ? 'checked' : '' }} class="form-check-input">
                                    <label for="others" class="form-check-label">Others</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Student</button>
                        </form>
                    </article>
                </div>
            </div>
        </main>
    </section>
@endsection
