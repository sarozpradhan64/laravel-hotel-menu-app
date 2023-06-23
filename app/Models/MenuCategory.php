<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    public function getImageUrlAttribute(): string
    {

        $imagePath = 'images/menu-categories/' . $this->image;
        $fullPath = public_path('storage/' . $imagePath);

        if ($this->image && file_exists($fullPath)) {
            return url('storage/' . $imagePath);
        }
        return url(asset('images/no-image.jpg'));  
    }
}
