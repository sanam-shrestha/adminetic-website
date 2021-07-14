<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use App\Contracts\ImageRepositoryInterface;

class ImageController extends Controller
{
    protected $imageRepositoryInterface;

    public function __construct(ImageRepositoryInterface $imageRepositoryInterface)
    {
        $this->imageRepositoryInterface = $imageRepositoryInterface;
        $this->authorizeResource(Image::class, 'image');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.image.index', $this->imageRepositoryInterface->indexImage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $this->imageRepositoryInterface->storeImage($request);
        return redirect(adminRedirectRoute('image'))->withSuccess('Image Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('admin.image.show', $this->imageRepositoryInterface->showImage($image));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('admin.image.edit', $this->imageRepositoryInterface->editImage($image));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ImageRequest  $request
     * @param  \App\Models\Admin\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, Image $image)
    {
        $this->imageRepositoryInterface->updateImage($request, $image);
        return redirect(adminRedirectRoute('image'))->withInfo('Image Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $this->imageRepositoryInterface->destroyImage($image);
        return redirect(adminRedirectRoute('image'))->withFail('Image Deleted Successfully.');
    }
}
