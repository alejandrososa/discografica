<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artistas extends Model
{

    /**
     * Get the album record associated with the artist.
     */
    public function album()
    {
        return $this->hasOne('App\Albumes', 'id', 'albumid');
    }
}
