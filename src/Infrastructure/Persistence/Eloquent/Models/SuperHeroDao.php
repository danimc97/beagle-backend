<?php declare(strict_types=1);

namespace Beagle\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

final class SuperHeroDao extends Model
{
    protected $table = 'super_heroes';

    protected $fillable = [
        'id',
        'name',
        'description',
        'is_avenger'
    ];

    public $incrementing = false;
}
