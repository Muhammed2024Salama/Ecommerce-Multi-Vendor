<?php

namespace Ecommerce\Base\Traits;

use Illuminate\Http\Request;

trait ImageUploadTrait {

    /**
     * @param Request $request
     * @param $inputName
     * @param $path
     * @return string|void
     */
    public function uploadImage(Request $request, $inputName, $path)
    {
        if ($request->hasFile($inputName)) {
            $image = $request->file($inputName);
            $extension = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $extension;

            $image->move(public_path($path), $imageName);

            return '/uploads/' . $imageName;
        }
    }

}
