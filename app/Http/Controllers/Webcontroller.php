<?php

namespace App\Http\Controllers;

use App\Http\Requests\Postrequest;
use App\Jobs\ImageConvention;
use App\Models\Aboutstella;
use App\Models\Photos;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Models\Post;

class Webcontroller extends Controller
{
    public function home()
    {
        SEOMeta::setTitle('Stella Jomo | Home');
    	SEOMeta::setDescription('Official Homepage of Stella Jomo Ministries');
    	SEOMeta::setCanonical(route('webhome'));
    	SEOMeta::setKeywords('Stella Jomo, Jomo, Ministry, ministries, Nyame Abasa, new covenant, ncwc, stellajomo, stella, stella_jomo, jomo_stella, Stella Homepage, Stella Aboutpage, stellajomo, stellajomo ministries, stellajomo ministry, gosple, music, gosple artist, music in ghana, gosple music in ghana, gosple songs, worship songs');
    	OpenGraph::setDescription('Official Homepage of Stella Jomo Ministries');
    	OpenGraph::setTitle('Stella Jomo | Home');
    	OpenGraph::setUrl(route('webhome'));
    	OpenGraph::addProperty('type', 'website');
    	OpenGraph::addImage(URL::to('web/images/banner1.jpg'));

    	TwitterCard::setTitle('Stella Jomo | Home');
    	TwitterCard::setSite('@stella_jomo');
    	TwitterCard::setImage(URL::to('web/images/banner1.jpg'));
    	TwitterCard::setDescription('Official Homepage of Stella Jomo Ministries');

    	JsonLd::setTitle('Stella Jomo | Home');
    	JsonLd::setDescription('Official Homepage of Stella Jomo Ministries');
    	JsonLd::addImage(URL::to('web/images/banner1.jpg'));

    	$post = Post::latest()->get();

        return view('web.home',['posts' => $post]);
    }


    public function contact()
    {
        SEOMeta::setTitle('Stella Jomo | Contact Us');
        SEOMeta::setDescription('Want to get in touch? we enjoy hearing from visitors');
        SEOMeta::setCanonical(route('contactus'));
        SEOMeta::setKeywords('Stella Jomo, Jomo, Ministry, ministries, Nyame Abasa, new covenant, ncwc, stellajomo, stella, stella_jomo, jomo_stella, Stella Homepage, Stella Aboutpage, stellajomo, stellajomo ministries, stellajomo ministry, gosple, music, gosple artist, music in ghana, gosple music in ghana, gosple songs, worship songs');
        OpenGraph::setDescription('Want to get in touch? we enjoy hearing from visitors');
        OpenGraph::setTitle('Stella Jomo | Contact Us');
        OpenGraph::setUrl(route('contactus'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(URL::to('web/images/banner1.jpg'));

        TwitterCard::setTitle('Stella Jomo | Contact Us');
        TwitterCard::setSite('@stella_jomo');
        TwitterCard::setImage(URL::to('web/images/banner1.jpg'));
        TwitterCard::setDescription('Official Homepage of Stella Jomo Ministries');

        JsonLd::setTitle('Stella Jomo | Contact Us');
        JsonLd::setDescription('Want to get in touch? we enjoy hearing from visitors');
        JsonLd::addImage(URL::to('web/images/banner1.jpg'));
        return view('web.contact');
    }


    public function about()
    {
        $about = Aboutstella::first();

        SEOMeta::setTitle('Stella Jomo | About Stella Jomo Ministries');
        SEOMeta::setDescription($about->about);
        SEOMeta::setCanonical(route('bio'));
        SEOMeta::setKeywords('Stella Jomo, Jomo, Ministry, ministries, Nyame Abasa, new covenant, ncwc, stellajomo, stella, stella_jomo, jomo_stella, Stella Homepage, Stella Aboutpage, stellajomo, stellajomo ministries, stellajomo ministry, gosple, music, gosple artist, music in ghana, gosple music in ghana, gosple songs, worship songs');
        OpenGraph::setDescription($about->about);

        OpenGraph::setTitle('Stella Jomo | About Stella Jomo Ministries');
        OpenGraph::setUrl(route('bio'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(URL::to('web/images/banner1.jpg'));

        TwitterCard::setTitle('Stella Jomo | About Stella Jomo Ministries');
        TwitterCard::setSite('@stella_jomo');
        TwitterCard::setImage(URL::to('web/images/banner1.jpg'));
        TwitterCard::setDescription($about->about);

        JsonLd::setTitle('Stella Jomo | About Stella Jomo Ministries');
        JsonLd::setDescription($about->about);
        JsonLd::addImage(URL::to('web/images/banner1.jpg'));
        return view('web.bio',['about' => $about]);
    }


    public function gallary()
    {
        
        SEOMeta::setTitle('Stella Jomo | Gallary');
        SEOMeta::setDescription('Photos of stella Jomo, click to watch');
        SEOMeta::setCanonical(route('gallary'));
        SEOMeta::setKeywords('Stella Jomo, Jomo, Ministry, ministries, Nyame Abasa, new covenant, ncwc, stellajomo, stella, stella_jomo, jomo_stella, Stella Homepage, Stella Aboutpage, stellajomo, stellajomo ministries, stellajomo ministry, gosple, music, gosple artist, music in ghana, gosple music in ghana, gosple songs, worship songs');
        OpenGraph::setDescription('Photos of stella Jomo, click to watch');
        OpenGraph::setTitle('Stella Jomo | Gallary');
        OpenGraph::setUrl(route('gallary'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(URL::to('web/images/banner1.jpg'));

        TwitterCard::setTitle('Stella Jomo | Gallary');
        TwitterCard::setSite('@stella_jomo');
        TwitterCard::setImage(URL::to('web/images/banner1.jpg'));
        TwitterCard::setDescription('Photos of stella Jomo, click to watch');

        JsonLd::setTitle('Stella Jomo | Gallary');
        JsonLd::setDescription('Photos of stella Jomo, click to watch');
        JsonLd::addImage(URL::to('web/images/banner1.jpg'));

        $photos = Photos::latest()->get();        
        return view('web.photos',['photos' => $photos]);
    }

    public function audio()
    {
        SEOMeta::setTitle('Stella Jomo | Audios');
        SEOMeta::setDescription('Download stella jomo music audios');
        SEOMeta::setCanonical(route('audio'));
        SEOMeta::setKeywords('Stella Jomo, Jomo, Ministry, ministries, Nyame Abasa, new covenant, ncwc, stellajomo, stella, stella_jomo, jomo_stella, Stella Homepage, Stella Aboutpage, stellajomo, stellajomo ministries, stellajomo ministry, gosple, music, gosple artist, music in ghana, gosple music in ghana, gosple songs, worship songs');
        OpenGraph::setDescription('Download stella jomo music audios');
        OpenGraph::setTitle('Stella Jomo | Audios');
        OpenGraph::setUrl(route('audio'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(URL::to('web/images/banner1.jpg'));

        TwitterCard::setTitle('Stella Jomo | Audios');
        TwitterCard::setSite('@stella_jomo');
        TwitterCard::setImage(URL::to('web/images/banner1.jpg'));
        TwitterCard::setDescription('Download stella jomo music audios');

        JsonLd::setTitle('Stella Jomo | Audios');
        JsonLd::setDescription('Download stella jomo music audios');
        JsonLd::addImage(URL::to('web/images/banner1.jpg'));
        return view('web.audio');
    }

     public function shop()
    {
        SEOMeta::setTitle('Stella Jomo | Shop');
        SEOMeta::setDescription('Shop dvds, cds, album, music to help the ministry of stella jomo');
        SEOMeta::setCanonical(route('shop'));
        SEOMeta::setKeywords('Stella Jomo, Jomo, Ministry, ministries, Nyame Abasa, new covenant, ncwc, stellajomo, stella, stella_jomo, jomo_stella, Stella Homepage, Stella Aboutpage, stellajomo, stellajomo ministries, stellajomo ministry, gosple, music, gosple artist, music in ghana, gosple music in ghana, gosple songs, worship songs');
        OpenGraph::setDescription('Shop dvds, cds, album, music to help the ministry of stella jomo');
        OpenGraph::setTitle('Stella Jomo | Shop');
        OpenGraph::setUrl(route('shop'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(URL::to('web/images/banner1.jpg'));

        TwitterCard::setTitle('Stella Jomo | Shop');
        TwitterCard::setSite('@stella_jomo');
        TwitterCard::setImage(URL::to('web/images/banner1.jpg'));
        TwitterCard::setDescription('Shop dvds, cds, album, music to help the ministry of stella jomo');

        JsonLd::setTitle('Stella Jomo | Shop');
        JsonLd::setDescription('Shop dvds, cds, album, music to help the ministry of stella jomo');
        JsonLd::addImage(URL::to('web/images/banner1.jpg'));
        return view('web.shop');
    }

    public function feeds()
    {
        SEOMeta::setTitle('Stella Jomo | News Feeds');
        SEOMeta::setDescription('Get all the latest updates from stella jomo social media handles, youtube, twitter, facebook, instagram news feeds');
        SEOMeta::setCanonical(route('feeds'));
        SEOMeta::setKeywords('Stella Jomo, Jomo, Ministry, ministries, Nyame Abasa, new covenant, ncwc, stellajomo, stella, stella_jomo, jomo_stella, Stella Homepage, Stella Aboutpage, stellajomo, stellajomo ministries, stellajomo ministry, gosple, music, gosple artist, music in ghana, gosple music in ghana, gosple songs, worship songs');
        OpenGraph::setDescription('Get all the latest updates from stella jomo social media handles, youtube, twitter, facebook, instagram news feeds');
        OpenGraph::setTitle('Stella Jomo | News Feeds');
        OpenGraph::setUrl(route('feeds'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(URL::to('web/images/banner1.jpg'));

        TwitterCard::setTitle('Stella Jomo | News Feeds');
        TwitterCard::setSite('@stella_jomo');
        TwitterCard::setImage(URL::to('web/images/banner1.jpg'));
        TwitterCard::setDescription('Get all the latest updates from stella jomo social media handles, youtube, twitter, facebook, instagram news feeds');

        JsonLd::setTitle('Stella Jomo | News Feeds');
        JsonLd::setDescription('Get all the latest updates from stella jomo social media handles, youtube, twitter, facebook, instagram news feeds');
        JsonLd::addImage(URL::to('web/images/banner1.jpg'));
        return view('web.feeds');
    }


    public function eventid($id)
    {
        $posts = Post::latest()->where('slug','!=', $id)->get();
        $post = Post::where('slug',$id)->first();

        SEOMeta::setTitle('Stella Jomo | Event Information');
        SEOMeta::setDescription(strip_tags($post->body));
        SEOMeta::setCanonical(route('eventid',['id' => $post->slug]));
        SEOMeta::setKeywords('Stella Jomo, Jomo, Ministry, ministries, Nyame Abasa, new covenant, ncwc, stellajomo, stella, stella_jomo, jomo_stella, Stella Homepage, Stella Aboutpage, stellajomo, stellajomo ministries, stellajomo ministry, gosple, music, gosple artist, music in ghana, gosple music in ghana, gosple songs, worship songs');
        OpenGraph::setDescription(strip_tags($post->body));
        OpenGraph::setTitle('Stella Jomo | Event Information');
        OpenGraph::setUrl(route('eventid',['id' => $post->slug]));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(URL::to('web/images/banner1.jpg'));

        TwitterCard::setTitle('Stella Jomo | Event Information');
        TwitterCard::setSite('@stella_jomo');
        TwitterCard::setImage(URL::to('web/images/banner1.jpg'));
        TwitterCard::setDescription(strip_tags($post->body));

        JsonLd::setTitle('Stella Jomo | Event Information');
        JsonLd::setDescription(strip_tags($post->body));

        return view('web.eventinfo',['post' => $post, 'uniquid' => $id, 'posts' => $posts]);
    }


    public function events()
    {
        
        SEOMeta::setTitle('Stella Jomo | Events');
        SEOMeta::setDescription('Get all latest or upcoming events update from stella jomo official website');
        SEOMeta::setCanonical(route('events'));
        SEOMeta::setKeywords('Stella Jomo, Jomo, Ministry, ministries, Nyame Abasa, new covenant, ncwc, stellajomo, stella, stella_jomo, jomo_stella, Stella Homepage, Stella Aboutpage, stellajomo, stellajomo ministries, stellajomo ministry, gosple, music, gosple artist, music in ghana, gosple music in ghana, gosple songs, worship songs');
        OpenGraph::setDescription('Get all latest or upcoming events update from stella jomo official website');
        OpenGraph::setTitle('Stella Jomo | Events');
        OpenGraph::setUrl(route('events'));
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(URL::to('web/images/banner1.jpg'));

        TwitterCard::setTitle('Stella Jomo | Events');
        TwitterCard::setSite('@stella_jomo');
        TwitterCard::setImage(URL::to('web/images/banner1.jpg'));
        TwitterCard::setDescription('Get all latest or upcoming events update from stella jomo official website');

        JsonLd::setTitle('Stella Jomo | Events');
        JsonLd::setDescription('Get all latest or upcoming events update from stella jomo official website');
        JsonLd::addImage(URL::to('web/images/banner1.jpg'));
        $posts = Post::paginate(10);
        return view('web.events',['posts' => $posts]);
    }




// add_post

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function add_post()
    {
        return view('admin.add-post');
    }
    

    public function save_post(Postrequest $request)
    {
        //dd($request);

        //$new = asset('storage/posts/')."1". '/' ."idjjd.jp";

        // http://stellajomo.com/storage/posts/HLLCWQkYvupWg5Q9uaDXNAwClmG5IQWt829T3dx8.jpg

        // http://stellajomo.com/storage/posts1/idjjd.jp

        //dd($new);

        if ($request->has('hiddenid')) {

        	$data = [
        	'title' => $request->input('title'),
        	'edesc' => $request->input('eventdesc'),
        	'edate' => $request->input('eventdate'),
           ];

           $id = $request->input('hiddenid');
           $post = Post::where('id',$id)->update($data);

           if ($request->has('picart')) {
           	$post = Post::where('id',$id)->first();
           	$file = $post->picart;
		    $storage= Storage::disk('public')->delete($file);

           	$post->picart = $request->file('picart')
           	->store('posts','public');
           	$post->save();

           	$this->dispatch(new ImageConvention($post->id));

           	//Artisan::call('queue:work');
           	//Artisan::call('email:send 1 --queue=default');

           }


           return Redirect()->route('all_post')->with('message','Event Updated Successfully!');
        }

        $data = [
        	'picart' => $request->file('picart')
        	->store('posts','public'),
        	'title' => $request->input('title'),
        	'edesc' => $request->input('eventdesc'),
        	'edate' => $request->input('eventdate'),
        	'uniqueid' => uniqid(), 
        ];

        $post = new Post($data);
        $post->save();


        $this->dispatch(new ImageConvention($post->id));

        //Artisan::call('queue:work');

        return Redirect()->back()->with('message','Event Post Added Successfully!');
    }



    public function all_post()
    {
        $posts = Post::latest()->get();
        return view('admin.all-post',['posts' => $posts]);
    }



    public function edit_post($id)
    {
        $post = Post::where('id',$id)->first();
        return view('admin.edit-post',['post' => $post]);
    }


    public function delete_post($id)
    {
        $post = Post::where('id',$id)->first();
        $file = $post->picart;

        if ($file) {
        	Storage::disk('public')->delete($file);
        }

        $post->delete();

        return Redirect()->back()->with('message','Event Post Deleted Successfully!');
    }




    public function sitemap()
    {
        $posts = Post::latest()->get();

        return response()->view('web.sitemap',['posts' => $posts])
        ->header('Content-Type', 'text/xml');
    }




















}
