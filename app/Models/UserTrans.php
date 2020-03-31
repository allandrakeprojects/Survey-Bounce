<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class UserTrans extends Model{
    //
    protected $table = 'user_trans';
    protected $fillable = ['user_id','purpose', 'type', 'status', 'title', 'description','amount','extra'];




    static function getOS() {

        // global $user_agent;

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $os_platform  = "Unknown OS Platform";

        $os_array     = array(
            '/windows nt 10/i'      =>  'Windows',
            '/windows nt 6.3/i'     =>  'Windows',
            '/windows nt 6.2/i'     =>  'Windows',
            '/windows nt 6.1/i'     =>  'Windows',
            '/windows nt 6.0/i'     =>  'Windows',
            '/windows nt 5.2/i'     =>  'Windows',
            '/windows nt 5.1/i'     =>  'Windows',
            '/windows xp/i'         =>  'Windows',
            '/windows nt 5.0/i'     =>  'Windows',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac',
            '/mac_powerpc/i'        =>  'Mac',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $os_platform = $value;

        return $os_platform;
    }





}
