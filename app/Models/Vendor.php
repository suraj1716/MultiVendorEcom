<?php

namespace App\Models;

use App\Enums\VendorStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vendor extends Model
{
   use HasFactory;
 protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'status', 'store_name', 'store_address'];



public function scopeEligibleForPayout(Builder $query):Builder
{
    return $query->where('status',VendorStatusEnum::Approved);
}
public function user(): BelongsTo
{
    return $this->belongsTo(User::class, 'user_id');
}

public function vendorUser(): BelongsTo
{

    return $this->belongsTo(User::class);

    // return $this->belongsTo(User::class, 'vendor_user_id');
}

}
