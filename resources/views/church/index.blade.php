@extends('layouts.app', ['title' => 'Exams'])

@section('content')
<div class="container-fluid">
    <div class="m-5">
        <!-- modal button to open modal for add user -->
        <button class="btn btn-outline-success" data-bs-target="#addChurchModal" data-bs-toggle="modal" id="addChurchBtn">Add Church</button>
        <!-- Add Church Modal -->
        <div class="modal fade" id="addChurchModal" tabindex="-1" role="dialog" aria-labelledby="addChurchModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addChurchModalLabel">Add Church</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('churches.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="district" class="form-label">District</label>
                                <input type="text" class="form-control" id="district" name="district" required>
                            </div>
                            <div class="mb-3">
                                <label for="station" class="form-label">Station</label>
                                <input type="text" class="form-control" id="station" name="station" required>
                            </div>
                            <div class="mb-3">
                                <label for="conference" class="form-label">Conference</label>
                                <input type="text" class="form-control" id="conference" name="conference" required>
                            </div>
                            <div class="mb-3">
                                <label for="union" class="form-label">Union</label>
                                <input type="text" class="form-control" id="union" name="union" required>
                            </div>
                            <div class="mb-3">
                                <label for="division" class="form-label">Division</label>
                                <input type="text" class="form-control" id="division" name="division" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-responsive">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>District</th>
            <th>Station</th>
            <th>Conference</th>
            <th>Union</th>
            <th>Division</th>
            <th>Members</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($churches as $church)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $church->name }}</td>
                <td>{{ $church->district }}</td>
                <td>{{ $church->station }}</td>
                <td>{{ $church->conference }}</td>
                <td>{{ $church->union }}</td>
                <td>{{ $church->division }}</td>
                <td>{{ $church->members->count() }}</td>
                <td>
                    <a href="{{ route('churches.show', $church->id) }}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('churches.edit', $church->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('churches.destroy', $church->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection