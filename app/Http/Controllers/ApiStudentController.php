<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Resources\Student as StudentResource;
use Illuminate\Support\Facades\Auth;
use App\Student;

class ApiStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $students = Student::all();

        return StudentResource::collection($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'course' => 'required',
                'section' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $student = Student::create($request->all());

            $success['token'] = $student->createToken('MyApp')->accessToken;
            $success['name'] = $student->fname;

            return response()->json(['success' => $success]);

            //return new StudentResource($success);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $students = Student::find($id);
        if($students)
        {
            $validator = Validator::make($request->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'course' => 'required',
                'section' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $students->update($request->all());

            return new StudentResource($students);

        }
        else
        {
            return response()->json(['Error'=>'there is no data available on this id: '.$id.''],404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
