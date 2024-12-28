<?php
// filepath: /c:/laragon/www/Reaserch-Grant-Management-System/app/Models/AcademicianGrant.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicianGrant extends Model
{
    use HasFactory;

    protected $table = 'academician_grant';

    protected $fillable = [
        'grant_id',
        'academician_id',
        'role',
    ];
}