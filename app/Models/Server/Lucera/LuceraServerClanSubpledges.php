<?php
 
namespace App\Models\Server\Lucera;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//обращаемся к Lucera
class LuceraServerClanSubpledges extends Model
{
    use HasFactory;

    protected $table = 'clan_subpledges';
    protected $primaryKey = 'clan_id';
    public $timestamps = false;
    protected $connection = 'mysql4';

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}