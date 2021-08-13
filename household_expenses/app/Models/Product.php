<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','price','amount','description','calculated'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function except()
    {
        return $this->belongsToMany(Except::class);
    }

    /**
     * Get the AccountPages that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accountPages()
    {
        return $this->belongsTo(AccountPages::class, 'account_pages_id');
    }

}
