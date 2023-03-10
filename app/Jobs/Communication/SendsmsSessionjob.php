<?php

namespace App\Jobs\Communication;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendsmsSessionjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $students;
    public $html;
    public $fullpath;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($students,$html,$fullpath)
    {
        $this->students = $students;
        $this->html = $html;
        $this->fullpath = $fullpath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->students as $student) {
           $email = $student->email;

           if ($this->fullpath == 'false') {
               //send without file
             

           }else{

                //send with file

           }
           
        }
    }
}
