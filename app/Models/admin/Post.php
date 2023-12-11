<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\User;

class Post extends Model
{
    use HasFactory;

    public function scopeSearch($query, $q){
        
        return $query->where(function (Builder $subQuery) use ($q) {
            $subQuery->where('title', 'like', '%'.$q.'%')
                ->orWhere('body', 'like', '%'.$q.'%')
                ->orWhere('annotation', 'like', '%'.$q.'%');
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
      }
}
