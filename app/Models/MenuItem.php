<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MenuItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function menuCategory(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class);
    }

    public function getImageUrlAttribute(): string
    {

        $imagePath = 'images/menu-items/' . $this->image;
        $fullPath = public_path('storage/' . $imagePath);

        if ($this->image && file_exists($fullPath)) {
            return url('storage/' . $imagePath);
        } else {
            'no image.jpg';
        }
        return 'no image';
    }
}
