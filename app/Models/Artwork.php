<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artwork extends Model {
    use HasFactory;
    protected $fillable = ['name', 'image_url', 'description', 'creation_date', 'medium', 'dimensions', 'isforsale','issensitive'];


public function collection() {
    return $this->belongsTo(Collection::class);
}

public function tags()
{
    return $this->belongsToMany(Tag::class);
}

}

