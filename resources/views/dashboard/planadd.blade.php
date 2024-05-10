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
                                <h4 class="card-title">Add Plan</h4>
                            </div>

                            <form action="{{ route('admin.createplan') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name">
                                            @if ($errors->has('name'))
                                                <div class=" text-danger text-start">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Type <span class="text-danger">*</span></label>
                                            <select name="type" class="form-control" id="">
                                                <option value="">Choose</option>
                                                <option value="breakfast">Breakfast</option>
                                                <option value="launch">Launch</option>
                                                <option value="dinner">Dinner</option>
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
                                                <option value="">Choose</option>
                                                @foreach ($mealplans as $mealplan)
                                                    <option value="{{ $mealplan->id }}">{{ $mealplan->name }}</option>
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
                                            <textarea id="ingredient" name="ingredients" class="form-control"></textarea>
                                            @if ($errors->has('ingredients'))
                                                <div class=" text-danger text-start">{{ $errors->first('ingredients') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Calories <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="calories">
                                            @if ($errors->has('calories'))
                                                <div class=" text-danger text-start">{{ $errors->first('calories') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="text" class="form-control" name="price">
                                            @if ($errors->has('price'))
                                                <div class=" text-danger text-start">{{ $errors->first('price') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Carbohydrate <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="carbohydrate">
                                            @if ($errors->has('carbohydrate'))
                                                <div class=" text-danger text-start">{{ $errors->first('carbohydrate') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Protein <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="protein">
                                            @if ($errors->has('protein'))
                                                <div class=" text-danger text-start">{{ $errors->first('protein') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Fat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="fat">
                                            @if ($errors->has('fat'))
                                                <div class=" text-danger text-start">{{ $errors->first('fat') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Procedure <span class="text-danger">*</span></label>
                                            <textarea name="procedure" id="procedure" class="form-control" cols="30" rows="10"></textarea>
                                            @if ($errors->has('procedure'))
                                                <div class=" text-danger text-start">{{ $errors->first('procedure') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Image Rectangular</label>
                                            <input type="file" class="form-control" name="image_rectangular">
                                            @if ($errors->has('image_rectangular'))
                                                <div class=" text-danger text-start">{{ $errors->first('image_rectangular') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Image Oval</label>
                                            <input type="file" class="form-control" name="image_oval">
                                            @if ($errors->has('image_oval'))
                                                <div class=" text-danger text-start">{{ $errors->first('image_oval') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">Add Plan</button>
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
