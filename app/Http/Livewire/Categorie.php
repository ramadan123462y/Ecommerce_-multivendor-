<?php

namespace App\Http\Livewire;

use App\Models\Categorie as ModelsCategorie;
use Livewire\Component;
use Livewire\WithFileUploads;

class Categorie extends Component
{
    use WithFileUploads;

    public $name,
        $slug,

        $status,
        $description,
        $popular,
        $meta_title,
        $meta_keywords,
        $meta_descrip,
        $file_name;


    protected $rules = [
        'name' => 'required|unique:categories,name',
        'slug' => 'required',
        'description' => 'required',

        'meta_title' => 'required',
        'meta_keywords' => 'required',
        'meta_descrip' => 'required',
        'slug' => 'required',
        'file_name' => 'required'
    ];
    public function render()
    {
        return view('livewire.categorie');
    }


    public function store()
    {
        $this->dispatchBrowserEvent('unactive');

        $this->validate();

        try {

            ModelsCategorie::create([

                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
                'status' => ($this->status == 1) ? 1 : 0,
                'popular' => ($this->popular == 1) ? 1 : 0,
                'meta_title' => $this->meta_title,
                'meta_descrip' => $this->meta_descrip,
                'meta_keywords' => $this->meta_keywords,
                'file_name' => $this->file_name->getClientOriginalName(),

            ]);
            $image_name = $this->file_name->getClientOriginalName();
            $this->file_name->storeAs('categories', $image_name, 'images');
            $this->setempty();
            $this->dispatchBrowserEvent('active');
            $this->message("Categorie Aded Sucessfully");
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('active');
            flash()->addError($e->getMessage());
        }
    }
    public function message($contact)
    {

        return  flash()->addSuccess($contact);
    }
    public function setempty()
    {

        $this->name = '';
        $this->slug = '';
        $this->status = '';
        $this->description = '';
        $this->popular = '';
        $this->meta_title = '';
        $this->meta_keywords = '';
        $this->meta_descrip = '';
        $this->file_name == null;
    }
}
