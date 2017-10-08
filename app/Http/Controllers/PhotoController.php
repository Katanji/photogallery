<?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Album;
    use App\Photo;
    use Image; 
    
    class PhotoController extends Controller
    {
        public function store(Request $request)
        {  
            $this->validate($request, array(
                'name' => 'required|max:32'
            ));
            
            $image = $request->file('featured_image');
            
            if (getimagesize($image)) {
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(300, 200)->save($location);
                
                $album = substr(strrchr(url()->previous(), "/"), 1);
                
                // заполняю данные для таблицы photo
                $photo = new Photo;
                $photo->album_id = Album::where('name', $album)->value('id');  // подтягиваю ID альбома
                $photo->idx = count(Photo::all());  
                $photo->name = $request['name'];
                $photo->file = $filename;
                $photo->save();
                
                return redirect('/admin/album/'.$album);
            } else {
                echo "incorrect file extension";
            }
        } 
        
        public function add($album)
        {  
            return view('admin.add_photos', compact('album'));
        }
        
        public function saveIdx()
        {              
            $list = request('list');
            $output = array();
            $list = parse_str($list, $output);  // заношу полученную из POST строку в массив
            $ids = $output['item'];
            
            $idx = 1;
            foreach ($ids as $id) {
                $photo = Photo::find($id);
                $photo->idx = $idx;
                $photo->save();
                $idx++;
            } 
        }   
    }
