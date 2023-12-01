<?php

namespace App\Http\Livewire;

use App\Http\Traits\ImageTrait;
use App\Models\Categorie;
use Livewire\Component;
use Livewire\WithPagination;

class ProcessCategorie extends Component
{
    use ImageTrait;
    use WithPagination;



    public $paginationTheme = 'bootstrap';
    public function render()
    {
        $categories = Categorie::paginate(5);
        return view('livewire.process-categorie', ['categories' => $categories]);
    }
    public function delete($id)
    {
        try {
            $categorie = Categorie::find($id);
            $this->delete_image('images\categories\\' . $categorie->file_name);
            sweetalert()->addSuccess('Categorie deleted Sucessfully');
            $categorie->delete();
        } catch (\Exception $e) {

            flash()->addError("error click 2 Deleted please click one ");
        }
    }
}
