<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use  Illuminate\Support\Facades\File;

class StoreController extends Controller
{



    protected $model ;
    protected $viewsDomain = 'admin/stores.';
    protected $url = 'admin/store';
    public function __construct()
    {
        $this->model = new Store();

    }
    public function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $records = $this->model->where(function ($q) use ($request) {
            if ($request->id) {
                $q->where('id', $request->id);
            }
            if ($request->name) {
                $q->where(function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->name . '%');
                });
            }

        })->paginate();
        return $this->view('index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->model;

        return $this->view('create',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules =
        [
            'name' => 'required',
            'image' => 'array',
            'aboutUs' => 'required',



        ];

    $error_sms =
        [
            'name.required' => 'الرجاء ادخال الاسم ',
            'aboutUs.required' => 'الرجاء ادخال معلوماتك ',

        ];

    $data = validator()->make($request->all(), $rules, $error_sms);

    if ($data->fails()) {
        return back()->withInput()->withErrors($data->errors());
    }



    $record = $this->model->create($request->except('image'));
    if ($request->hasfile('image')) {

        $files= $request->file('image');
        foreach($files as $file){






            $name = $file->getClientOriginalName();
            $new = $file->storeAs('Attachments'.'/'.$record->id, $file->getClientOriginalName(), 'Attachments');



            $images= new Image();
            $images->filename=$name;
            $images->imageable_id= $record->id;
            $images->imageable_type = 'App\Models\Store';
            $images->save();



    }
}


    session()->flash('success', 'تمت الاضافة بنجاح');
    return redirect($this->url);
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
        $model = $this->model->findOrFail($id);
        return $this->view('edit',compact('model'));
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

        $rules =
        [
            'name' => 'required',
            'image' => 'array',
            'aboutUs' => 'required',



        ];

    $error_sms =
        [
            'name.required' => 'الرجاء ادخال الاسم ',
            'aboutUs.required' => 'الرجاء ادخال معلوماتك ',

        ];


    $data = validator()->make($request->all(), $rules, $error_sms);

    if ($data->fails()) {
        return back()->withInput()->withErrors($data->errors());
    }

    $record = $this->model->findOrFail($id);


    $record->update($request->except('image'));
    if ($request->hasfile('image')) {

        $files= $request->file('image');
        foreach($files as $file){






            $name = $file->getClientOriginalName();
             $file->storeAs('Attachments'.'/'.$record->id, $file->getClientOriginalName(), 'Attachments');



            $images= new Image();
            $images->filename=$name;
            $images->imageable_id= $record->id;
            $images->imageable_type = 'App\Models\Store';
            $images->save();



    }
    // Log::createLog($record, auth()->user(), 'عملية تعديل', 'تعديل اهتمام #' . $record->id);

    }
    session()->flash('success', 'تمت تحديث بنجاح');
    return redirect($this->url);
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $record = $this->model->findOrFail($id);
        $record->delete();

        $data = [
            'status' => 1,
            'message' => 'تم الحذف بنجاح',
            'id' => $id
        ];
        File::deleteDirectory(public_path('Attachments/'.$id));
      Image::where('imageable_id',$record->id)->delete();


        return Response::json($data, 200);


    }
}
