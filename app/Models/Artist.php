<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

	protected $primaryKey = 'artist_id';
    protected $fillable = ['artist_name', 'artist_note'];
}
