<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Http\Requests\MovieRequest;
use Intervention\Image\ImageManager;
use App\movie;

class Logincontroller extends Controller
{
        private $movie;
            
        private $filesystem;
    
        private $imagemanager;
        
    // constructor
        public function __construct(Movie $movie, Filesystem $filesystem, ImageManager $imagemanager)
        {
            $this->movie = $movie;
                
            $this->filesystem = $filesystem;
            
            $this->imagemanager = $imagemanager;
    
        }

    // guest login
        public function guest()
        {     
            $movies = $this->movie->with('MovieCategory')->orderBy('id', 'DESC')->paginate(10);

            return view('guest.guest', compact('movies'));
        }
    
    // admin login
        public function admin()
        {     
            $movies = $this->movie->with('MovieCategory')->orderBy('id', 'DESC')->paginate(10);

            return view('admin.admin', compact('movies'));
        }
}
