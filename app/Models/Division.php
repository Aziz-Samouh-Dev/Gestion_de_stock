<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Division extends Model
{

    use HasFactory;
    protected $primaryKey = 'id_division';

    protected $fillable = ['lable'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'division_service', 'id_division', 'id_service');
    }

}
