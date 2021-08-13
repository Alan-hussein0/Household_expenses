<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice','user_id','account_pages_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function account_page()
    {
        return $this->belongsTo(AccountPages::class, 'account_pages_id');
    }

}
