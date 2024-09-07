<?php
 
namespace App\Models\Server\Lucera;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//обращаемся к Lucera
class LuceraServerCastle extends Model
{
    use HasFactory;

    protected $table = 'castle';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $connection = 'mysql4';

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}