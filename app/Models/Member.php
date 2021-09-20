<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable =[
        'trainer_id','amount','customer_id', 'trainer_name' ,'first_name','payment_type','package_name'
    ];
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
