@extends('main')
@section('title', 'Messages')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Enter Message</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="body">Message Body</label>
                                <input type="text" class="form-control" id="body" name="message" placeholder="Enter your message" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
