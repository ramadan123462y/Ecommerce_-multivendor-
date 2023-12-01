<div>
    <section class="section">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">

                        <div class="row  justify-content-between">



                            <h5 class="card-title  col-4 text"> Colores</h5>
                            <div class="col-2 align-self-center ">

                                <button type="button" class="btn btn-outline-info col-6 " data-bs-toggle="modal"
                                    data-bs-target="#storemodel">Add Colores </button>
                            </div>
                        </div>

                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">colore</th>

                                    <th scope="col">Process</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($colores as $colore)
                                    <tr>

                                        <th scope="row">{{ $colore->id }}</th>
                                        <td>
                                            <input type="color"
                                                class="form-control form-control-color" readonly value="{{ $colore->colore }}">
                                        </td>
                                        <td class="fw-bold">
                                            <button type="button" id="myButton2"
                                                wire:click="delete({{ $colore->id }})"
                                                class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>

                                            <button type="button" class="btn btn-outline-warning"
                                                wire:click="edit_colore({{ $colore->id }})" data-bs-toggle="modal"
                                                data-bs-target="#editmodel"><i
                                                    class="bi bi-calendar2-check"></i></button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                        <div>
                            {{ $colores->links() }}
                        </div>
                    </div>

                </div>
            </div><!-- End Recent Sales -->

        </div>

@include('livewire.admin.model_add_colore')

       @include('livewire.admin.model_edit_colore')
    </section>
</div>
