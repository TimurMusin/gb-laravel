<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getCategories(): array
    {
        return DB::table($this->table)
            ->select("id", "title", "description")
            ->get()
            ->toArray();
    }
}
