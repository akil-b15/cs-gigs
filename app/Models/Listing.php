<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'company', 'location', 'website', 'email', 'tags', 'logo'];

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
                    ->orwhere('tags', 'like', '%' . request('search') . '%')
                    ->orwhere('description', 'like', '%' . request('search') . '%')
                    ->orwhere('location', 'like', '%' . request('search') . '%')
                    ->orwhere('company', 'like', '%' . request('search') . '%');
        }
    }
}
