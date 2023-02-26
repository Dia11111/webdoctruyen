<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public $timestamps = false; //set time to false
    protected $fillable = [
        'tentruyen','tukhoa', 'tomtat', 'danhmuc_id', 'hinhanh', 'slug_truyen', 'kichhoat','theloai_id','created_at', 'updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';

    public function danhmuctruyen() {
        return $this->belongsTo('App\Models\DanhmucTruyen','danhmuc_id','id');
    }

    public function chapter() {
        return $this->hasMany('App\Models\Chapter','truyen_id','id');
    }

    public function theloai(){
        return $this->belongsTo('App\Models\Theloai','theloai_id','id');
    }
}
