<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;

class Category extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ["name"];
}
