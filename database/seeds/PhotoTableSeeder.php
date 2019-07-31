<?php

use App\Photo;
use Illuminate\Database\Seeder;

class PhotoTableSeeder extends Seeder
{
    public function run()
    {
        $postPhoto1 = new Photo;
        $postPhoto1->post_id = '1';
        $postPhoto1->url = 'posts/p1.jpg';
        $postPhoto1->save();

        $postPhoto2 = new Photo;
        $postPhoto2->post_id = '2';
        $postPhoto2->url = 'posts/p2.jpg';
        $postPhoto2->save();

        $postPhoto3 = new Photo;
        $postPhoto3->post_id = '3';
        $postPhoto3->url = 'posts/p3.jpg';
        $postPhoto3->save();

        $postPhoto4 = new Photo;
        $postPhoto4->post_id = '4';
        $postPhoto4->url = 'posts/p4.jpg';
        $postPhoto4->save();

    }
}
