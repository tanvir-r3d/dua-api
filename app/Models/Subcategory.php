<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "subcategories";
    protected $fillable = ["category_id", "name", "slug", "status"];

    public function scopeSearch($query, $q)
    {
        $query->when($q, function ($data) use ($q) {
            $data->where("name", "LIKE", "%" . $q . "%");
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault();
    }

    public function duahs()
    {
        return $this->hasMany(Duah::class, 'subcategory_id');
    }
}
