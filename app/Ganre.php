<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ganre extends Model
{
    protected $table = 'ganres';
    protected $fillable = ['name'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
