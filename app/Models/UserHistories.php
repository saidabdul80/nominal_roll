<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHistories extends Model
{
    use HasFactory;
    protected $fillable = ['*'];
    public function rank()
    {
        return $this->belongsTo(rank::class, 'user_id','id');
    }

    public function formed_unit()
    {
        return $this->belongsTo(formed_unit::class,'user_id','id');
    }

    public function area_command()
    {
        return $this->belongsTo(area_command::class,'user_id','id');
    }
    protected $table ="user_histories";

}
