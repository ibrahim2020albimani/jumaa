<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khotba extends Model
{
    use HasFactory;
    protected $fillable=['title','body','hijri_day','hijri_month','hijri_year','cate_id','pdf_file_url','word_file_url','user_id'];

    public function cate(){
        return $this->belongsTO(Cate::class);
    }

    public function user(){
        return $this->belongsTO(User::class);
    }

    public function khotbaPermissions(){
        return $this->belongsToMany(Khotba::class,'khotba_permissions','khotba_id','user_id');
    }
    
}
