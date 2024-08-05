<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategoria extends Model
{
    use SoftDeletes;


    protected  $fillable = [
        'subcategoria',
        'categoria_id'
    ];

    public function categoria(): HasOne
    {
        return $this->HasOne(Categoria::class, "id", "categoria_id");
    }
}
