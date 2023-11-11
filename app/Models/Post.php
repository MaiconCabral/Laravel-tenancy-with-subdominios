<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class Post extends Model
{
    use TenantTrait, HasFactory;

    protected $fillable = ['tenant_id', 'user_id', 'title', 'body', 'cover'];


    public function getUrlCoverAttribute()
    {

        if (!empty($this->cover)) {
            return url("storage/{$this->cover}");
        }

        return 'https://placehold.co/300x150';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

}
