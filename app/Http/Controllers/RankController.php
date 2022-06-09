<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Models\rank;
use App\Models\User;
use App\Models\area_command;
use App\Models\formed_unit;
use App\Models\UserHistories;
use ArrayObject;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
 
class RankController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     * 
     */
    private $searchParams;
    public function __construct()
    {
      $search ='';
      $this->searchParams = [
        'ap_f_no' => $search,
        'area_commands_id' => $search,
        'formed_units_id' => $search,
        'surname' => $search,
        'othername' => $search,
        'sex' => $search,
        'state_of_origin' => $search,
        'lga' => $search,
        'tribe' => $search,
        'zone' => $search,
        'dob' => $search,
        'doe' => $search,
        'last_promot' => $search,
        'retirement' => $search,
        'date_transfer_to_command' => $search,
        'command_served_last' => $search,
        'qualification' => $search,
        'discipline' => $search,
        'general_duty_specialist' => $search,
        'duty_post_division' => $search,
        'date_transfer_to_division' => $search,
        'date_reported_in_command' => $search,
        'phone' => $search,
        'recruited_as' => $search,
        'address' => $search,
        'nok' => $search,
        'nop' => $search,
        'password' => $search,
        'created_at' => $search,
        'updated_at' => $search,
        'status' => $search,
        'date_transfer_out_of_command' => $search,
        'state_transfer_to' => $search,
        'transfer_state' => $search,
        'death_date' => $search,
        'death_state' => $search,
        'dismissal_date' => $search,
        'dismissal_state' => $search,    
        'rank'   =>$search
      ];
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

      $string = explode('*', $search);        
      if(sizeof($string)>1 ){
        $search = $string[0];
      }
      foreach($this->searchParams as &$param){
        $param = $search;
      }
     
      if($search != ''){
        if(sizeof($string)>1 ){         
          $allusers  = User::searchByRank($this->searchParams,$start,$length,['rank'],["dismissal_state"=>1]);
        }else{
          $allusers  = User::searchDataLike($this->searchParams,$start,$length,['rank'],["dismissal_state"=>1]);
        }
      }else{
        $allusers  = User::fetchData($start,$length,['rank'],["dismissal_state"=>1]);
      }      
 
      $idx = $start;
      foreach($allusers as &$user){
        $idx += 1;
        $user['sn'] = $idx;
      }
      $count =  User::totalCount($start,$length,['rank'],["dismissal_state"=>1]);
       if(empty($search)){
         $data = [
           "draw"=> $request->get('draw'),
           "recordsTotal"=>$count,
           "recordsFiltered"=>  $count,
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

    public function dismiss(Request $request){
        $date = $request->get('date');
        $ap_f_no = $request->get('ap_f_no');

        $user = User::where(['ap_f_no'=>$ap_f_no])->first();
        $datetime =date('Y-m-d H:i:s',strtotime($date));
        if(!is_null($user)){
          $user = $user->toArray();
          $user['user_id'] = $user['id'];
          $user['created_at'] = $datetime;
          $user['updated_at'] = $date;
          $user['session'] = $date;
        unset($user['id']);

        try{
          DB::transaction(function () use($user, $ap_f_no, $date){
            $insert = UserHistories::insert($user);    
            $user = User::where('ap_f_no', $ap_f_no)->update(['dismissal_date'=> $date, 'dismissal_state'=>1 ]);      
          });
          return json_encode(['msg'=>'Transaction Completed', 'status'=>200]); 
        }catch(\Exception $e){
          return json_encode(['msg'=>$e->getMessage(), 'status'=>400]); 
        }
      }
          return json_encode(['msg'=>'Cannot not reach the Database: try again', 'status'=>400]); 

    }
    public function transferout(Request $request){
      $date = $request->get('date');
      $ap_f_no = $request->get('ap_f_no');
      $state = $request->get('state');
      $lga = $request->get('lga');
      $state_lga = $state.' - '.$lga;
      $user = User::where(['ap_f_no'=>$ap_f_no])->first();
      $datetime =date('Y-m-d H:i:s',strtotime($date));
      if(!is_null($user)){
        $user = $user->toArray();
        $user['user_id'] = $user['id'];
        $user['created_at'] = $datetime;
        $user['updated_at'] = $date;
        $user['session'] = $date;
      unset($user['id']);

      try{
        DB::transaction(function () use($user, $ap_f_no, $date, $state_lga){
          $insert = UserHistories::insert($user);    
          $user = User::where('ap_f_no', $ap_f_no)->update(['date_transfer_out_of_command'=> $date, 'transfer_state'=>1, 'state_transfer_to'=>$state_lga ]);      
        });
        return json_encode(['msg'=>'Transaction Completed', 'status'=>200]); 
      }catch(\Exception $e){
        return json_encode(['msg'=>$e->getMessage(), 'status'=>400]); 
      }
      }
        return json_encode(['msg'=>'Cannot not reach the Database: try again', 'status'=>400]); 

    }
    public function death(Request $request){
      $date = $request->get('date');
        $ap_f_no = $request->get('ap_f_no');

        $user = User::where(['ap_f_no'=>$ap_f_no])->first();
        $datetime =date('Y-m-d H:i:s',strtotime($date));
        if(!is_null($user)){
          $user = $user->toArray();
          $user['user_id'] = $user['id'];
          $user['created_at'] = $datetime;
          $user['updated_at'] = $date;
          $user['session'] = $date;
        unset($user['id']);

        try{
          DB::transaction(function () use($user, $ap_f_no, $date){
            $insert = UserHistories::insert($user);    
            $user = User::where('ap_f_no', $ap_f_no)->update(['death_date'=> $date, 'death_state'=>1 ]);      
          });
          return json_encode(['msg'=>'Transaction Completed', 'status'=>200]); 
        }catch(\Exception $e){
          return json_encode(['msg'=>$e->getMessage(), 'status'=>400]); 
        }
      }
          return json_encode(['msg'=>'Cannot not reach the Database: try again', 'status'=>400]); 

    }

    public function undoDeath(Request $request){
      $ap_f_no = $request->get('ap_f_no');
      try{
          $user = UserHistories::where('ap_f_no', $ap_f_no)->orderBy('id', 'DESC')->first(); 
          if(!is_null($user)){
            User::where('ap_f_no',$ap_f_no)->update(['death_state'=>'0', 'death_date'=>'']);            
            UserHistories::find($user->id)->delete();
          }else{
            User::where('ap_f_no',$ap_f_no)->update(['death_state'=>'0', 'death_date'=>'']);                        
          }
          return json_encode(['msg'=>'Action Completed', 'status'=>200]); 
      }catch(\Exception $e){
        return json_encode(['msg'=>$e->getMessage(), 'status'=>400]); 
      }
    }

    public function undoDismissal(Request $request){
      $ap_f_no = $request->get('ap_f_no');
      try{
          $user = UserHistories::where('ap_f_no', $ap_f_no)->orderBy('id', 'DESC')->first(); 
          if(!is_null($user)){
            User::where('ap_f_no',$ap_f_no)->update(['dismissal_date'=> '', 'dismissal_state'=>0 ]);            
            UserHistories::find($user->id)->delete();
          }else{
            User::where('ap_f_no',$ap_f_no)->update(['dismissal_date'=> '', 'dismissal_state'=>0 ]);                        
          }
          return json_encode(['msg'=>'Action Completed', 'status'=>200]); 
      }catch(\Exception $e){
        return json_encode(['msg'=>$e->getMessage(), 'status'=>400]); 
      }
    }
    public function undoTransfer(Request $request){
      $ap_f_no = $request->get('ap_f_no');
      try{
          $user = UserHistories::where('ap_f_no', $ap_f_no)->orderBy('id', 'DESC')->first(); 
          if(!is_null($user)){
            User::where('ap_f_no',$ap_f_no)->update(['date_transfer_out_of_command'=> '', 'transfer_state'=>0, 'state_transfer_to'=>'' ]);      
            UserHistories::find($user->id)->delete();
          }else{
            User::where('ap_f_no',$ap_f_no)->update(['date_transfer_out_of_command'=> '', 'transfer_state'=>0, 'state_transfer_to'=>'' ]);      
          }
          return json_encode(['msg'=>'Action Completed', 'status'=>200]); 
      }catch(\Exception $e){
        return json_encode(['msg'=>$e->getMessage(), 'status'=>400]); 
      }
    }

    public function deathList(Request $request)
    {        
      
      $length = $request->get('length');
      $start = $request->get('start');
      $search = $request->get('search')['value'];

      $string = explode('*', $search);        
      if(sizeof($string)>1 ){
        $search = $string[0];
      }
      foreach($this->searchParams as &$param){
        $param = $search;
      }
     
      if($search != ''){
        if(sizeof($string)>1 ){         
          $allusers  = User::searchByRank($this->searchParams,$start,$length,['rank'],["death_state"=>1]);
        }else{
          $allusers  = User::searchDataLike($this->searchParams,$start,$length,['rank'],["death_state"=>1]);
        }
      }else{
        $allusers  = User::fetchData($start,$length,['rank'],["death_state"=>1]);
      }      
       $count =  User::totalCount($start,$length,['rank'],["death_state"=>1]);
      $idx = $start;      
      foreach($allusers as &$user){
        $idx += 1;
        $user['sn'] = $idx;
      }
       if(empty($search)){
         $data = [
           "draw"=> $request->get('draw'),
           "recordsTotal"=> $count,
           "recordsFiltered"=> $count,
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
      $users = User::where('area_commands_id','!=',0)->get();
      $ranks = rank::all();
      $commands = area_command::all();
      $commandshead = json_decode(json_encode($commands));
 
      
      foreach ($users as &$user) {
        foreach ($commands as $command) {
          if($user->area_commands_id === $command->id){
            
            $heads =  array_filter($commandshead, function($item)use ($command){ 
              if($item->by_class == $command->by_class && $item->command == 1){
                return $item;
              }
            });            
            $nhead = "";
            foreach ($heads as $head) {              
              $nhead = $head->name;
            }
            $command['head'] = $nhead;
            $user['command']= $command;
          }          
        }

        foreach ($ranks as $rank) {
          if($user->rank_id == $rank->id){
            $user['rank'] = $rank;
          }
        }
      }

      
      $data = array();
      $track =""; 
      $index = -1;
      $users = json_decode(json_encode($users));
      usort( $users, fn($a, $b) => strcmp($a->command->by_class, $b->command->by_class));
      //return $users;
      foreach ($users as $user) {
        $index++;
        if($index == 0){
          $track = $user->command->by_class;
          $data[$user->command->by_class] = array();
          array_push($data[$track], $user);
        }else{
          if($track != $user->command->by_class){
            $data[$track] = (Object) $data[$track];
            $track = $user->command->by_class;
            $data[$user->command->by_class] = array();
            array_push($data[$track], $user);
          }else{
            array_push($data[$track], $user);
          }
        }
        if(sizeof($users)-1 == $index){
          $data[$track] = (Object) $data[$track];
        }
        
      }
      //return $users;
      return json_encode($data);

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

        $string = explode('*', $search);        
        if(sizeof($string)>1 ){
          $search = $string[0];
        }
        foreach($this->searchParams as &$param){
          $param = $search;
        }
       
        if($search != ''){
          if(sizeof($string)>1 ){         
            $allusers  = User::searchByRank($this->searchParams,$start,$length,['rank']);
          }else{
            $allusers  = User::searchDataLike($this->searchParams,$start,$length,['rank']);
          }
        }else{
          $allusers  = User::fetchData($start,$length,['rank']);
        }
     $idx = $start;
     foreach($allusers as &$user){
       $idx += 1;
       $user['sn'] = $idx;
     }
     $count =  User::totalCount($start,$length,['rank']);
      if(empty($search)){
        $data = [
          "draw"=> $request->get('draw'),
          "recordsTotal"=> $count,
          "recordsFiltered"=> $count,
          "data"=>$allusers
        ];
      }else{
        $data = [
          "draw"=> $request->get('draw'),
          "length"=>$count,
          "recordsTotal"=>  $count,
          "recordsFiltered"=> $count,
          "data"=>$allusers
        ];
      }
      return $data;
     
    }

    
}
