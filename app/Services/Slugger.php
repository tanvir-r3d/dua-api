<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Slugger
{
    protected $name;
    protected $slug;
    protected $duplicate = false;

    public function __construct($name)
    {
        $this->name = $name;
        $this->slug = Str::slug($name, '_');
    }

    public function checkSlug($modelData)
    {
        if (collect($modelData)->where('slug', $this->slug)->first()) {
            $this->duplicate = true;
        }
    }

    public function makeSlug()
    {
        if ($this->duplicate) {
            return $this->slug . "_" . rand(10, 99);
        } else {
            return $this->slug;
        }
    }
}
