<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Http\Requests\MovieRequest;
use Intervention\Image\ImageManager;
use App\movie;
use App\users;
use App\MovieCategory;

class Moviecotroller extends Controller
{
    private $movie;

    private $users;

    private $movieCategory;

    private $filesystem;

    private $imagemanager;
    
// constructor
    public function __construct(Movie $movie, Users $users, MovieCategory $movieCategory, Filesystem $filesystem, ImageManager $imagemanager)
    {
        $this->movie = $movie;

        $this->users = $users;

        $this->moviecategory = $movieCategory;

        $this->filesystem = $filesystem;
        
        $this->imagemanager = $imagemanager;

    }
// tampilan awal
    public function index()
    {     
        $movies = $this->movie->with('MovieCategory')->orderBy('id', 'DESC')->paginate(10);

        return view('movies.index', compact('movies'));
    }

// detail
    public function detail($id)
    {
        $movies = $this->movie->find($id);
        
        return view('movies.detail', compact('movies'));
    }

// search
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $movies  = $this->movie->where('title', 'LIKE', "%$keyword%")
             ->orderBy('id', 'DESC')->paginate(10);
        $movies->appends(['keyword' => $keyword]);
        
        return view('movies.search', compact('movies'));
    }
// users table
    public function users()
    {
        $users = $this->users->orderBy('id', 'ASC')->paginate(10);
        
        return view('admin.users', compact('users'));
    }

// photo
    private function generatePhoto($photo, $data)
    {
        $filename = date('YmdHis').'-'.snake_case($data['title']).".".$this->filesystem->extension($photo->getClientOriginalName());
        $path = public_path("photos/").$filename;

        $this->imagemanager->make($photo->getRealPath())->save($path);
        
        return "/photos/".$filename;
    }
}
