<?php

namespace App\Jobs;

use App\Studentinfo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Graduatingtograduated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $students = Studentinfo::where('currentlevel','Graduating')->get();
        
        foreach ($students as $row) {
            $userid =  $row->id;

            $data = [
                'currentlevel' => 'Graduated'
            ];

            Studentinfo::findorfail($userid)->update($data);

        }

    }
}
