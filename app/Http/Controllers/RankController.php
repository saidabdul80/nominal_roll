<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Models\rank;
use App\Models\User;
use Illuminate\Http\Request;
class RankController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     * 
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     return rank::all();  
    }

    public function alllist()
    {
      
      $arr = json_decode(json_encode(User::with('rank')->get()),true);
      array_walk($arr,function (&$value, $key){
        $value['sn'] = $key+1;                
      });
     return $arr; 

    }
    public function addUser()
    {        
        return view('add');
    }

    public function dismissal()
    {        
        $dismissals = User::where("dismissal_state",1)->get();
        return $dismissals;
    }

    public function transfer()
    {        
      $transfers = User::where("transfer_state",1)->get();
      return $transfers;
    }

    public function deathList()
    {        
      $deceases = User::where("death_state",1)->get();
      return $deceases;
    }
    public function phoneBook()
    {        
      $deceases = User::where("death_state",1)->get();
      return $deceases;
    }
    
    public function updateUser(Request $request){
      //return dd($request->ap_f_no);
      User::where('ap_f_no',$request->ap_f_no)
          ->update([
            'rank_id'=> $request->rank_id,
            'surname'=> $request->surname,
            'othername'=> $request->othername,
            'sex'=> $request->sex,
            'state_of_origin'=> $request->state_of_origin,
            'lga'=> $request->lga,
            'tribe'=> $request->tribe,
            'zone'=> $request->zone,
            'dob'=> $request->dob,
            'doe'=> $request->doe,
            'last_promot'=> $request->last_promot,
            'retirement'=> $request->retirement,
            'date_transfer_to_command'=> $request->date_transfer_to_command,
            'command_served_last'=> $request->command_served_last,
            'qualification'=> $request->qualification,
            'discipline'=> $request->discipline,
            'general_duty_specialist'=> $request->general_duty_specialist,
            'duty_post_division'=> $request->duty_post_division,
            'date_transfer_to_division'=> $request->date_transfer_to_division,
            'date_reported_in_command'=> $request->date_reported_in_command,
            'phone'=> $request->phone,
            'recruited_as'=> $request->recruited_as,
            'address'=> $request->address,
            'nok'=> $request->nok,
            'nop'=> $request->nop
          ]);
          return response(200);
    }
    public function alllistx()
    {
     $allusers = User::with('rank')->get();  
     $cm = array_map(function($e){
       $e['rank_id'] = $e['rank']['abbr'];
       $f = array_values($e);              
       
       $filtered = array_filter(
        $f,function ($key){
            return $key < 26 && $key != 0;
        },ARRAY_FILTER_USE_KEY);  

       return json_decode(json_encode(array_values($filtered)),true);

      }, json_decode(json_encode($allusers), true));

      $data = [
        "draw"=> 1,
        "recordsTotal"=> 27,
        "recordsFiltered"=> 27,
        "data"=>array_values($cm)
      ];
      return $data;
     
    }

    
}
