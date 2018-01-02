<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Http\Requests\MovieRequest;
use Intervention\Image\ImageManager;
use App\movie;
use App\MovieCategory;


class Admincontroller extends Controller
{
    private $movie;
    
    private $filesystem;

    private $movieCategory;
    
    private $imagemanager;

// constructor
    public function __construct(Movie $movie, MovieCategory $movieCategory, Filesystem $filesystem, ImageManager $imagemanager)
    {
        $this->movie = $movie;
        
        $this->moviecategory = $movieCategory;
        
        $this->filesystem = $filesystem;
    
        $this->imagemanager = $imagemanager;

    }

// home admin
    public function home()
    {     
        return view('admin.home');
    }

// create movie
    public function create()
    {
        $category = $this->moviecategory->all();

        return view('movies.create', compact('category'));
    }
// store create
    public function store(MovieRequest $request)
    {
        $movie = $request->except("photo");

        if($request->hasfile('photo')) {
            $movie['photo'] = $this->generatePhoto($request->file('photo'), $request->except('photo'));
        }
    
        $this->movie->create($movie);

        session()->flash('success_message', 'data berhasil di tambah');
    
        return redirect('/admin');
    }
//delete 
    public function destroy($id)
    {
        $movie = $this->movie->find($id);

        if($movie) {
            $movie->delete();
        }

        return redirect()->back();
    }

}