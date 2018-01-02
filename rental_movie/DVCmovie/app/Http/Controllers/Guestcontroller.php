<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Http\Requests\MovieRequest;
use Intervention\Image\ImageManager;
use App\movie;
use App\moviesUser;
use App\MovieCategory;

class Guestcontroller extends Controller
{
        private $movie;
        
        private $moviesUser;

        private $movieCategory;
    
        private $filesystem;
    
        private $imagemanager;
        
// constructor
        public function __construct(Movie $movie,MoviesUser $moviesUser, MovieCategory $movieCategory, Filesystem $filesystem, ImageManager $imagemanager)
        {
            $this->movie = $movie;
        
            $this->moviesUser = $moviesUser;

            $this->moviecategory = $movieCategory;
    
            $this->filesystem = $filesystem;
            
            $this->imagemanager = $imagemanager;
    
        }
    
// detail (guest)
    public function detailguest($id)
    {
        $movies = $this->movie->find($id);
        
        return view('guest.detail', compact('movies'));
    }
// Rent
    public function rent(Request $request)
    {
        $data = $request->all();

        $sewa = $this->moviesUser->create([
            'user_id' => $data['user_id'],
            'movie_id' => $data['movie_id']
        ]);

        return redirect()->back();

    }
// Rent show
    public function rent_show()
    {
        return view('guest.rent');
    }
// List guest
    public function list()
    {
        $movies = $this->movie->with('MovieCategory')->orderBy('id', 'DESC')->paginate(10);
                        
        return view('guest.list', compact('movies'));
    }

// home guest
    public function home()
    {     
        return view('guest.guest');
    }


}
