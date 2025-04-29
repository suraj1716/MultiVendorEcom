<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{

use InteractsWithMedia;

protected $casts=[
    'variations'=>'array'
];


public function registerMediaCollections(): void
{
    $this->addMediaCollection('images')
         ->useDisk('public'); // optional, if you want to be sure
}

public function registerMediaConversions(?Media $media=null):void
{
    $this->addMediaConversion('thumb')
    ->width(100)
    ->performOnCollections('images') ;
    $this->addMediaConversion('small')
    ->width(480)
    ->performOnCollections('images') ;
    $this->addMediaConversion('large')
    ->width(1200)
    ->performOnCollections('images');

}

    public function department():BelongsTo
    {

return $this->belongsTo(Department::class);
    }
    public function category():BelongsTo
    {

return $this->belongsTo(Category::class);
    }


    public function variationTypes(): HasMany
    {
        return $this->hasMany(VariationType::class);
    }


    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }
}

