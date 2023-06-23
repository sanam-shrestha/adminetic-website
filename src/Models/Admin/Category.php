<?php

namespace Adminetic\Website\Models\Admin;

use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use LogsActivity, InteractsWithMedia;

    protected $guarded = [];

    // Forget cache on updating or saving and deleting
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            self::cacheKey();
        });

        static::deleting(function () {
            self::cacheKey();
        });
    }

    // Cache Keys
    private static function cacheKey()
    {
        Cache::has('categories') ? Cache::forget('categories') : '';
        Cache::has('parent_categories') ? Cache::forget('parent_categories') : '';
    }

    // Logs
    protected static $logName = 'category';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    // Relationship
    protected $parentColumn = 'parent_id';


    public function parent()
    {
        return $this->belongsTo(Category::class, $this->parentColumn);
    }

    public function root_parent()
    {
        return $this->belongsTo(Category::class, $this->root_parent_id);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }

    // Scopes
    public function scopeWhoIsParent($qry)
    {
        return $qry->whereNull('parent_id');
    }
    public function scopeWhoIsRootParent($qry)
    {
        return $qry->whoIsParent()->whereNull('root_parent_id');
    }
    public function scopePosition($qry)
    {
        return $qry->orderBy('position');
    }
    public function scopeActive($qry)
    {
        return $qry->where('active', 1);
    }
    public function scopeFeatured($qry)
    {
        return $qry->where('featured', 1);
    }
}
