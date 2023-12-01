@extends('Admin.layouts.master')
@section('title')
   Transactions Payments
@endsection
@section('css')
    <script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('breadcrumb')
    Transactions Payments
@endsection
@section('page')
   Transactions Payments
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recent Transactions Payments</h5>

                        <div>
                            <table class="table data-table ">
                                <thead>
                                    <tr>
                                        <th scope="col">Id Tranaction</th>
                                        <th scope="col"> mount</th>
                                        <th scope="col">method</th>
                                        <th scope="col">currency</th>
                                        <th scope="col">Id Order Admin</th>
                                        <th scope="col"> Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->transaction_id }}</td>
                                            <td>{{ $transaction->mount }}</td>
                                            <td>{{ $transaction->method }}</td>
                                            <td>{{ $transaction->currency }}</td>


                                            {{-- ['pending', 'completed', 'failed', 'cancelled'] --}}
                                            <td>{{ $transaction->orderadmin_id }}</td>

                                            @if ($transaction->status == 'pending')
                                                <td><span class="badge bg-warning">Pending</span></td>
                                            @elseif ($transaction->status == 'completed')
                                                <td><span class="badge bg-success">completed</span></td>
                                            @else
                                                <td><span class="badge bg-danger">Rejected</span></td>
                                            @endif



                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>

                            <div>
                                {!! $transactions->links() !!}
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
