@extends('layouts.app', ['title' => 'Profile'])
@section('content')
<div class="container">
    @if(request()->path() != 'profile')
    <div class="mb-3">
        <button class="btn btn-primary" onclick="window.location.href='/users'">
            < Back</button>
    </div>
    @endif
    <div class="row ">
        <div class="col-md-6 mb-2">
            <div class="card p-3">
                <div class="text-center">
                    <img src="{{ $user->avatar ? $user->avatar : '/storage/images/user.png' }}" alt="" style="width:80%;height:50vh;object-fit:cover;">
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
                                            var loadavatarFile = function(event) {
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
                        <div class="col-md-4 text-end fw-bold">Name:</div>
                        <div class="col-md-8 text-start">{{$user->name}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-end fw-bold">Email:</div>
                        <div class="col-md-8 text-start">{{$user->email}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-end fw-bold">Contact:</div>
                        <div class="col-md-8 text-start">{{$user->contact}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-end fw-bold">Role:</div>
                        <div class="col-md-8 d-flex justify-content-between">{{$user->role}}
                            <i type="button" class="fa fa-pen" data-bs-toggle="modal"
                                data-bs-target="#enrollModal"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-end fw-bold">Church:</div>
                        <div class="col-md-8 text-start text-uppercase">{{$user->institution}}</div>
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
        @endif
    </div>
</div>
<div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollModalLabel">Assign Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body" style="color:black;">
                    <div class="mb-3">
                        <label for="role" class="form-label">Select Role</label>
                        <select name="role" id="role" class="form-select" required>
                            <option selected disabled>Select Program</option>
                            <?php $roles = ['CYD/FYD', 'Area Co-ordinator', 'Director', 'Ass. Director', 'Elder', 'Instructor', 'Member', 'Guest']; ?>
                            @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ $role==$user->role?'selected':'' }}>{{ $role }}
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
@endsection