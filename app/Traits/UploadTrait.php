<?php
namespace App\Traits;

trait UploadTrait
{
    // função privada para ser reusada em mais de um lugar/função do controller. 
    private function imageUpload($images, $imageColumn = null)
    {
        $uploadImages = [];

        // usando metodo store para pegar somente o nome da img e a pasta q ela ta - salvando em um novo array;
        if(is_array($images)){
            foreach($images as $image) {
                $uploadImages[] = [$imageColumn => $image->store('products', 'public')];
            }
        } else {
            $uploadImages = $images->store('logo', 'public');
        }
        
        return $uploadImages;
    }
}
