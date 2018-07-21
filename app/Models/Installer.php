<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Spatial;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\HasRelationships;
use App\Models\Department;
use Cviebrock\EloquentSluggable\Sluggable;


class Installer extends Model
{
    use SoftDeletes,
        Spatial,
        Translatable,
        Sluggable;

    protected $dates = ['deleted_at'];
    protected $spatial = ['gps'];

    protected $translatable = ['name', 'address', 'address_2', 'city', 'grip', 'description', 'services', 'hourly', 'news_title', 'quote_text', 'quote_author', 'quote_author_function', 'meta_title', 'meta_description', 'meta_keywords', 'alt_url', 'alt_list_link'];    

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['slug']
            ]
        ];
    }
    
    public function state() {
        return $this->belongsTo(Department::class);
    }

    public function stateList(){
        $departments = Department::where('visible', 1)->orderBy('zip')->get();

        foreach ($departments as $department) 
            $department->name = $department->zip .' - '. $department->name;
        
        return $departments; 
    }    
}
