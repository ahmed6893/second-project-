<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category,$image,$imageName,$directory,$imgUrl,$extension;

    public static function saveCategory($request)
    {
        self::$category= new Category();
        self::$category->name  = $request->name;
        self::$category->image =self::getImageurl($request);
        self::$category->save();
    }
    private static function getImageUrl($request)
    {
        self::$image     = $request->file('image');
        self::$extension =self::$image->extension();
        self::$imageName =rand().'.'.self::$extension;
        self::$directory ='admin/image/category/';
        self::$imgUrl    =self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imgUrl;
    }

    public static function updateCategoryInfo($request ,$id)
    {
        self::$category =Category::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imgUrl = self::getImageUrl($request);
        }
        else
        {
            self::$category =self::$category->image;
        }
        self::$category->name  = $request->name;
        self::$category->image =self::$imgUrl;
        self::$category->save();
    }
    public static function deleteCategory($id)
    {
        self::$category =Category::find($id);
        if (file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();

    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

}
