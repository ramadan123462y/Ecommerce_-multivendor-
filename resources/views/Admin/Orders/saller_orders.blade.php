@extends('Admin.layouts.master')
@section('title')
   Sallers  Orders
@endsection
@section('css')
    <script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('breadcrumb')
    Sallers Orders
@endsection
@section('page')
   Sallers  Orders
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recent Sallers Orders</h5>

                        <div>
                            <table class="table data-table ">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>

                                        <th scope="col">Payment Status</th>
                                        <th scope="col"> Total</th>
                                        <th scope="col">customer</th>
                                        <th scope="col">payment_method</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Status Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->payment_status }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->customer->name }}</td>
                                            <td>{{ $order->payment_method }}</td>




                                            @if ($order->status == 'pending')
                                                <td><span class="badge bg-warning">Pending</span></td>
                                            @elseif ($order->status == 'completed')
                                                <td><span class="badge bg-success">completed</span></td>
                                            @else
                                                <td><span class="badge bg-danger">Rejected</span></td>
                                            @endif

                                            @if ($order->payment_status == 'pending')
                                                <td><span class="badge bg-warning">Pending</span></td>
                                            @elseif ($order->payment_status == 'paid')
                                                <td><span class="badge bg-success">Paid</span></td>
                                            @else
                                                <td><span class="badge bg-danger">Rejected</span></td>
                                            @endif

                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>

                            <div>
                                {!! $orders->links() !!}
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
