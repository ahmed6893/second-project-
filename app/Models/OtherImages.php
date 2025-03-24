<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\New_;

class OtherImages extends Model
{
    use HasFactory;
    private static $newImages,$newImage,$productImages,$image,$imageName,$directory,$extension,$imageUrl;

    private static function getImageUrl($image)
    {

        self::$extension = $image->extension();
        self::$imageName = rand(000,999).'.'.self::$extension;
        self::$directory = 'admin/images/others-product/';
        $image->move (self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function productOthersImages($images , $productId)
    {
        foreach ($images as $image)
        {
            self::$imageUrl = self::getImageUrl($image);
            self::$productImages = new OtherImages();
            self::$productImages->product_id = $productId;
            self::$productImages->image =self::$imageUrl;
            self::$productImages->save();
        }
    }
    public static function updateOthersImages($images ,$productId)
    {
        self::$newImages = OtherImages::where('product_id',$productId)->get();
         foreach (self::$newImages as self::$newImage)
         {
             if (file_exists(self::$newImage->images))
             {
                 unlink(self::$newImage->images);
             }
             self::$newImage->delete();
         }

        foreach ($images as $image)
        {
            self::$imageUrl = self::getImageUrl($image);
            self::$productImages = new OtherImages();
            self::$productImages->product_id = $productId;
            self::$productImages->image =self::$imageUrl;
            self::$productImages->save();
        }
    }
}
