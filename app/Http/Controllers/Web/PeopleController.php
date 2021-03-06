<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{

    protected function getMenu(People $people)
    {
        return json_decode(json_encode([
            ['name' => 'Overview', 'link' => route('web.peoples.detail', $people->id)],
            ['name' => 'Lab', 'link' => $people->lab],
            ['name' => 'Publication', 'link' => $people->publication],
            ['name' => 'Video', 'link' => route('web.peoples.video', $people->id)],
        ]));
    }

    public function index(Request $request)
    {
        $peoples = People::ofCategory($request->c)->ordered()->get()->translate(app()->getLocale());
        $categories = Category::where('type', 'people')->get()->translate(app()->getLocale());
        return view('web.peoples.index', compact('peoples', 'categories'));
    }

    public function detail(People $people)
    {
        $menus = $this->getMenu($people);
        $people = $people->translate(app()->getLocale());
        return view('web.peoples.detail', compact('people', 'menus'));
    }

    public function video(People $people)
    {
        $menus = $this->getMenu($people);
        $people = $people->translate(app()->getLocale());
        return view('web.peoples.video', compact('people', 'menus'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
