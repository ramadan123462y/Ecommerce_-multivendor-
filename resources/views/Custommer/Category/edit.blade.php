@extends('Admin.layouts.master')
@section('title')
    Update Category
@endsection
@section('css')
    @livewireStyles
@endsection
@section('breadcrumb')
    Update Category
@endsection
@section('page')
    Update Category
@endsection
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">
                        {{-- ---------------- --}}


                        {{-- ----------------- --}}
                        <h5 class="card-title"> Update Category</h5>
                        <a type="button" href="#" class="btn btn-outline-info ">Categories</a>

                        <!-- General Form Elements -->
                        <form action="{{ url('admin/categorie/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{ $categorie->name }}" name="name"
                                            class="form-control">
                                        <x-inline-validation name="name"></x-inline-validation>
                                        <input type="hidden" value="{{ $categorie->id }}" name="id"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="inputText" class="col-sm-2 col-form-label">Slug</label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{ $categorie->slug }}" name="slug"
                                            class="form-control">
                                        <x-inline-validation name="slug"></x-inline-validation>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-12">
                                        <input type="file" value="" class="form-control" name="file_name"
                                            id="formFile">
                                        <x-inline-validation name="file_name"></x-inline-validation>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" {{ $categorie->status ==1 ? 'checked' : '' }}
                                                name="status" value="1" type="checkbox" id="flexSwitchCheckDefault">
                                            <x-inline-validation name="status"></x-inline-validation>

                                            <label class="form-check-label" for="flexSwitchCheckDefault">switch
                                                Status</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" value="{{ $categorie->description }}" name="description"
                                            style="height:50px">
                                        <x-inline-validation name="description"></x-inline-validation>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">popular</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" {{ $categorie->popular ==1 ? 'checked' : '' }}
                                                value="1" name="popular" type="checkbox" id="flexSwitchCheckDefault">
                                            <x-inline-validation name="popular"></x-inline-validation>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">switch
                                                popular</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <h4 style="color:dodgerblue">
                                        <br>
                                        SEO TAGES
                                    </h4>
                                </div>

                                <div class="col-6">
                                    <label for="inputText" class="col-sm-4 col-form-label">Meta Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="meta_title" value="{{ $categorie->meta_title }}"
                                            class="form-control">
                                        <x-inline-validation name="meta_title"></x-inline-validation>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="inputText" class="col-sm-4 col-form-label">Meta Keyword</label>
                                    <div class="col-sm-12">
                                        <input type="text" value="{{ $categorie->meta_keywords }}" name="meta_keywords"
                                            class="form-control">
                                        <x-inline-validation name="meta_keywords"></x-inline-validation>
                                    </div>
                                </div>






                                <div class="col-10">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Meta Description</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" name="meta_descrip"
                                            value="{{ $categorie->meta_descrip }}" style="height:50px">
                                        <x-inline-validation name="meta_descrip"></x-inline-validation>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <br><br>
                                    <div class="col-sm-12">
                                        <button type="submit" id="myButton1" class="btn btn-primary float-end ">Submit
                                            Form</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End General Form Elements -->


                    </div>
                </div>

            </div>


        </div>
    </section>

    </div>

    </div>
    </div><!-- End Recent Sales -->

    </div>
    </section>
    @livewireScripts
@section('scripts')
@endsection
@endsection
