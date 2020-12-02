<?php

namespace App\Http\Services;

use Validator;

class ImageService {

    public function upload($request){
        //стандартный размер upload_max_filesize = 2M post_max_size = 8M // У меня в php.ini 10мб
        $validation = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:10000'
        ]);

        if($validation->passes())
        {
            $image = $request->file('image');
            $new_name = $image->getClientOriginalName();
            // Картинки сохраняются сразу в папку public/images что бы не настраивать config/filesystems.php и не делать php artisan storage:link
            $image->move(public_path('/images'), $new_name);

            return response()->json([
                'message'   => 'Изображение загружено',
                'src' => '/images/'.$new_name.'',
                'class_name'  => 'alert-success'
            ]);
        }
        else
        {
            return response()->json([
//                'message'   => $validation->errors(),
                'message' => 'Произошла ошибка при загрузке',
                'image' => '',
                'class_name'  => 'alert-danger'
            ]);
        }

    }

}
