@extends('main')
@section('title')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Categories Table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>News Title</th>
                                        <th>News Description</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $test = app()->getLocale();
                                        $lang = session('lang');
                                    @endphp
                                    @foreach ($news as $new)
                                        <tr>
                                            
                                            <td>{{ $new->id }}</td>
                                            <td>{{ $new->title[$lang]}}</td>
                                            <td>{{ $new->description[$lang] }}</td>
                                            <td>{{ $new->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <button class="btn btn-warning m-3" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $new->id }}">Edit</button>

                                                <div class="modal fade" id="editCategoryModal{{ $new->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{ $new->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editCategoryModalLabel{{ $new->id }}">Edit Category</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route('category-update', $new->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="edit_name_en_{{ $new->id }}" class="form-label">Category Name (English)</label>
                                                                        <input type="text" class="form-control" id="edit_name_en_{{ $new->id }}" name="engupdate">
                                                                        @error('engupdate')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="edit_name_uz_{{ $new->id }}" class="form-label">Category Name (Uzbek)</label>
                                                                        <input type="text" class="form-control" id="edit_name_uz_{{ $new->id }}" name="uzupdate">
                                                                        @error('uzupdate')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="edit_name_ru_{{ $new->id }}" class="form-label">Category Name (Russian)</label>
                                                                        <input type="text" class="form-control" id="edit_name_ru_{{ $new->id }}" name="ruupdate">
                                                                        @error('ruupdate')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                                <form action={{route('category-delete',$new->id)}} method="POST" style="display:inline;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
