@extends('main')
@section('title')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#createUserModal">Create</button>
    
                <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createUserModalLabel">Add New User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('user-create') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">User Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">User Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">User Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Save User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $test = app()->getLocale();
                                        $lang = session('lang');
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>

                                            <td>{{ $users->perPage() * ($users->currentPage() - 1) + $loop->iteration }}</td> 
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <button class="btn btn-warning m-3" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">Edit</button>

                                                <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route('user-update', $user->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="editname{{ $user->id }}" class="form-label">User Name</label>
                                                                        <input type="text" class="form-control" id="editname{{ $user->id }}" name="editname" value="{{$user->name }}">
                                                                        @error('editname')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editemail{{ $user->id }}" class="form-label">User Email</label>
                                                                        <input type="text" class="form-control" id="editemail{{ $user->id }}" name="editemail" value="{{$user->email }}">
                                                                        @error('editemail')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="editpassword{{ $user->id }}" class="form-label">User Password</label>
                                                                        <input type="text" class="form-control" id="editpassword{{ $user->id }}" name="editpassword" placeholder="Leave blank to keep current password">
                                                                        @error('editpassword')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    
                                                                    <button type="submit" class="btn btn-primary">Update User</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action={{route('user-delete',$user->id)}} method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
