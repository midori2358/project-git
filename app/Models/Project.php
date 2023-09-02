<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = ['content'];
    
    /**
     * このプロジェクトに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('favorite_users');
    }

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     /**
     * 投稿した内容をお気に入りに入れたユーザ。（Userモデルとの関係を定義）
     */
     public function favorite_users()
     {
         return $this->belongsToMany(User::class,'favorites','project_id','user_id')->withTimestamps();
     }
     
    
     
}
