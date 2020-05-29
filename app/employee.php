<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    public function location()
    {

        return $this->hasOne(location::class);
    }

    public function timezone()
    {

        return $this->hasOne(timezone::class);
    }

    public function headshot()
    {

        return $this->hasOne(headshot::class);
    }

    public function skills()
    {

        return $this->hasOne(skills::class);
    }
}
