<?php


namespace JeroenNoten\LaravelNews\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Collection paginate($perPage)
 * @method static QueryBuilder latest()
 */
class Article extends Model
{
    protected $fillable = ['title', 'summary', 'body'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function(Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    public function getDateAttribute()
    {
        return $this->getAttribute('created_at');
    }
}