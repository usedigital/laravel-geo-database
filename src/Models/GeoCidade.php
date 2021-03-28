<?php

namespace UseDigital\LaravelGeoDatabase\Models;

use Illuminate\Database\Eloquent\Model;

class GeoCidade extends Model
{
    protected $fillable = ['id', 'nome', 'ibge', 'estado_id'];

    public function estado()
    {
        return $this->belongsTo(GeoEstado::class);
    }
}
