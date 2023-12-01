<div>
    <table class="table table-borderless ">
        <thead>
            <tr>
                <th scope="col">#</th>

                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">process</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                    <th scope="row"><a href="#"><img
                                src="{{ URL::asset('images/categories' . '/' . $categorie->file_name) }}" alt=""
                                width="50"></a></th>
                    <td><a href="#" class="text-primary fw-bold">{{ $categorie->name }}</a></td>

                    <td>
                        @if ($categorie->status == 1)
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Reject</span>
                        @endif
                    </td>
                    <td class="fw-bold">
                        <button type="button" id="myButton2" wire:click="delete({{ $categorie->id }})"
                            class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                        <a class="btn btn-outline-warning" href="{{ url('admin/categorie/edit', $categorie->id) }}"><i
                                class="bi bi-calendar2-check"></i></a>
                    </td>

                </tr>
            @endforeach



        </tbody>
    </table>
    <div>
        {{ $categories->links() }}
    </div>
</div>
