<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait ModelNotFoundException
{
    public function modelNotFoundException(Model $model)
    {
        if (!$model) throw new ModelNotFoundException('Model Not Found');
    }
}
