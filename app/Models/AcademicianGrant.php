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

    public function academician()
    {
        return $this->belongsTo(Academician::class);
    }

    public function grant()
    {
        return $this->belongsTo(Grant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}