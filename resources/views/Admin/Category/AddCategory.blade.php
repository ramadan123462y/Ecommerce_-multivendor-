@extends('Admin.layouts.master')
@section('title')
    Add Category
@endsection
@section('css')
    @livewireStyles
@endsection
@section('breadcrumb')
    Add Category
@endsection
@section('page')
    Add Category
@endsection
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">
                        {{-- ---------------- --}}


                        {{-- ----------------- --}}
                        <h5 class="card-title"> Add Category</h5>
                        <a type="button" href="{{ url('admin/categorie') }}" class="btn btn-outline-info ">Categories</a>

                        <livewire:categorie />

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.addEventListener('unactive', event => {
            $("#myButton1").prop("disabled", true);
        });
    </script>
    <script>
        window.addEventListener('active', event => {
            $("#myButton1").prop("disabled", false);
        });
    </script>
@endsection
@endsection
