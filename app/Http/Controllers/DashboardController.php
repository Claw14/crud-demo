<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user_data = User::where('id', $request->user_id)->first();
        $students = $this->getStudents()->getData();

        return view('dashboard.home', [
            'user_data' => $user_data,
            'students' => $students
        ]);
    }

    private function getStudents()
    {
        $studentController = new StudentController();

        return $studentController->index();
    }

    public function updateStudentView(Request $request)
    {
        $studentController = new StudentController();
        $student_data = $studentController->show($request->student_id)->getData();

        return view('dashboard.updateStudent', [
            'student_id' => $request->student_id,
            'student_data' => $student_data,
            'user_id' => $request->user_id
        ]);
    }

    public function deleteStudent(Request $request)
    {
        $studentController = new StudentController();
        $studentController->destroy($request->student_id);

        return redirect()->route('dashboard', ['user_id' => 1]);
    }

    public function updateStudent(Request $request)
    {
        $studentController = new StudentController();
        $studentController->update($request, $request->student_id);

        return redirect()->route('dashboard', ['user_id' => $request->user_id]);
    }
}