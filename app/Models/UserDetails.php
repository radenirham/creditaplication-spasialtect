<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "user_details";
    public $incrementing = true;
    protected $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'address',
        'date_of_birth',
        'img_ktp',
        'gender',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
