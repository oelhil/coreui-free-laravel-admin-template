<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama', 'NIK'
    ];

    protected $appends = array('NN','TglLhr');

    public function getNNAttribute()
    {
        return $this->NIP . ' / ' . $this->NIK;  
    }

    public function getTglLhrAttribute()
    {
        return Carbon::parse($this->Tanggal_Lahir)->format('d-m-Y');
    }

}