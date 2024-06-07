<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'user_id',
        'category_id'
    ];

    public function user(){ //puxa o usuario que pertence
        return $this->belongsTo(User::class);
    }

    public function category(){ //puxa a categoria que pertence
        return $this->belongsTo(Category::class);
    }

}
