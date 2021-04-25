<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Duah extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "duahs";
    protected $primaryKey = "id";
    protected $fillable = [
        "title",
        "slug",
        "category_id",
        "details_en",
        "details_bn",
        "details_ar",
        "reference",
        "status"
    ];

    public function scopeActive($query)
    {
        $query->where("status", 1);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id")->withDefault();
    }

    public function scopeSearch($query, $q)
    {
        $query->where("title", "LIKE", "%" . $q . "%")
            ->orWhere("details_en", "LIKE", "%" . $q . "%")
            ->orWhere("details_bn", "LIKE", "%" . $q . "%")
            ->orWhere("details_ar", "LIKE", "%" . $q . "%")
            ->orWhere("reference", "LIKE", "%" . $q . "%")
            ->orWhereHas("category", function ($category) use ($q) {
                $category->where("name", "LIKE", "%" . $q . "%");
            });
    }
}
