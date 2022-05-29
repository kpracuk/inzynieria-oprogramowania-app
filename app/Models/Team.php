<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function getTeamLeaderAttribute() {
        return count($this->users) ? $this->users[0] : null;
    }
}
