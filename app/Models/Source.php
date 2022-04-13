<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    public function getSources(): array
    {
        return DB::table($this->table)
            ->select("id", "title", "url")
            ->get()
            ->toArray();
    }
}
