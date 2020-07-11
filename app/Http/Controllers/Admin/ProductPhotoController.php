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
        $photoName = $request->get('photoName');

        // verificar se a img ta dentro da pasta storage no disco public
        // Remover dos arquivos 
        if (Storage::disk('public')->exists($photoName)) {
            Storage::disk('public')->delete($photoName);
        }

        // Procurar no model onde o campo image seja igual ao q ta chegando na variavel photoName
        $removePhoto = ProductPhoto::where('image', $photoName);
        // pegando id do produto que possui a imagem q está sendo deletada
        $productId = $removePhoto->first()->product_id;

        // Remover img do banco
        $removePhoto->delete();

        flash('Imagem removida com sucesso!')->success();
        return redirect()->route('admin.products.edit', ['product' => $productId]);
    }
}
