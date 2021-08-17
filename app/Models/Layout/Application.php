<?php

namespace App\Models\Layout;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias', 'name', 'description'
    ];

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }
}
