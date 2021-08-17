<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'is_moderated', 'published', 'expiration_date', 'name', 'slug', 'preview_image', 'digital_image', 'price',
        'start_date', 'end_date', 'is_employment', 'is_installment', 'installment_months', 'document', 'description',
        'organization_id', 'category_id', 'user_id'
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
