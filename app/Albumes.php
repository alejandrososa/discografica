<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albumes extends Model
{

    /**
     * Get the artistas for the album.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function artistas()
    {
        return $this->hasMany('App\Artistas');
    }
}
