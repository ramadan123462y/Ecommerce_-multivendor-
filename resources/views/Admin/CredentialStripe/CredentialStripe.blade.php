@extends('Admin.layouts.master')
@section('title')
    Add Credential Stripe
@endsection
@section('css')
@endsection
@section('breadcrumb')
    Add Credential Stripe
@endsection
@section('page')
    Add Credential Stripe
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Credential Stripe  (Integration Your Payment)</h5>


                        <form action="" method="POST">
                            <div class="tab-content pt-2" id="myTabjustifiedContent">

                                <div class="tab-pane fade show active" id="home-justified" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <!-- General Form Elements -->

                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Publishable key</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="Publishable_key" class="form-control">
                                            <x-inline-validation name="Publishable_key"></x-inline-validation>
                                        </div>

                                        {{-- <div class="row mb-3"> --}}
                                        <label for="inputText" class="col-sm-2 col-form-label">Secret key</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="Secret_key" class="form-control">
                                            <x-inline-validation name="Secret_key"></x-inline-validation>
                                        </div>
                                        {{-- </div> --}}

                                    </div>


                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@section('scripts')
@endsection
@endsection
