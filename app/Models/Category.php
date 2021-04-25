<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "categories";
    protected $fillable = ["name", "slug", "status"];

    public function scopeSearch($query, $q)
    {
        $query->when($q, function ($data) use ($q) {
            $data->where("name", "LIKE", "%" . $q . "%");
        });
    }

    public function duahs()
    {
        return $this->hasMany(Duah::class, 'category_id');
    }
}
