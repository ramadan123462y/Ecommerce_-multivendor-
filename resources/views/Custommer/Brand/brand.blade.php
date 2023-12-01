@extends('Admin.layouts.master')
@section('title')
    Brands
@endsection
@section('css')
    @livewireStyles
@endsection
@section('breadcrumb')
    Brands
@endsection
@section('page')
    Brands
@endsection
@section('content')
    @livewire('admin.brand.brand')

    @livewireScripts
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


window.addEventListener('close', event => {
    $('#editmodel').modal('hide');
});
window.addEventListener('close', event => {
    $('#storemodel').modal('hide');
});

</script>



@endsection
