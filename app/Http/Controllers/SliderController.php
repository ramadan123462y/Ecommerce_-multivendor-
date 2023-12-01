<?php

namespace App\Http\Controllers;

use App\Http\Traits\ImageTrait;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $sliders = Slider::all();
        return view('Admin.Slider.slider', compact('sliders'));
    }


    public function create()
    {
    }

    public function store(Request $request)
    {
        if (!isset($request->file_path)) {
            flash()->adderror("Noty have file ");
            return redirect()->back();
        }
        Slider::create([
            'file_path' => $request->file('file_path')->getClientOriginalName()
        ]);
        $this->upload_image('file_path', $request, 'sliders', 'images');
        flash()->addSuccess("Slider Ades Sucessfully");
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }







    public function destroy($id)
    {
        try {
            $slider = Slider::find($id);
            if ($slider) {
                $slider->delete();
                flash()->addSuccess("Slider Deleted Sucessfully");
            } else {
                flash()->addError("error click 2 Deleted please click one ");
            }
        } catch (\Exception $e) {

            flash()->addError("error click 2 Deleted please click one ");
        }



        return redirect()->back();
    }
}
