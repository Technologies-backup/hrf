<?php

namespace App\Http\Controllers\Admin;

use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Model\Translation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function list(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search'))
        {
            $key = explode(' ', $request['search']);
            $banners = Banner::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->Where('banner_type', 'like', "%{$value}%");
                }
            })->orderBy('id', 'desc');
            $query_param = ['search' => $request['search']];
        }else{
            $banners = Banner::orderBy('id', 'desc');
        }
        $banners = $banners->paginate(Helpers::pagination_limit())->appends($query_param);

        return view('admin-views.banner.view', compact('banners','search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'image' => 'required',
        ], [
            'url.required' => 'url is required!',
            'image.required' => 'Image is required!',

        ]);

        $banner = new Banner;
        $banner->banner_type = $request->banner_type;
        if($banner->banner_type == "Video Banner"){
            $url = ImageManager::upload('banner/', 'mp4', $request->url[array_search('en', $request->lang)]);
        }else{
            $url = $request->url;
        }
        $banner->url = $url;
        $banner->photo = ImageManager::upload('banner/', 'png', $request->image[array_search('en', $request->lang)]);
        $banner->save();

        $data = [];
        foreach ($request->lang as $index => $key) {
            if ($request->url[$index] && $key != 'en') {
                array_push($data, array(
                    'translationable_type' => 'App\Model\Banner',
                    'translationable_id' => $banner->id,
                    'locale' => $key,
                    'key' => 'url',
                    'value' => ImageManager::upload('banner/', 'mp4', $request->url[$index]),
                ));
            }
            if ($request->image[$index] && $key != 'en') {
                array_push($data, array(
                    'translationable_type' => 'App\Model\Banner',
                    'translationable_id' => $banner->id,
                    'locale' => $key,
                    'key' => 'photo',
                    'value' => ImageManager::upload('banner/', 'png', $request->image[$index]),
                ));
            }
        }
        Translation::insert($data);
        Toastr::success('Banner added successfully!');
        return back();
    }

    public function status(Request $request)
    {
        if ($request->ajax()) {
            $banner = Banner::find($request->id);
            $banner->published = $request->status;
            $banner->save();
            $data = $request->status;
            return response()->json($data);
        }
    }

    public function edit(Request $request)
    {
        $data = Banner::where('id', $request->id)->first();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'url' => 'required',
        ], [
            'url.required' => 'url is required!',
        ]);
        $banner = Banner::find($request->id);
        $banner->banner_type = $request->banner_type;
        if($banner->banner_type == "Video Banner"){
            if($request->has('url') && isset($request->url[array_search('en', $request->lang)])){
                $banner->url = ImageManager::update('banner/', $banner['url'], 'mp4', $request->url[array_search('en', $request->lang)]);
            }
        }else{
            $banner->url = $request->url;
        }
        if(isset($request->image[array_search('en', $request->lang)])){
            $banner->photo = ImageManager::update('banner/', $banner['photo'], 'png', $request->image[array_search('en', $request->lang)]);
        }

        $banner->save();
        foreach ($request->lang as $index => $key) {
            if (isset($request->url[$index]) && $key != 'en') {
                if($banner->banner_type == "Video Banner"){
                    $url = ImageManager::update('banner/', $banner['url'], 'mp4', $request->url[$index]);
                }else{
                    $url = $request->url[$index];
                }
                Translation::updateOrInsert(
                    ['translationable_type' => 'App\Model\Banner',
                        'translationable_id' => $banner->id,
                        'locale' => $key,
                        'key' => 'url'
                    ],
                    ['value' => $url]
                );
            }
            if (isset($request->image[$index]) && $key != 'en') {
                $photo = ImageManager::update('banner/', $banner['photo'], 'png', $request->image[$index]);
                Translation::updateOrInsert(
                    ['translationable_type' => 'App\Model\Banner',
                        'translationable_id' => $banner->id,
                        'locale' => $key,
                        'key' => 'photo'
                    ],
                    ['value' => $photo]
                );
            }
        }

        // return response()->json();
        Toastr::success('Banner updated successfully!');
        return back();
    }

    public function delete(Request $request)
    {
        $br = Banner::find($request->id);
        ImageManager::delete('/banner/' . $br['photo']);
        $br->delete();
        return response()->json();
    }
}
