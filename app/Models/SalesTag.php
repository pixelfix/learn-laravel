<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function leads()
    {
        return $this->belongsToMany(SalesLead::class);
    }

}
