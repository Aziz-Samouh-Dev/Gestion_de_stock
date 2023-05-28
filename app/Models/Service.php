<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\Division;
use App\Models\AgentService;
use App\Models\SortieProduit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Service extends Model
{
    
        use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'id_service';
    protected $fillable = [
        'id_service',
        'nom_service',
        'id_agent',
        'division_id',
    ];

    public function divisions()
    {
        return $this->belongsToMany(Division::class, 'division_service', 'id_service', 'id_division');
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_service', 'id_service', 'id_agent');
    }
    public function agentServices()
    {
        return $this->hasMany(AgentService::class, 'id_service');
    }


    public function sortieProduits()
    {
        return $this->hasMany(SortieProduit::class);
    }

}
