<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory,$image,$imageName,$directory,$imgUrl,$extension;

    public static function saveSubCategory($request)
    {
        self::$subCategory= new SubCategory();
        self::$subCategory->category_id  = $request->category_id;
        self::$subCategory->name         = $request->name;
        self::$subCategory->description  = $request->description;
        self::$subCategory->image        =self::getImageurl($request);
        self::$subCategory->save();
    }
    private static function getImageUrl($request)
    {
        self::$image     = $request->file('image');
        self::$extension =self::$image->extension();
        self::$imageName =rand().'.'.self::$extension;
        self::$directory ='admin/image/sub-category/';
        self::$imgUrl    =self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imgUrl;
    }

    public static function updateSubCategoryInfo($request ,$id)
    {
        self::$subCategory =SubCategory::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$subCategory->image))
            {
                unlink(self::$subCategory->image);
            }
            self::$imgUrl=self::getImageUrl($request);
        }
        else
        {
            self::$subCategory =self::$subCategory->image;
        }
        self::$subCategory->category_id  = $request->category_id;
        self::$subCategory->name         = $request->name;
        self::$subCategory->description  = $request->description;
        self::$subCategory->image        =self::$imgUrl;
        self::$subCategory->save();
    }
    public static function deleteSubCategory($id)
    {
        self::$subCategory =SubCategory::find($id);
        if (file_exists(self::$subCategory->image))
        {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }


}
