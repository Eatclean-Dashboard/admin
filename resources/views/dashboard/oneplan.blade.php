@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <div class="mt-2">
                                <h4 class="card-title">{{ $plan->name }}</h4>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <h5>Meal Plan</h5>
                                    <p>
                                        {{ $plan?->mealplan->name }}
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <h5>Type</h5>
                                    <p>
                                        {{ $plan->type }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Name</h5>
                                    <p>
                                        {{ $plan->name }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Ingredients</h5>
                                    <p>
                                        {!! $plan->ingredients !!}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Calories</h5>
                                    <p>
                                        {{ $plan->calories }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Price</h5>
                                    <p>
                                        {{ number_format($plan->price) }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Carbohydrate</h5>
                                    <p>
                                        {{ $plan->carbohydrate }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Protein</h5>
                                    <p>
                                        {{ $plan->protein }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Fat</h5>
                                    <p>
                                        {{ $plan->fat }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Procedure</h5>
                                    <p>
                                        {!! $plan->procedure !!}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Image Rectangular</h5>
                                    <p>
                                        <img src="{{ $plan->image_rectangular }}" width="100" height="100" alt="">
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Image Oval</h5>
                                    <p>
                                        <img src="{{ $plan->image_oval }}" width="100" height="100" alt="">
                                    </p>
                                </div>
                            </div><hr>

                            <div class="row mt-3">
                                <div class="col">
                                    <a href="{{ route('admin.editplan', $plan->id) }}"><button class="btn btn-success">Edit</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>

@endsection
