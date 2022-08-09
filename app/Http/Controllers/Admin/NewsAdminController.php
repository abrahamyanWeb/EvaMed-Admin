<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCurrent;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        $news_currents = NewsCurrent::all();
        return view('Admin.News.index' , [
            'news'=>$news,
            'news_currents'=>$news_currents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            $request->validate([
                'news_title_am' => 'required',
                'news_title_ru' => 'required',
                'news_title_en' => 'required',
                'news_desc_am' => 'required',
                'news_desc_ru' => 'required',
                'news_desc_en' => 'required',
                'news_unique' => 'required',
                'news_image' => 'required'
            ]);
            $input = $request->all();
            if ($news_image = $request->file('news_image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $news_image->getClientOriginalExtension();
                $news_image->move($destinationPath, $profileImage);
                $input['news_image'] = "$profileImage";
            }
            News::create($input);
            return redirect()->route('Admin.news')
                ->with('success','Product created successfully.');
    }
    public function createCurrent(Request $request)
    {
            $request->validate([
                'news_current_title_am' => 'required',
                'news_current_title_ru' => 'required',
                'news_current_title_en' => 'required',
                'news_current_desc_am' => 'required',
                'news_current_desc_ru' => 'required',
                'news_current_desc_en' => 'required',
                'news_current_unique' => 'required',
                'news_current_image' => 'required'
            ]);
            $input = $request->all();
            if ($news_current_image = $request->file('news_current_image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $news_current_image->getClientOriginalExtension();
                $news_current_image->move($destinationPath, $profileImage);
                $input['news_current_image'] = "$profileImage";
            }
            NewsCurrent::create($input);
            return redirect()->route('Admin.news')
                ->with('success','Product created successfully.');
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
        $news = News::find($id);
        return view('Admin.news.editNews' , [
            'news'=>$news
        ]);
    }
    public function editCurrent($id)
    {
        $news_currents = NewsCurrent::find($id);
        return view('Admin.news.editCurrent' , [
            'news_currents'=>$news_currents
        ]);
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
        $news = News::find($id);

        $news -> news_title_am = $request->news_title_am;
        $news -> news_title_ru = $request->news_title_ru;
        $news -> news_title_en = $request->news_title_en;
        $news -> news_desc_am = $request->news_desc_am;
        $news -> news_desc_ru = $request->news_desc_ru;
        $news -> news_desc_en = $request->news_desc_en;
        $news -> news_unique = $request->news_unique;
        $news_image = $request->file('news_image');

        if(!is_null($news_image)) {
            if(File::exists(public_path('/image/' . $news -> news_image))) {
                File::delete(public_path('/image/') .$news->news_image);
            }
            $name = uniqid() . '.' . $news_image->getClientOriginalExtension();
            $news_image->move(public_path('/image'), $name);

            $news->news_image = $name;
        }
        $news -> save();
        return redirect()->route('Admin.news');
    }

    public function updateCurrent(Request $request, $id)
    {
        $news_currents = NewsCurrent::find($id);

        $news_currents -> news_current_title_am = $request->news_current_title_am;
        $news_currents -> news_current_title_ru = $request->news_current_title_ru;
        $news_currents -> news_current_title_en = $request->news_current_title_en;
        $news_currents -> news_current_desc_am = $request->news_current_desc_am;
        $news_currents -> news_current_desc_ru = $request->news_current_desc_ru;
        $news_currents -> news_current_desc_en = $request->news_current_desc_en;
        $news_currents -> news_current_unique = $request->news_current_unique;
        $news_current_image = $request->file('news_current_image');

        if(!is_null($news_current_image)) {
            if(File::exists(public_path('/image/' . $news_currents -> news_current_image))) {
                File::delete(public_path('/image/') .$news_currents -> news_current_image);
            }
            $name = uniqid() . '.' . $news_current_image->getClientOriginalExtension();
            $news_current_image->move(public_path('/image'), $name);

            $news_currents->news_current_image = $name;
        }
        $news_currents -> save();
        return redirect()->route('Admin.news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if(File::exists(public_path('image/' . $news->news_image))) {
            File::delete(public_path('image/') . $news->news_image);
        }
        $news -> delete();
        return back();
    }
    public function destroyCurrent($id)
    {
        $news_current = NewsCurrent::find($id);
        if(File::exists(public_path('image/' . $news_current->news_current_image))) {
            File::delete(public_path('image/') . $news_current->news_current_image);
        }
        $news_current -> delete();
        return back();
    }
}
