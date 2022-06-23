<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenericAction extends Model
{
    use HasFactory;

    public string $type;
    public string $url;
}
