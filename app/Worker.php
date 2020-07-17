<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $guarded = [];
    protected $fillable = ['foto',
                            'posisi',
                            'nama',
                            'alamat',
                            'notelpon'];
}
