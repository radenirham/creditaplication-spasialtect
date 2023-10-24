<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "credit";
    public $incrementing = true;
    protected $fillable = [
        'id',
        'user_id',
        'credit_type',
        'name',
        'status',
        'total_credit',
        'total_transaction',
        'tenor',
        'item',
        'attribute',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
