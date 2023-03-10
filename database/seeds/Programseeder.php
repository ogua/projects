<?php

use Illuminate\Database\Seeder;

class Programseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Programme(
            [
                'name'=> 'Bachelor of Arts in Public Relations Management',
                'type'=> 'Degree Programme'
            ]
        );
        $post->save();

         $post = new \App\Programme(
            [
                'name'=> 'Diploma in Accounting',
                'type'=> 'Diploma Programme'
            ]
        );
         $post->save();


          $post = new \App\Programme(
            [
                'name'=> 'Bachelor of Science in Accounting',
                'type'=> 'Degree Programme'
            ]
        );
          $post->save();



          $post = new \App\Programme(
            [
                'name'=> 'Bachelor of Science in Accounting and Finance',
                'type'=> 'Degree Programme'
            ]
        );
          $post->save();


        $post = new \App\Programme(
            [
                'name'=> 'Bachelor of Science in Business Economics',
                'type'=> 'Degree Programme'
            ]
        );  
        $post->save();


        $post = new \App\Programme(
            [
                'name'=> 'Bachelor of Science in Actuarial Science',
                'type'=> 'Degree Programme'
            ]
        ); 
        $post->save();

        $post = new \App\Programme(
            [
                'name'=> 'Bachelor of Science  in Banking and Finance',
                'type'=> 'Degree Programme'
            ]
        ); 
        $post->save();


        $post = new \App\Programme(
            [
                'name'=> 'Bachelor of Business Administration',
                'type'=> 'Degree Programme'
            ]
        ); 
        $post->save();

        $post = new \App\Programme(
            [
                'name'=> 'Diploma in Management',
                'type'=> 'Diploma Programme'
            ]
        ); 
        $post->save();


         $post = new \App\Programme(
            [
                'name'=> 'Diploma in Public Relations',
                'type'=> 'Diploma Programme'
            ]
        ); 
         $post->save();

          $post = new \App\Programme(
            [
                'name'=> 'Diploma in Information Technology Management',
                'type'=> 'Diploma Programme'
            ]
        ); 
          $post->save();

    }
}
