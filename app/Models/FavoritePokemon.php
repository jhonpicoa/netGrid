<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritePokemon extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_usuario',
        'ref_api'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
