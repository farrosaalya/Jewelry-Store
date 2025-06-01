<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Jewelry extends Model
{
    use HasFactory;

    protected $table = 'jewelries';

    protected $fillable = [
        'name',
        'image',
        'price',
        'stock',
        'description',
        'category_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryNameAttribute(): string
    {
        return $this->category?->name ?? 'Uncategorized';
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            // If image is a full URL, return it as is
            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                return $this->image;
            }

            // Return the direct storage URL
            return url('storage/' . $this->image);
        }
        
        return asset('images/placeholder-jewelry.png');
    }

    protected static function boot()
    {
        parent::boot();

        // When saving a model
        static::saving(function ($jewelry) {
            if ($jewelry->image && !filter_var($jewelry->image, FILTER_VALIDATE_URL)) {
                // Remove 'public/' prefix if it exists
                $jewelry->image = str_replace('public/', '', $jewelry->image);
                
                // Ensure the image path starts with 'jewelry/'
                if (!str_starts_with($jewelry->image, 'jewelry/')) {
                    $jewelry->image = 'jewelry/' . basename($jewelry->image);
                }
            }
        });
    }
} 