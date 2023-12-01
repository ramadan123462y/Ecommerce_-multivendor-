<?php


namespace App\Http\Traits;

trait ImageTrait
{

    function upload_image($name_input, $request_form, $folder, $disk_name)
    {

        return $request_form->file($name_input)->storeAs($folder, $request_form->file($name_input)->getClientOriginalName(), $disk_name);
    }
    public function upload_multi_image($value_image, $folder, $disk)
    {

      return  $value_image->storeAs($folder, $value_image->getClientOriginalName(), $disk);
    }

    public function delete_image($public_path)
    {


        if (file_exists(public_path($public_path))) {

            return  unlink(public_path($public_path));
        }
    }
}
