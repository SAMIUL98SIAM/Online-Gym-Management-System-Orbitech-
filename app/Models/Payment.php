<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable =[
        'trainer_id','amount','customer_id', 'trainer_name' ,'first_name','payment_type'
    ];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    // public function trainer()
    // {
    //     return $this->belongsTo(Trainer::class);
    // }

}
