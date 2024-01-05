<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function getAllStudent(){
       try{
        return Student::all();

    }catch(\Exception $e){
        return response()->json(["message" => $e->getMessage()], 200);
    }
    }
    public function getStudentbyID($id){
        try{
            $student = Student::findorFail($id);
            return response()->json($student,200);
    
        }
        catch(\Exception $e){
            return response()->json(["message" => $e->getMessage()], 200);
        }
    }
    public function addStudent(Request $request){
        try{
            $student = new Student;
            $student->name = $request->name;
            $student->grade = $request->grade;

            $student->save();
            return response()->json(["message"=>"Successfully Added"], 200);

        }catch(\Exception $e){
            return response()->json(["message"=>$e->getMessage()], 200);
        }
    }
    
    public function updateStudent(Request $request, $id){
        try{

            $student = Student::findOrFail($id);

            $student->name = $request->name;
            $student->grade = $request->grade;

            $student->save();

            return response()->json(["message" => "Successfully Updated"], 200);
        }catch(\Exception $e){
            return response()->json(["message" => $e->getMessage()], 200);
        }
    }
    
    public function deleteStudent($id){
            try{
                $student = Student::findOrFail($id);

                $student->delete();
                return response()->json(["message"=>"Deleted Student"], 200);

            }catch(\Exception $e){
                return response()->json(["message" => $e->getMessage()], 200);

    }
}
}