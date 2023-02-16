<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'truyen_id', 'tieude', 'tomtat', 'noidung', 'kichhoat','slug_chapter'
    ];
    protected $primaryKey = 'id';
    protected $table = 'chapter';

    public function truyen() {
        return $this->BelongsTo('App\Models\Truyen','truyen_id','id');
    }
}
