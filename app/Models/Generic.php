<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generic extends Model
{
    use HasFactory;

   public string $image_url;
   public string $title;
   public string $subtitle;
   public GenericAction $default_action;

   public string $buttons;

}
