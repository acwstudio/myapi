<?php

namespace App\Models\Layout;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public function applications()
    {
        $this->belongsToMany(Application::class);
    }
}
