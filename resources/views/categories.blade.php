@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Post Categories</h1>

    {{-- <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="coll-md-4">
                    <div class="card bg-dark text-white">
                        <img src="https://source.unsplash.com/200x200?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                        <div class="card-img-overlay">
                            <h5 class="card-title"><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}


    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/posts?category={{ $category->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/200x200?{{ $category->name }}" class="card-img"
                                alt="{{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title flex-fill text-center p-4 fs-3"
                                    style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
