@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 border-bottom">
                            <div class="mt-2">
                                <h4>{{ $mealPlan->name }}</h4>
                                <p>{{ $mealPlan->description }}</p>
                            </div>
                        </div>
                        @forelse ($groupedPlans as $type => $plans)
                            <h5>{{ $type }}</h5>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Ingredients</th>
                                            <th>Calories</th>
                                            <th>Price</th>
                                            <th>Carbohydrate</th>
                                            <th>Protein</th>
                                            <th>Fat</th>
                                            <th>Procedure</th>
                                            <th>Image Rectangular</th>
                                            <th>Image Oval</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($plans as $mealplan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $mealplan->name }}</td>
                                                <td>{{ $mealplan->ingredients }}</td>
                                                <td>{{ $mealplan->calories }}</td>
                                                <td>{{ $mealplan->price }}</td>
                                                <td>{{ $mealplan->carbohydrate }}</td>
                                                <td>{{ $mealplan->protein }}</td>
                                                <td>{{ $mealplan->fat }}</td>
                                                <td>{{ $mealplan->procedure }}</td>
                                                <td><img src="{{ $mealplan->image_rectangular }}" width="50" height="50" alt=""></td>
                                                <td><img src="{{ $mealplan->image_oval }}" width="50" height="50" alt=""></td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="9">No data available.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @empty
                            <h5>No data available.</h5>
                        @endforelse

                        <h5>Snacks</h5>
                        <div class="table-responsive">
                            <table id="datatable-snacks" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fruit</th>
                                        <th>Calories</th>
                                        <th>Carbs</th>
                                        <th>Protein</th>
                                        <th>Fat</th>
                                        <th>Images</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($snacks as $snack)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $snack->fruit }}</td>
                                            <td>{{ $snack->calories }}</td>
                                            <td>{{ $snack->carbs }}</td>
                                            <td>{{ $snack->protein }}</td>
                                            <td>{{ $snack->fat }}</td>
                                            <td><img src="{{ $snack->image }}" width="80" height="80" alt=""></td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="9">No data available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>

@endsection
