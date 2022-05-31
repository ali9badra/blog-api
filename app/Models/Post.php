<?php

namespace App\Models;

use Hamcrest\Core\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function createdAt() : Attribute{
        return new Attribute(
            get : fn($value) => \carbon\carbon::parse($value)->format('d-m-Y'),
        );
    }

    public function title() : Attribute{
        return new Attribute(
            get : fn($value) => Str::upper($value),
            set : fn($value) => ucfirst($value),
        );
    }
}
