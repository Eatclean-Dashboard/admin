@extends('admin')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <div class="mt-2 mb-5">
                                <h4 class="card-title">Edit Snack</h4>
                            </div>

                            <form action="{{ route('admin.updatesnack', $snack->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="fruit" value="{{ $snack->fruit }}">
                                            @if ($errors->has('fruit'))
                                                <div class=" text-danger text-start">{{ $errors->first('fruit') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Meal Plan <span class="text-danger">*</span></label>
                                            <select name="meal_plan_id" class="form-control" id="">
                                                @foreach ($mealplans as $mealplan)
                                                    @if ($mealplan->id == $snack->meal_plan_id)
                                                        <option value="{{ $mealplan->id }}" selected>{{ $mealplan->name }}</option>
                                                        @else
                                                        <option value="{{ $mealplan->id }}">{{ $mealplan->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('meal_plan_id'))
                                                <div class=" text-danger text-start">{{ $errors->first('meal_plan_id') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Calories <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="calories" value="{{ $snack->calories }}">
                                            @if ($errors->has('calories'))
                                                <div class=" text-danger text-start">{{ $errors->first('calories') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Carbs <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="carbs" value="{{ $snack->carbs }}">
                                            @if ($errors->has('carbs'))
                                                <div class=" text-danger text-start">{{ $errors->first('carbs') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Protein</label>
                                            <input type="text" class="form-control" name="protein" value="{{ $snack->protein }}">
                                            @if ($errors->has('protein'))
                                                <div class=" text-danger text-start">{{ $errors->first('protein') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Fat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="fat" value="{{ $snack->fat }}">
                                            @if ($errors->has('fat'))
                                                <div class=" text-danger text-start">{{ $errors->first('fat') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Image</label><br>
                                            <img src="{{ $snack->image }}" class="mb-3" width="80" height="80" alt="">
                                            <input type="file" class="form-control" name="image">
                                            @if ($errors->has('image'))
                                                <div class=" text-danger text-start">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">Edit Snack</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>

    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#ingredient').summernote();
            $('#procedure').summernote();
        });
    </script>
@endsection
