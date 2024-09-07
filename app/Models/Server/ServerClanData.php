<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//обращаемся к rusacis
class ServerClanData extends Model
{
    use HasFactory;

    protected $table = 'clan_data';
    protected $primaryKey = 'clan_id';
    public $timestamps = false;
    protected $connection = 'mysql4';

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
