<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class Category extends Model
{
    use TenantTrait, HasFactory;

    protected $fillable = ['tenant_id', 'name', 'description', 'cover'];


    public function getCatCoverAttribute()
    {

        if (!empty($this->cover)) {
            return url("storage/{$this->cover}");
        }

        return 'https://placehold.co/300x150';
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
    
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }
}
