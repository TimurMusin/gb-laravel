<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'category_id', 'source_id', 'title', 'status', 'author', 'image', 'description'
    ];

    //relations
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    // public function getNews(): array
    // {
    //     return DB::table($this->table)
    //         ->join('categories', 'news.category_id', '=', 'categories.id')
    //         ->join('sources', 'news.source_id', '=', 'sources.id')
    //         ->select('news.*', 'categories.title as categoryTitle', 'sources.title as sourceTitle')
    //         ->orderBy('id')
    //         ->get()
    //         ->toArray();
    // }

    // public function getNewsById(int $id): mixed
    // {
    //     return
    //         DB::table($this->table)
    //             ->join('categories', 'news.category_id', '=', 'categories.id')
    //             ->join('sources', 'news.source_id', '=', 'sources.id')
    //             ->select('news.*', 'categories.title as categoryTitle', 'sources.title as sourceTitle')
    //             ->where('news.id', $id)
    //             ->get()
    //             ->toArray()[0];
    // }

    // public function getNewsByCategory(int $id): array
    // {
    //     return DB::table($this->table)
    //         ->join('categories', 'news.category_id', '=', 'categories.id')
    //         ->join('sources', 'news.source_id', '=', 'sources.id')
    //         ->select('news.*', 'categories.title as categoryTitle', 'sources.title as sourceTitle')
    //         ->where('category_id', $id)
    //         ->get()
    //         ->toArray();
    // }
}