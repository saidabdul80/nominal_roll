<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;
trait Utils{
    
    
 
     public function searchUserBy($column_name,$value)
     {
         return Self::where($column_name, $value)->first();
     }
     
     public static function searchDataLike($searchParam,$start,$length=1, array $relationship = [], array $searchSpecial=[]){
        
         $rank = $searchParam['rank'];
         unset($searchParam['rank']);         
           $response = self::with('rank')->whereHas('rank',function($query)use ($rank){
            $query->where('rank.abbr', $rank);})->Like($searchParam)->where($searchSpecial)->get();                                         
            return $response;
         
     }
    
     public static function searchByRank($searchParam,$start,$length=1, array $relationship = [], array $searchSpecial=[]){
        $rank = $searchParam['rank'];

        unset($searchParam['rank']);         
          $response = self::with('rank')->whereHas('rank',function($query)use ($rank){
            $query->where('rank.abbr', $rank);})->where($searchSpecial)->get();                                    
           return $response;
        
    }
   

     public static function fetchData($start,$length=1, array $relationship = [], array $searchSpecial=[]){  
         if($length == -1){
            $response = self::with($relationship)->where($searchSpecial)->get();                
        }else{
            $response = self::with($relationship)->where($searchSpecial)->skip($start)->take($length)->get();                
            
        }           
         return $response;
        
     }
     public static function totalCount($start,$length=1, array $relationship = [], array $searchSpecial=[]){        
        $response = self::with($relationship)->where($searchSpecial)->count();                
        return $response;
       
    }

     


     
 
 
    
}