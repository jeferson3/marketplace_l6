<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function removePhoto(Request $request)
    {
        $name = $request->photoName;
        //remove imagem do disco

        if(Storage::disk('public')->exists($name)){
            Storage::disk('public')->delete($name);
        }

        // remove imagem do banco
        $photo = ProductPhoto::where('image', $name);
        $photo->delete();
        flash('Foto removida com sucesso')->success();

        return redirect()->back();
    }
}
