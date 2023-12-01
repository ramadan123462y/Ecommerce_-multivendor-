<?php

namespace App\Http\Livewire;

use App\Models\Colore as ModelsColore;
use Livewire\Component;
use Livewire\WithPagination;

class Colore extends Component
{
    use WithPagination;

    public $colore;
    public $colore_id;
    protected $paginationTheme = 'bootstrap';
    // public $colores=[];
    public function render()
    {

        $colores = ModelsColore::paginate(5);
        // $this->colores = $colores;
        return view('livewire.colore', ['colores' => $colores]);
    }


    public function store()
    {
        try {
            ModelsColore::create([


                'colore' => $this->colore
            ]);

            flash()->addSuccess('Colore Aded Sucessfully');
        } catch (\Exception $e) {
            flash()->adderror('Colore Not added');
        }
    }


    // edit_colore({{ $colore->id }})
    public function edit_colore($colore_id)
    {
        $this->colore_id = $colore_id;
        $this->colore = ModelsColore::find($colore_id)->colore;
    }

    public function update_colore()
    {

        ModelsColore::find($this->colore_id)->update([


            'colore' => $this->colore

        ]);

        flash()->addSuccess('Colore Updated  Sucessfully');
    }


    public function delete($colore_id)
    {



        ModelsColore::find($colore_id)->delete();

        sweetalert()->addSuccess('Your file may not have been Deleted.');
    }
}
