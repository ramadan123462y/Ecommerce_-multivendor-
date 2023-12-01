@extends('Admin.layouts.master')
@section('title')
    Add Prodcuts
@endsection
@section('css')
@endsection
@section('breadcrumb')
    Add Prodcuts
@endsection
@section('page')
    Add Prodcuts
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Products Sales</h5>
                        <!-- Default Tabs -->
                        <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-justified" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-justified" type="button" role="tab"
                                    aria-controls="profile" aria-selected="false">SEO Tages</button>
                            </li>

                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact-justified" type="button" role="tab"
                                    aria-controls="contact" aria-selected="false">Image</button>
                            </li>
                        </ul>
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="tab-content pt-2" id="myTabjustifiedContent">

                                <div class="tab-pane fade show active" id="home-justified" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <!-- General Form Elements -->

                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name" class="form-control">
                                            <x-inline-validation name="name"></x-inline-validation>
                                        </div>
                                    </div>

                                    <div class="row mb-3  justify-content-between   ">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Quintite:</label>
                                        <div class="col-sm-2">
                                            <input type="number" name="quantity" class="form-control">
                                            <x-inline-validation name="quantity"></x-inline-validation>
                                        </div>


                                        <label for="inputNumber" class="col-2 form-label">Slug:</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="slug" class="form-control">
                                            <x-inline-validation name="slug"></x-inline-validation>
                                        </div>

                                    </div>

                                    <div class="row  justify-content-between">
                                        <div class="col-4 mb-3">
                                            <label for="inputNumber" class="col-sm-4 col-form-label">Original price</label>
                                            <div class="col-sm-6">
                                                <input type="number" name="original_price" class="form-control">
                                                <x-inline-validation name="original_price"></x-inline-validation>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="inputNumber" class="col-sm-4 col-form-label">Selling Price</label>
                                            <div class="col-sm-6">
                                                <input type="number" name="selling_price" class="form-control">
                                                <x-inline-validation name="selling_price"></x-inline-validation>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Categorie</label>
                                        <div class="col-sm-6">
                                            <select class="form-select" name="categorie_id"
                                                aria-label="Default select example">
                                                <option disabled selected>Open this Categorie</option>

                                                @foreach (\App\Models\Categorie::all() as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                                @endforeach

                                            </select>
                                            <x-inline-validation name="categorie_id"></x-inline-validation>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Brand</label>
                                        <div class="col-sm-6">
                                            <select class="form-select" name="brand_id"
                                                aria-label="Default select example">
                                                <option disabled selected>Open this brand</option>
                                                @foreach (\App\Models\Brand::all() as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                                @endforeach

                                            </select>
                                            <x-inline-validation name="brand_id"></x-inline-validation>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">small
                                            Descreption</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="small_description" style="height: 60px"></textarea>
                                            <x-inline-validation name="small_description"></x-inline-validation>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Descreption</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="description" style="height: 60px"></textarea>
                                            <x-inline-validation name="description"></x-inline-validation>
                                        </div>
                                    </div>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="gridRadios1" value="1">

                                                <label class="form-check-label" for="gridRadios1">
                                                    Yes
                                                </label>
                                                <x-inline-validation name="status"></x-inline-validation>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="gridRadios2" value="0">

                                                <label class="form-check-label" for="gridRadios2">
                                                    No
                                                </label>
                                            </div>

                                        </div>
                                    </fieldset>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Trending</legend>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="trending"
                                                    id="gridRadios13" value="1">

                                                <label class="form-check-label" for="gridRadios13">
                                                    Yes
                                                </label>
                                                <x-inline-validation name="trending"></x-inline-validation>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="trending"
                                                    id="gridRadios24" value="0">

                                                <label class="form-check-label" for="gridRadios24">
                                                    No
                                                </label>
                                            </div>

                                        </div>
                                    </fieldset>









                                    <!-- End General Form Elements -->

                                </div>

                                <div class="tab-pane fade" id="profile-justified" role="tabpanel"
                                    aria-labelledby="profile-tab">

                                    <!-- General Form Elements -->

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Meta_title</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Meta
                                            Descreption</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" style="height: 50px"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Meta Keyword</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" style="height: 50px"></textarea>
                                        </div>
                                    </div>


                                    <!-- End General Form Elements -->



                                </div>


                                <div class="tab-pane fade" id="contact-justified" role="tabpanel"
                                    aria-labelledby="contact-tab">



                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="file" name="file[]" multiple
                                                id="formFile">
                                            <x-inline-validation name="file"></x-inline-validation>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Colore</label>
                                        <div class="col-sm-6">
                                            <select class="form-select" name="colore[]" multiple
                                                aria-label="multiple select example">
                                                @foreach (\App\Models\Colore::all() as $colore)

                                                <option value="{{ $colore->id }}" style="background-color:{{ $colore->colore }}; color:#fff;">
                                                Colore
                                                </option>

                                                @endforeach
                                            </select>
                                            <x-inline-validation name="colore"></x-inline-validation>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <label class="col-sm-10 col-form-label">Submit Button</label>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary">Submit Form</button>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- End Default Tabs -->
                        </form>

                    </div>

                </div>
            </div><!-- End Recent Sales -->

        </div>
    </section>
@section('scripts')
@endsection
@endsection
