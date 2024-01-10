<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbandingan extends Model
{
    use HasFactory;

    protected $table = "perbandingan_kriteria";

    protected $primaryKey = "perbandingan_kriteria_id";

    protected $guarded = [];

    public function kriteria1()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id1', 'kriteria_id');
    }

    public function kriteria2()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id2', 'kriteria_id');
    }
}
