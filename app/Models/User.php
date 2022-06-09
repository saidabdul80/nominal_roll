<?php

namespace App\Models;

use App\Traits\Searchable;
use App\Traits\Utils;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable, Utils;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ap_f_no',
        'rank_id',
        'surname',
        'othername',
        'sex',
        'state_of_origin',
        'tribe',
        'zone',
        'dob',
        'doe',
        'last_promot',
        'retirement',
        'date_transfer_to_command',
        'command_served_last',
        'qualification',
        'discipline',
        'general_duty_specialist',
        'duty_post_division',
        'date_transfer_to_division',
        'date_reported_in_command',
        'phone',
        'recruited_as',
        'address',
        'nok',
        'nop',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', 
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function rank()
    {
        return $this->belongsTo(rank::class);
    }

    public function formed_unit()
    {
        return $this->belongsTo(formed_unit::class);
    }

    public function area_command()
    {
        return $this->belongsTo(area_command::class);
    }
    protected $table ="users";


}
