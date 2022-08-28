<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use _IMAGE;

class category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'category';
    protected $fillable = [
        'category_name',
        'parent_id',
        'employee_id',
        'category_slug',
        'category_image',
        'category_description',
        'category_status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        'deleted_at' => 'datetime:Y-m-d h:i:s'
    ];

    public function parentCategory()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function categoryProducts()
    {
        return $this->hasMany(product::class, 'category_id', 'id');
    }

    public function categoryArticles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }

    public function categoryCreator()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
