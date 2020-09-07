<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programmer extends Model
{
    protected $fillable = [
      'name',
      'lastname',
      'age',
      'tecnology',
    ];
}
