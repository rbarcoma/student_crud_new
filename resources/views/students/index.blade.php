@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Student List</h5>

        <button class="btn btn-primary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#addStudent">
            + Add Student
        </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                         <td>
                            <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $student->id }}">
                                Edit
                            </button>

                            <form action="{{ route('students.destroy', $student) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this student?')"
                                        class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit{{ $student->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('students.update', $student) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="modal-header bg-dark">
                                        <h5 class="modal-title text-white">Edit Student</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <label class="form-label">Student Name:</label>
                                        <input name="name" value="{{ $student->name }}" class="form-control mb-2" required>

                                        <label class="form-label">Student Course:</label>
                                        <input name="course" value="{{ $student->course }}" class="form-control mb-2" required>

                                        <label class="form-label">Student Email:</label>
                                        <input name="email" value="{{ $student->email }}" class="form-control mb-2" required>

                                        <label class="form-label">Student Age:</label>
                                        <input name="age" value="{{ $student->age }}" class="form-control mb-2" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @empty
                    <tr>
                        <td colspan="6" class="text-muted">No students found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addStudent">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <form method="POST"
              action="{{ route('students.store') }}"
              class="modal-content">
            @csrf

            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Add Student</h5>
                <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="close"> </button>
            </div>

            <div class="modal-body">
                <label class="form-label">Student Name:</label>
                <input name="name" class="form-control mb-2" placeholder="Enter student name" required>
                <label class="form-label">Student Course:</label>
                <input name="course" class="form-control mb-2" placeholder="Enter course" required>
                <label class="form-label">Student Email:</label>
                <input name="email" class="form-control mb-2" placeholder="Enter email" required>
                <label class="form-label">Student Age:</label>
                <input name="age" class="form-control mb-2" placeholder="Enter age" required>
            </div>

            <div class="modal-footer">
                <button class="btn btn-dark" data-bs-dismiss="modal"> Close </button>
                <button class="btn btn-success">Save Student</button>
            </div>
        </form>
    </div>
</div>

@endsection
