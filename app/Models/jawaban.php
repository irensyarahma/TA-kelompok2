<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    use HasFactory;
    protected $table = 'jawabans';
    protected $fillable = [
        'id_pertanyaan',
        'jawaban',
    ];

}
