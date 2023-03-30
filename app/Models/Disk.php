<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disk extends Model
{
    use HasFactory;

	protected $primaryKey = 'disk_id';
    protected $fillable = ['disk_artist_id', 'disk_name', 'disk_no', 'disk_year', 'disk_publisher_id', 'disk_note'];
}
