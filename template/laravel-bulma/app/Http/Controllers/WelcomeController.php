<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    //

    public function index()
    {
        // Get json data
        $authors_json = file_get_contents('http://maqe.github.io/json/authors.json');
        $authors = (array) json_decode($authors_json);
        $posts_json = file_get_contents('http://maqe.github.io/json/posts.json');
        $posts = json_decode($posts_json);

        $postCollection = array();
        foreach($posts as $post){
            foreach($authors as $author){
                if($author->id == $post->author_id){
                    $authorPerson = $author;
                }
            }
            $postCollection[] = array(
                'post_id' => $post->id,
                'title' => $post->title,
                'body' => $post->body,
                'image_url' => $post->image_url,
                'created_at' => Carbon::parse($post->created_at)->diffForHumans(),
                'author' => (array) $authorPerson
            );
           
        }

        return view('maqetemplate',[
            'authors' => $authors,
            'posts' => $postCollection,
        ]);
    }
}
