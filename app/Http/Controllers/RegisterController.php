<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function index(Request $request){        
        $path = $request->file('file')->storeAs(
            'uploads', date("Y-m-d_his").".csv"
        );
        $path = Storage::path($path);
        //return dd($path);
        $this->importCsv($path);   
        return view("uploaded"); 
    }
    protected function csvToArray($filename = '', $delimiter = ',')
    {
        //$filename = str_replace("/","\\",$filename).".csv";        
        if (!file_exists($filename) || !is_readable($filename)){
            //return dd($filename);
            return false;
        }
        //return dd(12112);
    
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
    
        return $data;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function importCsv($file)
    {        
    
        $data = $this->csvToArray($file);
        //$fails= array();
        //DB::table('users')->insertOrIgnore($data);
        //User::upsert($data,['ap_f_no']);        
         for ($i = 0; $i < count($data); $i++)
        {
            //return print_r($data[$i]->ap_f_no);
            DB::table('users')->insertOrIgnore($data[$i]);
            //$fails[] = User::updateOrCreate($data[$i]);
        }    
      
    }
    

    protected function create(array $data)
    {                
        return User::create([                
            'ap_f_no' => $data['ap_f_no'],
            'rank_id' => $data['rank_id'],
            'surname' => $data['surname'],
            'othername' => $data['othername'],
            'sex' => $data['sex'],
            'state_of_origin' => $data['state_of_origin'],
            'tribe' => $data['tribe'],
            'zone' => $data['zone'],
            'dob' => $data['dob'],
            'doe' => $data['doe'],
            'last_promot' => $data['last_promot'],
            'retirement' => $data['retirement'],
            'date_transfer_to_command' => $data['date_transfer_to_command'],
            'command_served_last' => $data['command_served_last'],
            'qualification' => $data['qualification'],
            'discipline' => $data['discipline'],
            'general_duty_specialist' => $data['general_duty_specialist'],
            'duty_post_division' => $data['duty_post_division'],
            'date_transfer_to_division' => $data['date_transfer_to_division'],
            'date_reported_in_command' => $data['date_reported_in_command'],
            'phone' => $data['phone'],
            'recruited_as' => $data['recruited_as'],
            'address' => $data['address'],
            'nok' => $data['nok'],
            'nop' => $data['nop'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
