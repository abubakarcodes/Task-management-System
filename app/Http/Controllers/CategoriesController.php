<?php

namespace App\Http\Controllers;
use App\Category;
use Session;
use Illuminate\Http\Request;
use Toast;

class CategoriesController extends Controller
{
   public function index(){
   		$categories = Category::orderBy('order_by' , 'ASC')->get();
   		return view('admin.categories.listing' , compact('categories'));
   }


   public function create(){

   		return view('admin.categories.add');

   }

   public function store(Request $request){


   			$this->validate($request , [
   				'name' => 'required',
   				'order_by' => 'required',
   			]);


   			$category = new Category;
   			$category->name = $request->input('name');
   			$category->order_by = $request->input('order_by');
   			$category->save();
   			Toast::success('Category Successfully Added', 'success');
   			return redirect()->route('admin.categories.index');

   }


   public function edit($id){
   	 $category = Category::find($id);
   	 return view('admin.categories.edit' , compact('category'));
   }

   public function update(Request $request , $id){


   			$this->validate($request , [
   				'name' => 'required',
   				'order_by' => 'required',
   			]);


		   	 $category = Category::find($id);
		   	 $category->name = $request->input('name');
			$category->order_by = $request->input('order_by');
			$category->save();
			Toast::success('successfully updated', 'success');
   			return redirect()->route('admin.categories.index');

   }

   public function show($id){
   	//
   }

   public function destroy($id)
   {
   	$category = Category::find($id);
   	
   	$category->delete();
   	 return response()->json('success', 200);
   	 
   }


}
