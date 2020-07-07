<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadTrait
{

    private function imageUpload($images, $imageColumn = null)
    {
        $imagesList = [];

        if(is_array($images)){

            foreach ($images as $image) {
                    $imagesList[] = [$imageColumn => $image->store('products', 'public')];
                    }
        } else {
            $imagesList = $images->store('logo', 'public');
        }
    
        return $imagesList;
    }
}
