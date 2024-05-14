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
                            </div>
                        </div>
                        @forelse ($groupedPlans as $type => $plans)
                            <h5>{{ $type }}</h5>
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
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="9">No data available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @empty
                            <h5>No data available.</h5>
                        @endforelse

                        <h5>Snacks</h5>
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
            <!-- end col -->
        </div>
    </div>

@endsection
