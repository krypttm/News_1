<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index() {
        $categories = Category::orderBy('created_at','asc')->get();
        return view('admin.category.index',[
            'categories' => $categories
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create() {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' =>'required|max:50:min:3',
        ]);

        $new_category = new Category();
        $new_category->title = $request->title;
        $new_category->save();

        return redirect()->back()->withSuccess('Категория успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id) {
       $categories = Category::all();

        return view('admin.category.show',[
            'categories' => $categories,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Category $category) {

        $this->authorize('category.edit', $category);
        return view('admin.category.edit',[
            'category' => $category
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category) {
        $this->validate($request, [
            'title' =>'required|max:50:min:3',
        ]);
        $category->title = $request->title;
        $category->save();

        return redirect()->back()->withSuccess('Категория была успешно обновлена');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) {
        $category->delete();
        $categories = Category::get();
        $this->authorize('category.destroy', $category);
        //сделать проверку на наличие постов если есть удалить их
        return redirect()->back()->withSuccess('Категория была успешно удалена');

    }
}
