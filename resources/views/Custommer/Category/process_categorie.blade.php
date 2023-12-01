@extends('Admin.layouts.master')
@section('title')
Category
@endsection
@section('css')
@livewireStyles
@endsection
@section('breadcrumb')
Category
@endsection
@section('page')
Category
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recent Category</h5>

                        <livewire:process-categorie />
                    </div>

                </div>
            </div><!-- End Recent Sales -->

        </div>
    </section>
    @livewireScripts
@section('scripts')


@endsection
@endsection
