<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategorieRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategorieController extends Controller
{
    use ImageTrait;
    public function edit($id)
    {
        $categorie =  Categorie::find($id);
        return view('Admin.Category.edit', compact('categorie'));
    }


    public function update(UpdateCategorieRequest $request)
    {
        Categorie::where('status', 1)->where('status', 0);


        try {
            $categorie = Categorie::find($request->id);
            if ($request->hasFile('file_name')) {
                $this->delete_image('images\categories\\' . $categorie->file_name);
                $this->upload_image('file_name', $request, 'categories', 'images');
            }
            $categorie->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'status' => $request->status == 1 ? 1 : 0,
                'popular' => $request->popular == 1 ? 1 : 0,
                'meta_title' => $request->meta_title,
                'meta_descrip' => $request->meta_descrip,
                'meta_keywords' => $request->meta_keywords,
                'file_name' => ($request->hasFile('file_name')) ? $request->file('file_name')->getClientOriginalName() : $categorie->file_name
            ]);
            flash()->addSuccess("Categorie Updated Sucessfully");
            return redirect('admin/categorie');
        } catch (\Exception $e) {

            flash()->addError("error not Updated");
        }
    }
}
