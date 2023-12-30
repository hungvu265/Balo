<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $assign['pageInfo'] = ['page'  => 'Slider'];
        $assign['sliders'] = Slide::orderBy('position', 'asc')->get();

        return view('admin.slider.list', $assign);
    }

    public function store(Request $request)
    {
        $dataRequest = $request->toArray();
        $position = 1;
        if (!empty($dataRequest['id'])) {
            foreach ($dataRequest['id'] as $item) {
                Slide::where('id', $item)->update(['position' => $position++]);
            }
        }
        return redirect()->back()->with(['status' => 'success', 'message' => 'Save success']);
    }

    public function delete($id)
    {
        Slide::destroy($id);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Delete success']);
    }

    public function upload(Request $request)
    {
        $dataRequest = $request->file('image');
        $imageFile = $dataRequest->getClientOriginalName();
        Slide::create([
            'link' => $imageFile,
            'image' => $imageFile
        ]);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Upload success']);
    }
}
