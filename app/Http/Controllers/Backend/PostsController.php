<?php

namespace cms\Http\Controllers\Backend;

use cms\Http\Requests\StorePostRequest;
use cms\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

use cms\Post;
use cms\Http\Requests;
use cms\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * @var Post
     */
    protected $posts;

    /**
     * PostsController constructor.
     * @param Post $posts
     */
    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->posts->with('author')->orderBy('published_at','desc')->paginate(10);
        
        return view('backend.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('backend.posts.form',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $this->posts->create(['auther_id'=>auth()->user()->id] + $request->only('title','slug','published_at','body','excerpt'));

        return redirect(route('backend.posts.index'))->with('status','Post Has been Created');
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
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($id)
    {
        $post = $this->posts->findOrFail($id);

        return view('backend.posts.form',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = $this->posts->findOrFail($id);

        $post->fill($request->only('title','slug','published_at','body','excerpt'))->save();

        return redirect(route('backend.posts.edit',$post->id))->with('status','Post has been updated');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function confirm($id)
    {
        $post = $this->posts->findOrFail($id);

        return view('backend.posts.confirm',compact('post'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->posts->findOrFail($id);

        $post->delete();

        return redirect(route('backend.posts.index'))->with('status','Post is deleted');
    }
}
