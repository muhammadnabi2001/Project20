@extends('main')
@section('title')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Modal Trigger Button -->
            <div class="col-12">

                <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Create</button>
    
                <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createCategoryModalLabel">Add New Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('category-create') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="create_name_en" class="form-label">Category Name (English)</label>
                                        <input type="text" class="form-control" id="create_name_en" name="eng" value="{{ old('eng') }}">
                                        @error('eng')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="create_name_uz" class="form-label">Category Name (Uzbek)</label>
                                        <input type="text" class="form-control" id="create_name_uz" name="uz" value="{{ old('uz') }}">
                                        @error('uz')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="create_name_ru" class="form-label">Category Name (Russian)</label>
                                        <input type="text" class="form-control" id="create_name_ru" name="ru" value="{{ old('ru') }}">
                                        @error('ru')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Category</button>
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
                        <h6 class="m-0 font-weight-bold text-primary">Categories Table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $test = app()->getLocale();
                                        $lang = session('lang');
                                    @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            @php
                                                $jsonString = trim($category['name'], '"');

                                                $data = json_decode($jsonString, true);
                                            @endphp
                                            <td>{{ $categories->perPage() * ($categories->currentPage() - 1) + $loop->iteration }}</td> <!-- Paginatsiyada davom ettirilgan sanash -->
                                            <td>{{ $data[$lang] }}</td>
                                            <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <button class="btn btn-warning m-3" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">Edit</button>

                                                <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">Edit Category</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route('category-update', $category->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="edit_name_en_{{ $category->id }}" class="form-label">Category Name (English)</label>
                                                                        <input type="text" class="form-control" id="edit_name_en_{{ $category->id }}" name="engupdate" value="{{ $data['eng'] }}">
                                                                        @error('engupdate')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="edit_name_uz_{{ $category->id }}" class="form-label">Category Name (Uzbek)</label>
                                                                        <input type="text" class="form-control" id="edit_name_uz_{{ $category->id }}" name="uzupdate" value="{{ $data['uz'] }}">
                                                                        @error('uzupdate')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="edit_name_ru_{{ $category->id }}" class="form-label">Category Name (Russian)</label>
                                                                        <input type="text" class="form-control" id="edit_name_ru_{{ $category->id }}" name="ruupdate" value="{{ $data['ru'] }}">
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
                                    
                                                <form action={{route('category-delete',$category->id)}} method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$categories->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
