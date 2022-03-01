<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Models\rank;
use App\Models\User;
use App\Models\area_command;
use App\Models\formed_unit;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
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

    
    public function UpdateCommand(Request $request)
    {
      User::where('ap_f_no', $request->get('ap_f_no'))->update([
        'area_commands_id'=> $request->get('command'), 'formed_units_id'=>$request->get('form_unit'),
        'duty_post_division'=>$request->get('division')
      ]);      
      return 200;
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
        //return view('add');
    }

    public function dismissal(Request $request)
    {        
      $length = $request->get('length');
      $start = $request->get('start');
      $search = $request->get('search')['value'];
      if($length != -1)
      {     
         if(!empty($search)){
           
           $allusers = User::with('rank')->whereHas('rank',function($query)use ($search){
             $query->where('rank.abbr', $search);})->orWhere('ap_f_no', $search)
             ->orWhere('area_commads_id','like', $search)
             ->orWhere('formed_units_id','like', $search)     
             ->orWhere('surname','like', $search)
             ->orWhere('othername','like', $search)
             ->orWhere('sex','like', $search)
             ->orWhere('state_of_origin','like', $search)
             ->orWhere('lga','like', $search)
             ->orWhere('tribe','like', $search)
             ->orWhere('zone','like', $search)
             ->orWhere('dob','like', $search)
             ->orWhere('doe','like', $search)
             ->orWhere('last_promot','like', $search)
             ->orWhere('retirement','like', $search)
             ->orWhere('date_transfer_to_command','like', $search)
             ->orWhere('command_served_last','like', $search)
             ->orWhere('qualification','like', $search)
             ->orWhere('discipline','like', $search)
             ->orWhere('general_duty_specialist','like', $search)
             ->orWhere('duty_post_division','like', $search)
             ->orWhere('date_transfer_to_division','like', $search)
             ->orWhere('date_reported_in_command','like', $search)
             ->orWhere('phone','like', $search)
             ->orWhere('recruited_as','like', $search)
             ->orWhere('address','like', $search)
             ->orWhere('nok','like', $search)
             ->orWhere('nop','like', $search)
             ->orWhere('password','like', $search)
             ->orWhere('created_at','like', $search)
             ->orWhere('updated_at','like', $search)
             ->orWhere('status','like', $search)
             ->orWhere('date_transfer_out_of_command','like', $search)
             ->orWhere('state_transfer_to','like', $search)
             ->orWhere('transfer_state','like', $search)
             ->orWhere('death_date','like', $search)
             ->orWhere('death_state','like', $search)
             ->orWhere('dismissal_date','like', $search)
             ->orWhere('dismissal_state','like', $search)
             ->where("dismissal_state",1)
             ->get();
          }else{
           $allusers = User::with('rank')->skip($start)->take($length)->where("dismissal_state",1)->get();  
         }
      }else{
       $allusers = User::with('rank')->where("dismissal_state",1)->get();
      }
 
      $idx = $start;
      foreach($allusers as &$user){
        $idx += 1;
        $user['sn'] = $idx;
      }
       if(empty($search)){
         $data = [
           "draw"=> $request->get('draw'),
           "recordsTotal"=>  sizeof( User::all()),
           "recordsFiltered"=> sizeof( User::all()),
           "data"=>$allusers
         ];
       }else{
         $data = [
           "draw"=> $request->get('draw'),
           "length"=>sizeof($allusers),
           "recordsTotal"=>  sizeof($allusers),
           "recordsFiltered"=> sizeof($allusers),
           "data"=>$allusers
         ];
       }
       return $data;
      
     }


    public function transfer()
    {        
      $transfers = User::where("transfer_state",1)->get();
      return $transfers;
    }

    public function deathList(Request $request)
    {        
      $length = $request->get('length');
      $start = $request->get('start');
      $search = $request->get('search')['value'];
      if($length != -1)
      {     
         if(!empty($search)){
           
           $allusers = User::with('rank')->whereHas('rank',function($query)use ($search){
             $query->where('rank.abbr', $search);})->orWhere('ap_f_no', $search)
             ->orWhere('area_commads_id','like', $search)
             ->orWhere('formed_units_id','like', $search)     
             ->orWhere('surname','like', $search)
             ->orWhere('othername','like', $search)
             ->orWhere('sex','like', $search)
             ->orWhere('state_of_origin','like', $search)
             ->orWhere('lga','like', $search)
             ->orWhere('tribe','like', $search)
             ->orWhere('zone','like', $search)
             ->orWhere('dob','like', $search)
             ->orWhere('doe','like', $search)
             ->orWhere('last_promot','like', $search)
             ->orWhere('retirement','like', $search)
             ->orWhere('date_transfer_to_command','like', $search)
             ->orWhere('command_served_last','like', $search)
             ->orWhere('qualification','like', $search)
             ->orWhere('discipline','like', $search)
             ->orWhere('general_duty_specialist','like', $search)
             ->orWhere('duty_post_division','like', $search)
             ->orWhere('date_transfer_to_division','like', $search)
             ->orWhere('date_reported_in_command','like', $search)
             ->orWhere('phone','like', $search)
             ->orWhere('recruited_as','like', $search)
             ->orWhere('address','like', $search)
             ->orWhere('nok','like', $search)
             ->orWhere('nop','like', $search)
             ->orWhere('password','like', $search)
             ->orWhere('created_at','like', $search)
             ->orWhere('updated_at','like', $search)
             ->orWhere('status','like', $search)
             ->orWhere('date_transfer_out_of_command','like', $search)
             ->orWhere('state_transfer_to','like', $search)
             ->orWhere('transfer_state','like', $search)
             ->orWhere('death_date','like', $search)
             ->orWhere('death_state','like', $search)
             ->orWhere('dismissal_date','like', $search)
             ->orWhere('dismissal_state','like', $search)
             ->where("death_state",1)
             ->get();
          }else{
           $allusers = User::with('rank')->skip($start)->take($length)->where("death_state",1)->get();  
         }
      }else{
       $allusers = User::with('rank')->where("death_state",1)->get();
      }
 
      $idx = $start;
      foreach($allusers as &$user){
        $idx += 1;
        $user['sn'] = $idx;
      }
       if(empty($search)){
         $data = [
           "draw"=> $request->get('draw'),
           "recordsTotal"=>  sizeof( User::all()),
           "recordsFiltered"=> sizeof( User::all()),
           "data"=>$allusers
         ];
       }else{
         $data = [
           "draw"=> $request->get('draw'),
           "length"=>sizeof($allusers),
           "recordsTotal"=>  sizeof($allusers),
           "recordsFiltered"=> sizeof($allusers),
           "data"=>$allusers
         ];
       }
       return $data;
      $deceases = User::where("death_state",1)->get();
      return $deceases;
    }
    public function phoneBook()
    {        
      $deceases = User::where("death_state",1)->get();
      return $deceases;
    }
    public function areaCommands()
    {        
      return area_command::where("status",1)->get();    
    }
    public function formedUnits()
    {        
      return formed_unit::where("status",1)->get();    
    }
    
    public function updateUser(Request $request){
      //return dd($request->ap_f_no);
      User::where('ap_f_no',
      $request->ap_f_no)
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
    public function alllistx(Request $request)
    {
     $length = $request->get('length');
     $start = $request->get('start');
     $search = $request->get('search')['value'];
     if($length != -1)
     {     
        if(!empty($search)){
          
          $allusers = User::with('rank')->whereHas('rank',function($query)use ($search){
            $query->where('rank.abbr', $search);})->orWhere('ap_f_no', $search)
            ->orWhere('area_commads_id','like', $search)
            ->orWhere('formed_units_id','like', $search)     
            ->orWhere('surname','like', $search)
            ->orWhere('othername','like', $search)
            ->orWhere('sex','like', $search)
            ->orWhere('state_of_origin','like', $search)
            ->orWhere('lga','like', $search)
            ->orWhere('tribe','like', $search)
            ->orWhere('zone','like', $search)
            ->orWhere('dob','like', $search)
            ->orWhere('doe','like', $search)
            ->orWhere('last_promot','like', $search)
            ->orWhere('retirement','like', $search)
            ->orWhere('date_transfer_to_command','like', $search)
            ->orWhere('command_served_last','like', $search)
            ->orWhere('qualification','like', $search)
            ->orWhere('discipline','like', $search)
            ->orWhere('general_duty_specialist','like', $search)
            ->orWhere('duty_post_division','like', $search)
            ->orWhere('date_transfer_to_division','like', $search)
            ->orWhere('date_reported_in_command','like', $search)
            ->orWhere('phone','like', $search)
            ->orWhere('recruited_as','like', $search)
            ->orWhere('address','like', $search)
            ->orWhere('nok','like', $search)
            ->orWhere('nop','like', $search)
            ->orWhere('password','like', $search)
            ->orWhere('created_at','like', $search)
            ->orWhere('updated_at','like', $search)
            ->orWhere('status','like', $search)
            ->orWhere('date_transfer_out_of_command','like', $search)
            ->orWhere('state_transfer_to','like', $search)
            ->orWhere('transfer_state','like', $search)
            ->orWhere('death_date','like', $search)
            ->orWhere('death_state','like', $search)
            ->orWhere('dismissal_date','like', $search)
            ->orWhere('dismissal_state','like', $search)
            ->get();
        
        
        


        }else{
          $allusers = User::with('rank')->skip($start)->take($length)->get();  
        }
     }else{
      $allusers = User::with('rank')->get();
     }

     $idx = $start;
     foreach($allusers as &$user){
       $idx += 1;
       $user['sn'] = $idx;
     }
     /*  
     $cm = array_map(function($e) use($idx){
      $x = $idx++;
      array_push($e,['sn'=>$x]);
      $e['rank_id'] = $e['rank']['abbr'];
       $f = array_values($e);              
       
       $filtered = array_filter($f,function ($key){
            return $key < 26 && $key != 0;
        },ARRAY_FILTER_USE_KEY);  

       return json_decode(json_encode(array_values($filtered)),true);
      }, json_decode(json_encode($allusers), true));
      */
      //return DataTables::of(User::with('rank')->get())->make(true);
      if(empty($search)){
        $data = [
          "draw"=> $request->get('draw'),
          "recordsTotal"=>  sizeof( User::all()),
          "recordsFiltered"=> sizeof( User::all()),
          "data"=>$allusers
        ];
      }else{
        $data = [
          "draw"=> $request->get('draw'),
          "length"=>sizeof($allusers),
          "recordsTotal"=>  sizeof($allusers),
          "recordsFiltered"=> sizeof($allusers),
          "data"=>$allusers
        ];
      }
      return $data;
     
    }

    
}
