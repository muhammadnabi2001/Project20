@extends('main')
@section('title')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @php
                    $test = app()->getLocale();
                    $lang = session('lang');
                @endphp
                <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#createnewsModal">Create</button>

                <div class="modal fade" id="createnewsModal" tabindex="-1" aria-labelledby="createnewsModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createnewsModalLabel">Create News</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action={{ route('news-create') }}>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="edit_title_en" class="form-label">News title (English)</label>
                                        <input type="text" class="form-control" id="edit_title_en" name="titleeng">
                                        @error('titleeng')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_title_uz" class="form-label">News title (Uzbek)</label>
                                        <input type="text" class="form-control" id="edit_title_uz" name="titleuz">
                                        @error('titleuz')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_description_ru" class="form-label">News title (Russian)</label>
                                        <input type="text" class="form-control" id="edit_title_ru" name="titleru">
                                        @error('titleru')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_description_en" class="form-label">News Description
                                            (English)</label>
                                        <input type="text" class="form-control" id="edit_description_en"
                                            name="descriptioneng">
                                        @error('descriptioneng')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_description_uz" class="form-label">News Description (Uzbek)</label>
                                        <input type="text" class="form-control" id="edit_description_uz"
                                            name="descriptionuz">
                                        @error('descriptionuz')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_description_ru" class="form-label">News Description
                                            (Russian)</label>
                                        <input type="text" class="form-control" id="edit_description_ru"
                                            name="descriptionru">
                                        @error('descriptionru')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="category" class="form-label">Select Category</label>
                                        <select class="form-select" id="category" name="category_id">
                                            <option value="" disabled selected>Select a category</option>
                                            @foreach ($categories as $category)
                                                @php
                                                    $jsonString = trim($category['name'], '"');

                                                    $data = json_decode($jsonString, true);
                                                @endphp
                                                <option value="{{ $category->id }}">{{ $data[$lang] }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create New</button>
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
                        <h6 class="m-0 font-weight-bold text-primary">News Table</h6>
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
                                            <td>{{ $new->title[$lang] }}</td>
                                            <td>{{ $new->description[$lang] }}</td>
                                            <td>{{ $new->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <button class="btn btn-warning m-3" data-bs-toggle="modal"
                                                    data-bs-target="#editnewsModal{{ $new->id }}">Edit</button>

                                                <div class="modal fade" id="editnewsModal{{ $new->id }}"
                                                    tabindex="-1" aria-labelledby="editnewsModalLabel{{ $new->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editnewsModalLabel{{ $new->id }}">Edit
                                                                    Category</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('news-update', $new->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="edit_title_en_{{ $new->id }}"
                                                                            class="form-label">News title (English)</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_title_en_{{ $new->id }}"
                                                                            name="titleupdateeng"
                                                                            value="{{ $new->title['eng'] }}">
                                                                        @error('titleupdateeng')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="edit_title_uz_{{ $new->id }}"
                                                                            class="form-label">News title (Uzbek)</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_title_uz_{{ $new->id }}"
                                                                            name="titleupdateuz"
                                                                            value="{{ $new->title['uz'] }}">
                                                                        @error('titleupdateuz')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="edit_description_ru_{{ $new->id }}"
                                                                            class="form-label">News title (Russian)</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_title_ru_{{ $new->id }}"
                                                                            name="titleupdateru"
                                                                            value="{{ $new->title['ru'] }}">
                                                                        @error('titleupdateru')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="edit_description_en_{{ $new->id }}"
                                                                            class="form-label">News Description
                                                                            (English)
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_description_en_{{ $new->id }}"
                                                                            name="descriptionupdateeng"
                                                                            value="{{ $new->description['eng'] }}">
                                                                        @error('descriptionupdateeng')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="edit_description_uz_{{ $new->id }}"
                                                                            class="form-label">News Description
                                                                            (Uzbek)</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_description_uz_{{ $new->id }}"
                                                                            name="descriptionupdateuz"
                                                                            value="{{ $new->description['uz'] }}">
                                                                        @error('descriptionupdateuz')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="edit_description_ru_{{ $new->id }}"
                                                                            class="form-label">News Description
                                                                            (Russian)</label>
                                                                        <input type="text" class="form-control"
                                                                            id="edit_description_ru_{{ $new->id }}"
                                                                            name="descriptionupdateru"
                                                                            value="{{ $new->description['ru'] }}">
                                                                        @error('descriptionupdateru')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="category" class="form-label">Select Category</label>
                                                                        <select class="form-select" id="category" name="category_id">
                                                                            <option value="" disabled>Select a category</option>
                                                                            @foreach ($categories as $category)
                                                                                @php
                                                                                    $jsonString = trim($category['name'], '"');
                                                                                    $data = json_decode($jsonString, true);
                                                                                @endphp
                                                                                <option value="{{ $category->id }}" 
                                                                                    @if($category->id == ($new->category->id ?? null)) selected @endif>
                                                                                    {{ $data[$lang] }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('category_id')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    
                                                                    
                                                                    <button type="submit" class="btn btn-primary">Update
                                                                        New</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form action={{ route('category-delete', $new->id) }} method="POST"
                                                    style="display:inline;">
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
