<?php

namespace cms\Http\Controllers\Backend;

use Baum\MoveNotPossibleException;
use Illuminate\Http\Request;
use cms\Page;
use cms\Http\Requests;
use cms\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * @var Page
     */
    protected $pages;

    /**
     * PagesController constructor.
     * @param Page $pages
     */
    public function __construct(Page $pages)
    {
        $this->pages = $pages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->pages->all();
        return view('backend.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page)
    {
        $orderPages = $this->pages->all();

        return view('backend.pages.form',compact('page','orderPages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StorePageRequest $request)
    {
        $page = $this->pages->create($request->only('title','uri','name','content'));

        $this->updatePageOrder($page,$request);

        return redirect(route('backend.pages.index'))->with('status','Page has been created');
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
        $page = $this->pages->findOrFail($id);

        $orderPages = $this->pages->all();

        return view('backend.pages.form',compact('page','orderPages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdatePageRequest $request, $id)
    {
        $page = $this->pages->findOrFail($id);

        if($response = $this->updatePageOrder($page,$request)){
            return $response;
        }

        $page->fill($request->only('title','uri','name','content'))->save();

        return redirect(route('backend.pages.edit',$page->id))->with('status','Your page has been updated');
    }

    public function confirm($id)
    {
        $page = $this->pages->findOrFail($id);

        return view('backend.pages.confirm',compact('page'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->pages->findOrFail($id);

        foreach ($page->children as $child)
        {
            $child->makeRoot();
        }

        $page->delete();

        return redirect(route('backend.pages.index'))->with('status','User has been deleted');
    }

    protected function updatePageOrder(Page $page, Request $request)
    {
        if($request->has('order','orderPage'))
        {
            try{
                $page->updateOrder($request->input('order'),$request->input('orderPage'));
            }catch (MoveNotPossibleException $e){
                return redirect(route('backend.pages.edit',$page->id))->withInput()->withErrors([
                    'error' => 'We can not make the page a child of itself'
                ]);
            }
        }
    }
}
