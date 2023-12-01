@extends('Admin.layouts.master')
@section('title')
    Colore
@endsection
@section('css')
    @livewireStyles
@endsection
@section('breadcrumb')
    Colore
@endsection
@section('page')
    Colore
@endsection
@section('content')
 @livewire('colore')

    @livewireScripts
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.addEventListener('close', event => {
            $('#storemodel').modal('hide');
        });
        window.addEventListener('close', event => {
            $('#editmodel').modal('hide');
        });
    </script>

    <script>
        window.addEventListener('unactive', event => {
            $("#myButton_colore").prop("disabled", true);
        });
    </script>
    <script>
        window.addEventListener('active', event => {
            $("#myButton_colore").prop("disabled", false);
        });
    </script>
@endsection
