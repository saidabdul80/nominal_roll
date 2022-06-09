<?php
namespace App\Traits;
trait Searchable
{

    /**
     * scope to search a model for records based on an
     * array of column-value pairs
     */
    public function scopeLike($query, $columns)
    {   
        $query->orWhere(function($q)use($columns){
            foreach ($columns as $column => $value) {            
                $q->orWhere($column, 'like', $value);
            }
        });
        return $query;
    }

    /**
     * scope to match a record in a model based on an
     * array of column-value pairs
     */
    public function scopeMatch($query, $columns)
    {
        
        $query->orWhere(function($q)use($columns){
            foreach ($columns as $column => $value) {            
                $q->orWhere($column, '=', $value);
            }
        });        
        return $query;
    }
}
?>