<?php
namespace App\Http\Controllers;
use App\Blog;
use Illuminate\Http\Request;

/**
 * BlogController
 */
class BlogController extends Controller {
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

        
    /**
     * index
     *
     * @return void
     */
    public function index() {
        $blogs = Blog::all();
        return response()->json($blogs);
    }
    
    /**
     * create
     *
     * @param  mixed $request
     * @return void
     */
    public function create(Request $request) {
        $blog = new Blog;
        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->save();
        return response()->json($blog);
    }
        
    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id) {
        $blog = Blog::find($id);
        return response()->json($blog);
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id) {
        $blog = Blog::find($id);
        $blog->name = $request->input('name');
        $blog->description = $request->input('description');
        $blog->save();
        return response()->json($blog);
    }
        
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id) {
        $blog = Blog::find($id);
        $blog->delete();
        return response()->json('blog removed successfully');
    }
}
