<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

abstract class AbstractModel extends Model
{
    use HasFactory;

    /**
     * Fillable attribute accessor
     * @return array|string[]
     */
    public function getFillable()
    {
        return $this->fillable;
    }
}