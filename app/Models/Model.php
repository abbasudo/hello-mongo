<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

if (config('database.default') === 'mongodb') {
    class Model extends MongoModel
    {

    }
} else {
    class Model extends EloquentModel
    {

    }
}
