<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Referral;
use Illuminate\Support\Facades\Validator;
use App\Models\UserTrans;
use App\Helpers\UserSystemInfoHelper;



class HomeController extends Controller
{

    private $video_title;
    private $video_desc;

    private $instagram_title;
    private $tiktok_title;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        // $this->middleware('auth');
        $this->video_title = 'Khalil Ur Rehman Interview With Fiza Akbar Khan | Aisay Nahi chalega with Fiza Akbar Khan';
        $this->video_desc = 'Peshawar Zalmi Ka Behtareen Khiladi - Amanat Chunn Sohail Ahmed - Hasb e Haal - Dunya News\n\nWatch Hasb e Haal , a Political Comedy Show aired on Dunya News . Where Host Junaid Saleem is joined by Sohail Ahmad along with fellow comedians as they use Humor and Comedy to Discuss different matters on Country Politics and Social Issues .\nWatch, Share , SUBSCRIBE & Enjoy .';

// https://www.instagram.com/p/tC4ISmABTA/
        $this->instagram_title = 'Public park at muzafrabad';

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home.home_page');
    }

    public function dashboard(){
        $userID         = auth()->user()->id;
        $referral_count = Referral::where('referral_by',$userID)->where('status', '=', 'complete')->count();
        $click_count = Referral::where('referral_by', '=', $userID)->where('status', '=', 'link')->count();
        $earning        = UserTrans::where('user_id',$userID)->sum('amount');

        return view('earn.dashboard', array(
            'referral_count' => $referral_count,
            'click_count' => $click_count,
            'earning' => $earning)
        );
    }

    public function welcome(){
        $userID         = auth()->user()->id;
        $referral_count = Referral::where('referral_by',$userID)->count();
        $earning        = UserTrans::where('user_id',$userID)->sum('amount');
        return view('earn.welcome', array(
            'referral_count' => $referral_count,
            'earning' => $earning)
        );
    }


    function refer_page(){
        $userID         = auth()->user()->id;
        $earning        = UserTrans::where('user_id',$userID)->sum('amount');

        return view('earn.refer_page', array(
            'earning' => $earning)
        );
    }

    function chat(){
        return view('earn.chat');
    }

    function taskwall(){
        return view('earn.offer_wall');
    }

    function reviewwall(Request $request){

//        echo UserTrans::getOS();
//
//        exit;
//
//        exit;
//        echo $request->header('User-Agent');;
//        echo "<br>";
//        echo $_SERVER['HTTP_USER_AGENT']; exit;
        return view('earn.reviewwall');
    }

    function promo(){
        return view('earn.promo');
    }

    function get_youtube_title($video_id){






        foreach ($decoded['items'] as $items) {
            $title= $items['snippet']['title'];
            return $title;
        }
    }

    function youtube(){
//        $client = new \GuzzleHttp\Client;
//        $response = $client->get('https://www.googleapis.com/youtube/v3/videos?part=snippet&id=v842T1VqWG8&key=AIzaSyC_ofhhHhAhJqAN2Pfwx5XAH-94oYq2UdA', []);
//        $response = json_decode($response->getBody(), true);
//        print_r($response); exit;
        return view('earn.youtube');
    }

    function youtube_video_submit(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'url' => ['required','url',function ($attribute, $value, $fail) use ($request) {
        //         $urlParts = explode('v=',$request->get('url'));
        //        //  https://www.googleapis.com/youtube/v3/videos?part=snippet&id=v842T1VqWG8&key=AIzaSyC_ofhhHhAhJqAN2Pfwx5XAH-94oYq2UdA
        //         if( isset( $urlParts[1] ) ){



        //             $video_id = $urlParts[1];
        //             $url       = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$video_id.'&key=AIzaSyC_ofhhHhAhJqAN2Pfwx5XAH-94oYq2UdA';

        //             $client = new \GuzzleHttp\Client;
        //             $response = $client->get($url, []);
        //             $decoded = json_decode($response->getBody(), true);
        //             // echo $decoded['items'][0]['snippet']['title']; exit;
        //             $title  =  $decoded['items'][0]['snippet']['title'];
        //             $desc   =  $decoded['items'][0]['snippet']['description'];
        //             // if( ! (($title == $this->video_title) && ($desc == $this->video_desc)) ){
        //             if( $title != $this->video_title){
        //                 $fail($attribute.' Title or Description not match ');
        //             }
        //         }else{
        //             $fail($attribute.' Video ID not found! ');
        //         }
        //     }]
        // ]);


        // if ($validator->fails()) {
        //     // return response()->json(array('status' => false,'data'=> [], 'message' => $validator->errors()->first()));
        //     return redirect('youtube')
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        UserTrans::create([
            'user_id'       => auth()->user()->id,
            'amount'        => 50,
            'purpose'       => 'upload_video',
            'title'         => 'Upload Youtube Video',
            'description'   => 'You have uploaded youtube video.',
            'extra'         => $request->get('url')
        ]);

        $request->session()->flash('status_message', 'Video Added successfully. Add earn $50.');
        return redirect('youtube');
    }

    function facebook(){
        $userID         = auth()->user()->id;
        $earning        = UserTrans::where('user_id',$userID)->sum('amount');

        return view('earn.facebook', array(
            'earning' => $earning)
        );
    }

    function facebook_post(){
        return view('earn.facebook_post');
    }


    function account(){
        return view('earn.account');
    }

    function payments(){
        return view('earn.payments');
    }

    function rewards(){
        return view('earn.rewards');
    }

    function cashout(){
        $userID         = auth()->user()->id;
        $earning        = UserTrans::where('user_id',$userID)->sum('amount');

        return view('earn.cashout', array(
            'earning' => $earning)
        );
    }

    function help()
    {
        return view('earn.help');
    }

    function instagram(){
        return view('earn.instagram',array('instagram_title' => $this->instagram_title));
    }

    function instagram_submit(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'url' => ['required','url',function ($attribute, $value, $fail) use ($request) {
        //            // $html       = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$video_id.'&key=AIzaSyC_ofhhHhAhJqAN2Pfwx5XAH-94oYq2UdA';
        //            //  $html = "https://api.instagram.com/oembed/?url=".$request->get('url');
        //         $urlParts = explode('/p/',$request->get('url'));
        //         if( isset( $urlParts[1] ) ){
        //             $post_id = $urlParts[1];
        //             // $html       = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$video_id.'&key=AIzaSyC_ofhhHhAhJqAN2Pfwx5XAH-94oYq2UdA';
        //             $url       =  'http://api.instagram.com/oembed/?url=http://www.instagram.com/p/'.$post_id;

        //             $client = new \GuzzleHttp\Client;
        //             $response = $client->get($url, []);
        //             $decoded = json_decode($response->getBody(), true);
        //             $title      =  $decoded['title'];
        //             if( $title != $this->instagram_title){
        //                 $fail($attribute.' Title or Description not match');
        //             }
        //         }else{
        //             $fail($attribute.' Post ID not found! ');
        //         }
        //     }]
        // ]);


        // if ($validator->fails()) {
        //     // return response()->json(array('status' => false,'data'=> [], 'message' => $validator->errors()->first()));
        //     return redirect('instagram')
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        UserTrans::create([
            'user_id'       => auth()->user()->id,
            'amount'        => 50,
            'purpose'       => 'upload_insta',
            'title'         => 'Upload Insta Post',
            'description'   => 'You have uploaded insta post.',
            'extra'         => $request->get('url')
        ]);

        $request->session()->flash('status_message', 'Post Uploaded successfully. Add earn $50.');
        return redirect('instagram');
    }

    function tiktok(){
        return view('earn.tiktok');
    }

    function tiktok_submit(Request $request){
        // https://www.tiktok.com/oembed?url=https://www.tiktok.com/@scout2015/video/6718335390845095173

//         $validator = Validator::make($request->all(), [
//             'url' => ['required','url',function ($attribute, $value, $fail) use ($request) {


//                 // https://www.tiktok.com/@soniakhan1000/video/6804024441744510209
//                 // https://www.tiktok.com/oembed?url=https://www.tiktok.com/@scout2015/video/6718335390845095173
//                 $url        =  'https://www.tiktok.com/oembed?url='.$request->get('url');
// //                $response   =  file_get_contents($html);
// //                $decoded    =  json_decode($response, true);

//                 $client     =   new \GuzzleHttp\Client;
//                 $response   =   $client->get($url, []);
//                 $decoded    =   json_decode($response->getBody(), true);
//                 $title      =   $decoded['title'];

//                 if( $title != $this->tiktok_title){
//                     $fail($attribute.' Title or Description not match');

//                 }
//             }]
//         ]);
//         if ($validator->fails()) {
//             return redirect('instagram')->withErrors($validator)->withInput();
//         }
        UserTrans::create([
            'user_id'       => auth()->user()->id,
            'amount'        => 50,
            'purpose'       => 'upload_tiktok',
            'title'         => 'Upload Tiktok Post',
            'description'   => 'You have uploaded tiktok post.',
            'extra'         => $request->get('url')
        ]);
        $request->session()->flash('status_message', 'Post Uploaded successfully. Add earn $50.');
        return redirect('tiktok');
    }

    function offer_wall_listing(Request $request){
        // $service = App::make('DimsavIpServiceIpService');

        // // country code for the given ip address
        // echo $service->getCountryCodeFromIp('123.123.123.123');
        // // country code for the client's ip address
        // echo $service->getCountryCodeFromClientIp();

        $os = UserTrans::getOS();
        if($os == 'Windows'){
            $device = 'desktop';
        }elseif($os == 'Andoird'){
             $device = 'Andoird';
        }else{
            $device = $os;
        }
        return view('earn.offer_wall',['device' => $device]);
    }

    function about_us(){
        return view('static_pages.about_us');
    }

    function contact_us(){
        return view('static_pages.contact_us');
    }

    function contact_us_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'message'  => 'required|min:20'
        ]);
        if ($validator->fails()) {
            return redirect('contact-us')
                ->withErrors($validator)
                ->withInput();
        }
        $body = $name.' '.$email.' '.$message;
        mail('ahmedshabbirawan@gmail.com','Message from Web',$body);
        echo "<h3>Thanks for contact us!</h3>";
    }



    function payment_proofs(){
        return view('static_pages.payment_proofs');
    }

    function video_testimonials(){
        return view('static_pages.video_testimonials');
    }

    function faq_2(){
        return view('static_pages.faq_2');
    }

    function terms(){
        return view('static_pages.terms');
    }

    function privacy_policy(){
        return view('static_pages.privacy_policy');
    }

}
