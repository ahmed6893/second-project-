<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    private static $courier,$image,$imageName,$directory,$extension,$imgUrl;

    public static function saveCourier($request)
    {
        self::$courier = new Courier();
        self::$courier->name = $request->name;
        self::$courier->image = self::getImageUrl($request);
        self::$courier->save();
    }

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$extension = self::$image->extension();
        self::$imageName = rand().'.'.self::$extension;
        self::$directory ='admin/image/courier/';
        self::$image->move(self::$imageName,self::$directory);
        self::$imgUrl =self::$directory.self::$imageName;
        return self::$imgUrl;
    }
    public static function updateCourier($request,$id)
    {
        self::$courier = Brand::find($id);
        self::$courier->name = $request->name;

        if ($request->file('image'))
        {
            if (file_exists(self::$courier->image))
            {
                unlink(self::$courier->image);
            }
            self::$courier->image = self::getImageUrl($request);
        }
        self::$courier->save();
    }

    public static function deleteBrand($id)
    {
        self::$courier =Brand::find($id);
        if (self::$courier->image)
        {
            unlink(self::$courier->image);
        }
        self::$courier->save();
    }
}
