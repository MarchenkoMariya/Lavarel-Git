<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {
    /** @return
     */
public function index()
{
    return view('admin.categories.index', [
       'categories' => Category::paginate(10)
    ]);
}

    /** @return
     */

public function create(){
    //
}


/**@param
 * @returns
 */

public function store(Request $request)
{
    //
}
    /**@param
     * @returns
     */

    public function show(Category $category){
        //
    }

    /**@param
     * *@param
     * @returns
     */

    public function uptade(Request $request, Category $category)  {
        //
    }


    /**@param
     * @returns
     */

    public function destroy(Category $category){
        //
    }

}

