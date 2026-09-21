<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Triage extends Model
{
    
    protected $table = 'products';
    protected fillable = [
    	'kategori_triase',
    	'warna_label'
    ];
}
