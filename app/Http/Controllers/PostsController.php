<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
         $posts = Post::all();

        return view('posts.index',compact('categories','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::all();

        return view('posts.add',compact('categories'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //     $validated = $request->validate([
    //     'name' => 'required|unique:name|max:255',
        
    // ],[

    //     'governorate_name.required' =>'يجب ادخال هذا الحق',
    //     'governorate_name.unique' =>'حقل موجود مسبقا ',
        
         
    // ]);
     //dd($request);
              
        if ($request->hasFile('pic')) {

            
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $post_name = $request->post_name;

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $post_name), $imageName);
        }

        Post::create([
        'name'=>$request->post_name,
        'category_id' => $request->category,
        'content'=>$request->content,
        'image'=>$imageName ,

        //'created_by'=>(Auth::user()->name),

    ]);

       //session()->flash('add','تم اضافة القسم بنجاح ');
      
      return redirect('/posts');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $posts = DB::table('posts')
                ->where('id', '=', $id)
                ->first();

        $categories = DB::table('categories')
                ->where('id', '=', $id)
                ->get();

        
       return view('posts.edit',compact('posts','categories')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->post_id;

        $id_category =Category::where('id',$request->category)->first()->id;

        $posts = Post::findOrFail($id);


            $posts->update([
                'name' => $request->post_name ,
                'image' => $request->pic->getClientOriginalName(),
                'content' => $request->content,
                'category_id' =>$id_category, 
            ]);
            
        session()->flash('Status_Update');
        return redirect('/posts');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
         $id = $request->id;

       Post::find($id)->delete();
        //session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/posts');
    }
}
