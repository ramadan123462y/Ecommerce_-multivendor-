<div>
    <section class="section">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">

                        <div class="row  justify-content-between">



                            <h5 class="card-title  col-4 text"> Brands</h5>
                            <div class="col-2 align-self-center ">

                                <button type="button" class="btn btn-outline-info col-8 " data-bs-toggle="modal"
                                    data-bs-target="#storemodel">Add Brand </button>
                            </div>
                        </div>

                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Process</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($prands as $prand)
                                    <tr>

                                        <th scope="row">{{ $prand->id }}</th>
                                        <td>{{ $prand->name }}</td>
                                        <td>{{ $prand->slug }}</td>

                                        <td>
                                            @if ($prand->status == true)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Un Active</span>
                                            @endif

                                        </td>
                                        <td class="fw-bold">
                                            <button type="button" id="myButton2"
                                                wire:click="delete({{ $prand->id }})"
                                                class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>

                                            <button type="button" class="btn btn-outline-warning"
                                                wire:click="editbrand({{ $prand->id }})" data-bs-toggle="modal"
                                                data-bs-target="#editmodel"><i
                                                    class="bi bi-calendar2-check"></i></button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div>
                            {{ $prands->links() }}
                        </div>
                    </div>

                </div>
            </div><!-- End Recent Sales -->

        </div>

       @include('livewire.admin.brand.model_store')
        @include('livewire.admin.brand.model_edit')
        {{-- end model add --}}
    </section>
</div>
