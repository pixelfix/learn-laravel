<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
    ];

    public function tags()
    {
        return $this->belongsToMany(SalesTag::class);
    }

}
