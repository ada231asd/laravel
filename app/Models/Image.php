<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Image extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'path',
        'product_id',
    ];

    public function spareparts(): BelongsTo
    {
        return $this->belongsTo(Sparepart::class);
    }

}
