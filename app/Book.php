<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Book extends Model
{

    protected $fillable = [
        'name', 'category', 'description',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function addComment($body){
        $this->comments()->create(compact('body'));
    }

    public function scopeFilter($query, $filters){
//        dd($filters);
        if($filters == null) return;

        if($month = $filters['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year']){
            $query->whereYear('created_at', $year);
        }
    }
}
