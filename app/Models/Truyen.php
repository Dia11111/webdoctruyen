<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'tentruyen', 'tomtat', 'danhmuc_id', 'hinhanh', 'slug_truyen', 'kichhoat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';

    public function danhmuctruyen() {
        return $this->belongsTo('App\Models\DanhmucTruyen','danhmuc_id','id');
    }
}
