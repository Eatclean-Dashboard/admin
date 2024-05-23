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
                                <h4 class="card-title">Update Plan</h4>
                            </div>

                            <form action="{{ route('admin.updateplan', $plan->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" value="{{ $plan->name }}">
                                            @if ($errors->has('name'))
                                                <div class=" text-danger text-start">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Type <span class="text-danger">*</span></label>
                                            <select name="type" class="form-control" id="">
                                                <option value="breakfast" {{ $plan->type === 'breakfast' ? ' selected' : '' }}>Breakfast</option>
                                                <option value="launch" {{ $plan->type === 'launch' ? ' selected' : '' }}>Launch</option>
                                                <option value="dinner" {{ $plan->type === 'dinner' ? ' selected' : '' }}>Dinner</option>
                                            </select>
                                            @if ($errors->has('type'))
                                                <div class=" text-danger text-start">{{ $errors->first('type') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Meal Plan <span class="text-danger">*</span></label>
                                            <select name="meal_plan_id" class="form-control" id="">
                                                @foreach ($mealplans as $mealplan)
                                                    @if ($mealplan->id == $plan->meal_plan_id)
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
                                            <label class="form-label">Ingredients <span class="text-danger">*</span></label>
                                            <textarea id="ingredient" name="ingredients" class="form-control">{{ $plan->ingredients }}</textarea>
                                            @if ($errors->has('ingredients'))
                                                <div class=" text-danger text-start">{{ $errors->first('ingredients') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Calories <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="calories" value="{{ $plan->calories }}">
                                            @if ($errors->has('calories'))
                                                <div class=" text-danger text-start">{{ $errors->first('calories') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="text" class="form-control" name="price" value="{{ $plan->price }}">
                                            @if ($errors->has('price'))
                                                <div class=" text-danger text-start">{{ $errors->first('price') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Carbohydrate <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="carbohydrate" value="{{ $plan->carbohydrate }}">
                                            @if ($errors->has('carbohydrate'))
                                                <div class=" text-danger text-start">{{ $errors->first('carbohydrate') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Protein <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="protein" value="{{ $plan->protein }}">
                                            @if ($errors->has('protein'))
                                                <div class=" text-danger text-start">{{ $errors->first('protein') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Fat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="fat" value="{{ $plan->fat }}">
                                            @if ($errors->has('fat'))
                                                <div class=" text-danger text-start">{{ $errors->first('fat') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Procedure <span class="text-danger">*</span></label>
                                            <textarea name="procedure" id="procedure" class="form-control" cols="30" rows="10">{{ $plan->procedure }}</textarea>
                                            @if ($errors->has('procedure'))
                                                <div class=" text-danger text-start">{{ $errors->first('procedure') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Image Rectangular</label><br>
                                            <img src="{{ $plan->image_rectangular }}" class="mb-3" width="80" height="80" alt="">
                                            <input type="file" class="form-control" name="image_rectangular">
                                            @if ($errors->has('image_rectangular'))
                                                <div class=" text-danger text-start">{{ $errors->first('image_rectangular') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Image Oval</label><br>
                                            <img src="{{ $plan->image_oval }}" class="mb-3" width="80" height="80" alt="">
                                            <input type="file" class="form-control" name="image_oval">
                                            @if ($errors->has('image_oval'))
                                                <div class=" text-danger text-start">{{ $errors->first('image_oval') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">Update Plan</button>
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
