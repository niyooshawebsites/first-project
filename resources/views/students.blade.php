@extends('layouts.layout');

@section('main')
    <section>
        <main class="my-5">
            <div class="row">
                <div class="col">
                    <form action{{ URL('students/all') }} method="GET">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search"
                                    value="{{ request()->search }}" required />
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href={{ URL('students/all') }} class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Score</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                                    </td>
                                    <td>{{ $student->id }}</td>
                                    <td>
                                        @if ($student->image)
                                            <img src="{{ asset('/storage/' . $student->image) }}" width="150" />
                                        @endif
                                    </td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->DOB }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->score }}</td>
                                    <td>
                                        <a href="{{ URL('students/edit', $student->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ URL('students/delete', $student->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this student?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Keeps the filter in tact --}}
                    <div class="pagination">
                        {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
