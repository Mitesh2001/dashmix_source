<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecruitmentController extends Controller
{
    public $rules = [
        'headline' => 'required',
        'title' => 'required',
        'skills' => 'required',
        'thumbnail' => 'mimes:jpeg,jpg,png',
        'news_image' => 'mimes:jpeg,jpg,png',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.recruitments', ['recruitments' => Recruitment::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.create_recruitment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);
        $thumbnailName = '';
        $news_image = '';
        if ($request->file('thumbnail')) {
            $thumbnailName = time().$request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('thumbnails', $thumbnailName, 'public');
        }
        if ($request->file('news_image')) {
            $news_image = time().$request->file('news_image')->getClientOriginalName();
            $request->file('news_image')->storeAs('news_images', $news_image, 'public');
        }
        Recruitment::create([
            'headline' => $request->headline,
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'skills' => $request->skills,
            'education_quailification' => $request->education_quailification,
            'thumbnail' => $thumbnailName,
            'news_image' => $news_image,
            'reference_url' => $request->reference_url,
            'reported_datetime' => now(),
            'status' => $request->status,
            'done_by' => 1
        ]);
        return redirect()->route('recruitment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function show(Recruitment $recruitment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruitment $recruitment)
    {
        return view('forms.edit_recruitment', ['recruitment' => $recruitment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recruitment $recruitment)
    {
        $request->validate($this->rules);
        if ($request->file('thumbnail')) {
            Storage::delete('public/thumbnails/'.$recruitment->thumbnail);
            $thumbnailName = time().$request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('thumbnails', $thumbnailName, 'public');
            $recruitment->update(['thumbnail' => $thumbnailName]);
        }
        if ($request->file('news_image')) {
            Storage::delete('public/news_images/'.$recruitment->news_image);
            $news_image = time().$request->file('news_image')->getClientOriginalName();
            $request->file('news_image')->storeAs('news_images', $news_image, 'public');
            $recruitment->update(['news_image' => $news_image]);
        }
        $recruitment->update([
            'headline' => $request->headline,
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'skills' => $request->skills,
            'education_quailification' => $request->education_quailification,
            'reference_url' => $request->reference_url,
            'reported_datetime' => now(),
            'status' => $request->status,
        ]);
        return redirect()->route('recruitment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruitment $recruitment)
    {
        Storage::delete('public/thumbnails/'.$recruitment->thumbnail);
        Storage::delete('public/news_images/'.$recruitment->news_image);
        $recruitment->delete();
        return redirect()->route('recruitment.index');
    }
}
