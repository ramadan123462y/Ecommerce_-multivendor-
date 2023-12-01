@extends('Saller.layouts.master')
@section('title')
    Products
@endsection
@section('css')
<script src="https://cdn.tailwindcss.com"></script>

@endsection
@section('breadcrumb')
    Products
@endsection
@section('page')
    Products
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recent Products</h5>

                        <div>
                            <table class="table data-table ">
                                <thead>
                                    <tr>



                                        <th scope="col">Name</th>
                                        <th scope="col">Categorie</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>

                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->categorie->name }}</td>
                                            <td>{{ $product->quantity }}</td>



                                            <td>
                                                @if ($product->status == 1)
                                                    <span class="badge bg-success">Approved</span>
                                                @else
                                                    <span class="badge bg-danger">Reject</span>
                                                @endif
                                            </td>
                                            <td class="fw-bold">



                                                <a id="myButton2" href="{{ url('saller/product/delete', $product->id) }}"
                                                    class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>

                                                </form>
                                                <a class="btn btn-outline-warning"
                                                    href="{{ route('product.edit', $product->id) }}"><i
                                                        class="bi bi-calendar2-check"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>

                            <div >
                                {!! $products->links() !!}
                            </div>
                        </div>

                    </div>

                </div>
            </div><!-- End Recent Sales -->

        </div>
    </section>

@section('scripts')

@endsection
@endsection
