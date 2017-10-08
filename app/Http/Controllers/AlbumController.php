<?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Album;
    use App\User;
    use App\Photo;
    use Image; 
    
    class AlbumController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth')->except(['master', 'album']);
        }
        
        public function master()
        {  
            $albums = Album::orderBy('idx')->paginate(12);
            $photos = Photo::orderBy('idx')->get();

            return view('front.index', compact('albums', 'photos'));
        }
        
        public function albums()
        {  
            $albums = Album::orderBy('idx')->get();
            return view('admin.albums', compact('albums'));
        }
        
        public function create()
        {  
            return view('admin.create');
        }
        
        public function store()
        {  
            $this->validate(request(), [
                'name' => 'required|unique:albums|max:191',
                'description' => 'required|max:191'
            ]);
            
            $data = [
                'name' => request('name'),
                'description' => request('description')
            ];
            
            Album::create($data);
            
            return redirect('/admin');
        }
        
        public function newData()
        {  
            $list = request('list');
            $output = array();
            $list = parse_str($list, $output);  // заношу полученную из POST строку в массив
            $ids = $output['item'];
            
            $idx = 1;
            foreach ($ids as $id) {
                $album = Album::find($id);
                $album->idx = $idx;
                $album->save();
                $idx++;
            } 
        }
        
        public function Edit($album)
        {  
            $albumId = Album::where('name', $album)->first();
            $photos = Photo::where('album_id', $albumId['id'])->orderBy('idx')->get();
            
            return view('admin.album', compact('photos', 'album'));
        }        
        
        public function album($album)
        {  
            $albumId = Album::where('name', $album)->first();
            $photos = Photo::where('album_id', $albumId['id'])->orderBy('idx')->get();
            
            return view('front.album', compact('photos', 'albumId'));
        }     
    }
