<?php

namespace Posts;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'id';

    protected $guarded = [];

    

    public function author() {
        return $this->belongsTo(User::class,'author','name');
    }

    //definir funcion para obtener slug y evitar que se dupliquen desde el modelo

    //crear mock en phpunit para mis pruebas unitarias de mi modelo y de estas funciones
}
