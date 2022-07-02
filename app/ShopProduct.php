<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ShopProduct extends Model implements HasMedia
{
    use Sluggable,InteractsWithMedia;

    protected $guarded=[];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
//        https://spatie.be/docs/laravel-medialibrary/v9/converting-images/defining-conversions/
        $this->addMediaConversion('thumb')
            ->width(199)
            ->height(100)
            ->performOnCollections('images')
            ->nonQueued();
    }
}
