<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "payment";
    public $incrementing = true;
    protected $fillable = [
        'credit_id',
        'amount',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function credit()
    {
        return $this->belongsTo(Credit::class,'credit_id','id');
    }
}
