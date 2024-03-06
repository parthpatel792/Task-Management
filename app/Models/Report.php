<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'report_data'];

    protected $casts = [
        'report_data' => 'array',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
