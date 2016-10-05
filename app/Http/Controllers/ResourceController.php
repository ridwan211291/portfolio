<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ResourceController extends Controller {

    //Middleware
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        //Request-get
        $q = $request->get('q');
        //Models-Read
        $products = Product::where('name', 'LIKE', '%'.$q.'%')
            ->orWhere('model', 'LIKE', '%'.$q.'%')
            ->orderBy('name')->paginate(10);
        //Return
        return view('products.index', compact('products', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //Return
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //Validation
        # Use the make:request Artisan CLI command: php artisan make:request StoreBlogPost.
        # The generated class will be placed in the app/Http/Requests directory.
        //Request-input
        $data = $request->only('name', 'model');
        //Filesystem
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->savePhoto($request->file('photo'));
            // Don't overcomplicate, just upload to public/img folder and log the file name
            // In the future, maybe we would do some processing like resize or crop it.
        }
        //Models-Create
        $product = Product::create($data);
        //Flash
        \Flash::success($product->name . ' saved.');
        //Return
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //models-read
        $product = Product::findOrFail($id);
        //return
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //Models-Read
        $product = Product::findOrFail($id);
        //Validation
        # Use the make:request Artisan CLI command: php artisan make:request StoreBlogPost.
        # The generated class will be placed in the app/Http/Requests directory.
        //Request-input
        $data = $request->only('name', 'model');
        //Filesystem
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->savePhoto($request->file('photo'));
            // I'm not deleting old photo, as stub image file is used by multiple product.
        }
        //Models-Update
        $product = Product::create($data);
        //Flash
        \Flash::success($product->name . ' saved.');
        //Return
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //models-Delete
        Product::find($id)->delete();
        //Flash
        \Flash::success('Product deleted.');
        //Retrun
        return redirect()->route('products.index');
    }

    /**
     * Move uploaded File to public/img folder
     * @param  UploadedFile $File
     * @return string
     */
    // protected function saveFile(UploadedFile $file)
    // {
    //     $fileName = str_random(40) . '.' . $file->guessClientExtension();
    //     $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'ridwan/img';
    //     $file->move($destinationPath, $fileName);
    //     return $fileName;
    // }
}
