<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageDowload extends Model
{
    use HasFactory;
    protected $table = 'pages_downloads';

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
