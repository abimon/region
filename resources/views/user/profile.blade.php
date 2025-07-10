@extends('layouts.app', ['title' => 'Profile'])
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-6 mb-2">
                <div class="card p-3">
                    <div class="text-center">
                        <img src="{{ $user->avatar ? $user->avatar : '/storage/images/user.png' }}" alt="" class="w-50">
                    </div>
                    @if(request()->path() == 'profile')

                        <!-- Modal button to update avatar -->
                        <button type="button" class="btn btn-success mt-2" data-bs-toggle="modal"
                            data-bs-target="#avatarModal">Update Avatar</button>
                        <!-- Modal -->
                        <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="avatarModalLabel">Update Avatar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('clients.update', $user->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <label for="avatar"><b>Avatar</b></label>
                                            <div class="ms-2 card p-3 border-dark bg-transparent shadow h-75"
                                                style="border-style:dashed;">
                                                <img id="outCard" src="{{ old('avatar') }}"
                                                    style="height: 100%; object-fit:contain;" />
                                                <input type="file" accept="image/*" name="avatar" id="avatar"
                                                    style="display: none;" class="form-control"
                                                    onchange="loadavatarFile(event)">
                                                <div class="pt-2" id="desc">
                                                    <div class="text-center" style="font-size: xxx-large; font-weight:bolder;">
                                                        <i class="bi bi-upload"></i>
                                                    </div>
                                                    <div class="text-center">
                                                        <label for="avatar" class="btn btn-success text-white"
                                                            title="Upload new profile image">Browse</label>
                                                    </div>
                                                    <div class="text-center prim">*File supported .png .jpg .webp</div>
                                                </div>
                                                <script>
                                                    var loadavatarFile = function (event) {
                                                        var image = document.getElementById('outCard');
                                                        image.src = URL.createObjectURL(event.target.files[0]);
                                                        document.getElementById('avatar').value == image.src;
                                                    };
                                                </script>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card p-3 mt-3">
                            <div class="row">
                                <div class="col-md-4 text-end fw-bold">Name</div>
                                <div class="col-md-8 text-start">{{$user->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-end fw-bold">Email</div>
                                <div class="col-md-8 text-start">{{$user->email}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-end fw-bold">Contact</div>
                                <div class="col-md-8 text-start">{{$user->phone}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-end fw-bold">Membership No.</div>
                                <div class="col-md-8 text-start text-uppercase">{{$user->membership_no}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-end fw-bold">Address</div>
                                <div class="col-md-8 text-start">{{$user->address}}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @if(request()->path() == 'profile')
                <div class="col-md-6 mb-2">
                    <div class="card p-3">
                        <h2 class="text-center">Biodata</h2>
                        <form method="POST" action="{{ route('clients.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}"
                                    {{$user->id == (Auth::user()->id) ? 'required' : 'disabled'}}>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-success">Update Profile</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card p-3">
                        <h2 class="text-center">Change Password</h2>
                        <form method="POST" action="{{ route('clients.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="password" class="form-label">Old Password</label>
                                <input type="password" name="oldpassword" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Change Password</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="col-md-6 mb-2">
                    <div class="card p-3">
                        <div class="d-flex justify-content-between mb-3">
                            <h2 class="fw-bold">Enrolled Programs</h2>
                            <!-- modal button to enroll user to Program -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#enrollModal">Enroll to Program</button>
                            <!-- Modal -->
                            <div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="enrollModalLabel">Enroll to Program</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ route('enrollments.store', ['user_id' => $user->id]) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="program_id" class="form-label">Select Program</label>
                                                    <select name="program_id" id="program_id" class="form-select" required>
                                                        <option selected disabled>Select Program</option>
                                                        @foreach (App\Models\Program::get() as $program)
                                                            <option value="{{ $program->id }}">{{ $program->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="userTable">
                                <thead>
                                    <th scope="col">#</th>
                                    <th scope="col">Program Title</th>
                                    <th scope="col">Enroll Date</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($user->enrolls as $enroll)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $enroll->program->title }}</td>
                                            <td>{{ $enroll->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="{{ route('enrollments.show', $enroll->id) }}"
                                                    class="btn btn-primary">View</a>
                                                <a href="{{ route('enrollments.edit', $enroll->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('enrollments.destroy', $enroll->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection