<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;

class ImageConvention implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $post = Post::where('id',$this->id)->first();
        $img = $post->picart;
        $full = asset('storage').'/'.$img;

        Storage::disk('processimage')->makeDirectory($this->id);

        $array = ['350x250','900x500','480x380'];

        $count = 0;
        foreach($array as $val){
            $img = Image::make($full);

            if ($count == 0) {
                $img->resize(350, 250);
            }

            if ($count == 1) {
                $img->resize(900, 500);
            }

            if ($count == 2) {
                $img->resize(480, 380);
            }
            
            $img->save(storage_path('app/public/processimage/'.$this->id . '/' . $val.".jpg"));

            $count++; 
        }

    }
}
