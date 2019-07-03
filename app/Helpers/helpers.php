<?php

use Carbon\Carbon ;
use App\User;
use App\jobTasks;
use App\Job;
use App\Http\Controllers\EmailController; 
    
    function assetsUrl()
    {
        
        $url = url('/'); 

        return $url; 

    }
    
    function getUser ( $user_id = '' ) {

        if ($user_id == '') {

            return Auth::user();

        } else {

            return User::find($user_id);
        }

    }

    

        function getJobStatus($id){

        $totalTasks = JobTasks::where('job_id' , $id)->count();
        $completedTasks = JobTasks::where('job_id' , $id)->where('status' , 1)->count();
        $job = Job::findorFail($id);
        if($completedTasks == '0'){
            $job->status = "pending";
            $job->save();
            return $job->status;
        }
        elseif($totalTasks == $completedTasks){
            $job->status = "completed";
            $job->save();
            return $job->status;

        }
        elseif($totalTasks > $completedTasks){
            $job->status = "in-progress";
            $job->save();
            return $job->status;
        }
        return $job->status;
       
    }



if (!function_exists('isAdmin')) {

    /**
     * @return mixed
     */
    function isAdmin()
    {
        return (@getUser() && getUser()->user_type=='admin')?true: false;
    }
}
if (!function_exists('isEmployee')) {

    /**
     * @return mixed
     */
    function isEmployee()
    {
        return (@getUser() && getUser()->user_type=='employee')?true: false;
    }
}


  function UserName()
    {
        return ucfirst(getUser()->first_name) .' '. ucfirst(getUser()->last_name); 
    }



//     function getUserMeta($user_id ='') {

//         if ($user_id == '') {

//             $user = UserMeta::where('user_id', getUser()->id )->first();

//         } else {

//             $user = UserMeta::where('user_id', $user_id  )->first();

//         }
//         return  $user;
//     }
//     function getUserAvatar($user_id ='') {

//         if ($user_id == '') {

//             $user = getUserMeta();

//         } else {
//             $user = getUserMeta($user_id);
//         }

//         if  ( null != $user->avatar ) {
//             return $user->avatar;
//         } else {
//             return 'avatar.jpg';
//         }
//     }

    

//     function sendEmail($emailData)
//     {
        
//         $email = EmailController::sendEmail($emailData);
       
//         if ($emailData['action'] == 'view') {
            
//             return $email;
            
//         } else if ($email == false ) {
//            return false; 
//         } else {
//             return true; 
//         }

//     }
    
//     /*
//     * 
//     * Returns the formatted date
//     * @param Carbon $dateTime object
//     * @return: date string
//     * 
//     */

//    function formatted_date($date)
//    {
//        if(!empty($date))
//        {
//            return Carbon::parse($date)->format('jS M, Y');
//        }else{
//            return "";
//        }
//    }

// if (!function_exists('storeImage')) {

//     /**
//      * Default Store Image to river_images folder
//      *
//      * @param $image
//      * @param null $name
//      * @param string $folder
//      * @return mixed
//      */
//     function storeImage($image, $folder = 'avatars', $file_name = null)
//     {
//         if(is_null($file_name)) {
//             $file_name = str_random(6);
//         }
//         $name = $file_name . '-' . rand(1, 6000) . '.' . $image->extension();
//         return \Storage::disk('public')->putFileAs($folder, $image, $name);
//     }
// }

// if (!function_exists('getAmericanStates')) {

//     /**
//      * @return array
//      */
//     function getAmericanStates()
//     {
//         return array(
//             'AL' => 'Alabama',
//             'AK' => 'Alaska',
//             'AZ' => 'Arizona',
//             'AR' => 'Arkansas',
//             'CA' => 'California',
//             'CO' => 'Colorado',
//             'CT' => 'Connecticut',
//             'DE' => 'Delaware',
//             'DC' => 'District Of Columbia',
//             'FL' => 'Florida',
//             'GA' => 'Georgia',
//             'HI' => 'Hawaii',
//             'ID' => 'Idaho',
//             'IL' => 'Illinois',
//             'IN' => 'Indiana',
//             'IA' => 'Iowa',
//             'KS' => 'Kansas',
//             'KY' => 'Kentucky',
//             'LA' => 'Louisiana',
//             'ME' => 'Maine',
//             'MD' => 'Maryland',
//             'MA' => 'Massachusetts',
//             'MI' => 'Michigan',
//             'MN' => 'Minnesota',
//             'MS' => 'Mississippi',
//             'MO' => 'Missouri',
//             'MT' => 'Montana',
//             'NE' => 'Nebraska',
//             'NV' => 'Nevada',
//             'NH' => 'New Hampshire',
//             'NJ' => 'New Jersey',
//             'NM' => 'New Mexico',
//             'NY' => 'New York',
//             'NC' => 'North Carolina',
//             'ND' => 'North Dakota',
//             'OH' => 'Ohio',
//             'OK' => 'Oklahoma',
//             'OR' => 'Oregon',
//             'PA' => 'Pennsylvania',
//             'RI' => 'Rhode Island',
//             'SC' => 'South Carolina',
//             'SD' => 'South Dakota',
//             'TN' => 'Tennessee',
//             'TX' => 'Texas',
//             'UT' => 'Utah',
//             'VT' => 'Vermont',
//             'VA' => 'Virginia',
//             'WA' => 'Washington',
//             'WV' => 'West Virginia',
//             'WI' => 'Wisconsin',
//             'WY' => 'Wyoming',
//         );

//     }
// }

// if (!function_exists('getMonth')) {

//     /**
//      * @return array
//      */
//     function getMonth()
//     {
//         return [
//             '1'=>'01',
//             '2'=>'02',
//             '3'=>'03',
//             '4'=>'04',
//             '5'=>'05',
//             '6'=>'06',
//             '7'=>'07',
//             '8'=>'08',
//             '9'=>'09',
//             '10'=>'10',
//             '11'=>'11',
//             '12'=>'12'
//         ];

//     }
// }

// if (!function_exists('getYear')) {

//     /**
//      * @return array
//      */
//     function getYear()
//     {
//         return [
//             '2018'=>'2018',
//             '2019'=>'2019',
//             '2020'=>'2020',
//             '2021'=>'2021',
//             '2022'=>'2022',
//             '2023'=>'2023',
//             '2024'=>'2024',
//             '2025'=>'2025',
//             '2026'=>'2026',
//             '2027'=>'2027',
//             '2028'=>'2028',
//             '2029'=>'2029',
//             '2030'=>'2030',

//         ];

//     }
// }


// function to_currency($value, $symbol = true)
// {
//     $value = (float) $value;
//     if ($symbol) {
//         //return "$" . number_format($value, 2, '.', '');
//         return "$" . number_format($value, 2);
//     } else {
//         return number_format($value, 2, '.', '');
//     }
// }

// function getNewOrderCount(){

//     $count = \App\Models\Order::where('is_new',1)->count(); 
//     if ($count== 0) {
//        return ''; 
//     }else {

//       return   '( ' .$count . ' )'; 
//     }
  
// }