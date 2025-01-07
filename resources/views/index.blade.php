@extends('main')
@section('title')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{__('menyu.dashbord')}}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

      
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Categories Section -->
        @php
            $test = app()->getLocale();
            $lang = session('lang');
        @endphp
        <div class="col-xl-12 col-lg-7 mb-4">
            <div class="card shadow">
                <!-- Card Body -->
                <div class="card-body d-flex flex-wrap justify-content-start">
                    @foreach ($categories as $category)
                        <a href={{route('choose',['category'=>$category])}} class="btn btn-primary btn-sm mr-2 mb-2">
                            @php
                                $jsonString = trim($category['name'], '"');

                                $data = json_decode($jsonString, true);
                            @endphp
                            {{ $data[$lang] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Area Chart (News Section) -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yangiliklar</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    @foreach ($news as $new)
                        <div class="mb-3">
                            <h5 class="text-primary">{{ $new->title[$lang] }}</h5>
                            <p class="text-muted">{{ $new->description[$lang] }}</p>
                        </div>
                        <hr>
                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                        {{ $news->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>




    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">

                <div class="card-body">

                </div>
            </div>

            <!-- Color System -->
            <div class="row">

            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">

            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">

            </div>

        </div>
    </div>

</div>
@endsection