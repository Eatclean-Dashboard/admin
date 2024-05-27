@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="mt-2">
                                <h4 class="card-title">{{ $blog->title }}</h4>
                                @php
                                    $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info',];
                                    $colorIndex = 0;
                                @endphp
                                <div class="d-flex gap-3 mb-3">
                                    <p>
                                        Category: <span class="badge badge-success bg-success card-title">{{ $blog->blogcategory->name }}</span>
                                    </p>
                                    <p>
                                        Tags:
                                        @foreach (json_decode($blog->tags) as $tag)
                                            <span class="badge badge-{{ $colors[$colorIndex % count($colors)] }} bg-{{ $colors[$colorIndex % count($colors)] }} card-title">{{ $tag }}</span>
                                            @php $colorIndex++; @endphp
                                        @endforeach
                                    </p>
                                </div>

                                <div>
                                    <img src="{{ $blog->image }}" class="img-fluid" style="width: 400px; height: 250px;" alt="">
                                    <p>{!! $blog->content !!}</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
@endsection
