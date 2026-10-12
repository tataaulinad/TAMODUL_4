<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

   protected $fillable = [
    'reporter_name',
    'location',
    'description',
    'photo_path',
    'status',
    'tinggi_genangan',
    'tanggal_kejadian',
];
    protected function casts(): array
        {
            return [
                'tanggal_kejadian' => 'date',
            ];
        }
}