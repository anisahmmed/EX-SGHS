<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'phone','email','gender', 'present_address','permanent_address','position','status','sghs_status','batch','photo'];
}