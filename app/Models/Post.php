<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory;
    public $fillable = [
    	'slug', 'title', 'content', 'user_id', 'image'];
    function user() {
    	return $this->belongsTo(User::class);
    }

    function categories() {
    	return $this->belongsToMany(Category::class);
    }
}