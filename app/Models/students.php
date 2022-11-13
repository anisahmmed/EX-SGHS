<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['FullName', 'Batch', 'PhoneNumber','Email','Profession','ProfessionDetails','BloodGroup','DoB','PresentAddress','ParmanentAddress','Product','Size','FilePath','Amount','Notes','AmountExt','status','password','UserId','shift','type','br_status'];
}
