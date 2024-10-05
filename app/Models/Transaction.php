<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'history_transactions';

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function pageDowload()
    {
        return $this->belongsTo(PageDowload::class, 'page_id');
    }
}
