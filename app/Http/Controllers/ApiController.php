<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Resources\Student as StudentResource;

class ApiController extends Controller
{
	public function store(Request $request)
	{
		$students = new Student();

		$students->fname = $request->input('fname');
		$students->lname = $request->input('lname');
		$students->course = $request->input('course');
		$students->section = $request->input('section');

		$students->save();

		return new StudentResource($students);
	}  

	public function show()
	{
		$students = Student::all();

		return StudentResource::collection($students);
	} 

	public function showbyid($id)
	{
		$students = Student::find($id);
		if($students)
		{
			return new StudentResource($students);
		}
		else
		{
			return response()->json(['Error'=>'there is no data available on this id: '.$id.''],404);
		}
		
	}

	public function update(Request $request, $id)
	{
		$students = Student::find($id);

		if($students)
		{
			$students->fname = $request->input('fname');
			$students->lname = $request->input('lname');
			$students->course = $request->input('course');
			$students->section = $request->input('section');

			$students->save();
			return new StudentResource($students);

		}
		else
		{
			return response()->json(['Error'=>'there is no data available on this id: '.$id.''],404);
		}

		//return StudentResource::collection($students);
	} 

	public function delete($id) 
	{
		$students = Student::find($id);

		if($students)
		{
			$students->delete();
			return new StudentResource($students);
			//return response()->json(['Done'=>'this id: '.$id.' Deleted successfully']);
		}
		else
		{
			return response()->json(['Error'=>'there is no data available on this id: '.$id.''],404);
		}
	}  
}
