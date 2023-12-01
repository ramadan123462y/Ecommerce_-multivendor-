@extends('Admin.layouts.master')
@section('title')
    Slider
@endsection
@section('css')
@endsection
@section('breadcrumb')
    Slider
@endsection
@section('page')
    Slider
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">

                        <div class="row  justify-content-between">



                            <h5 class="card-title  col-4 text"> Slider</h5>
                            <div class="col-2 align-self-center ">

                                <button type="button" class="btn btn-outline-info col-8 " data-bs-toggle="modal"
                                    data-bs-target="#storemodel">Add Slider </button>
                            </div>
                        </div>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">image</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sliders as $slider)
                                    <tr>

                                        <td scope="row">{{ $slider->id }}</td>
                                        <td scope="row"><img width="50px"
                                                src="{{ URL::asset('images/sliders' . '/' . $slider->file_path) }}"
                                                alt=""></td>
                                        <td class="fw-bold">


                                            <form action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                                @csrf
                                                @method('delete')

                                                <button id="myButton2" href="{{ route('slider.destroy', $slider->id) }}"
                                                    class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>

                                            </form>





                                        </td>


                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div>

                        </div>
                    </div>

                </div>
            </div><!-- End Recent Sales -->

        </div>

        {{-- model start  --}}

        {{-- model add --}}
        <div class="modal fade" id="storemodel" tabindex="-1" aria-labelledby="storemodel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">



                        <h5 class="modal-title" id="storemodel">Add Slider</h5>


                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">

                                <label for="recipient-name" class="col-form-label">Image:</label>

                                <input type="file" class="form-control" name="file_path" id="formFile">

                                <x-inline-validation name="file_path"></x-inline-validation>
                            </div>


                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- edit modle  --}}



    </section>
@endsection
@section('scripts')
@endsection
