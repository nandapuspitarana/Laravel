<?php 
namespace App\Http\Controllers;
use App\Student;
class LoginController extends Controller {
        
    public function index()
    {
        // tampilkan data yg ID nya 1
        // return Student::find(1);   

        // return Student::where('age', 21)->orWhere('age', 25)->get();        // tampilkan semua data di students
        
        // Insert Data
        // Student::create([
        //     'name' => 'Aang',
        //     'address' => 'cidahu',
        //     'age' => 20,
        //     'email' => 'aang@mail.com'
        // ]);

        // Delete Data
        // Student::find(1)->delete();
            $student = Student::find(1);
            if($student) {
                $student->delete();
            }

            // Update Data
            $student2 = Student::find(2);
            if($student2) {
                $student2->update([
                    'name' => 'kemsenge',
                    'address' => 'cicurug',
                    'age' => 10,
                    'email' => 'kemseng@mail.com'
                ]);
            }
        // return Student::all();

        // $nama = "Ciplex";
        // $sekolah = "SMK IT AMAL ISLAMI";
        // $dataArray = ["SMK","PASTI","BISA"];

        // cara ke 1
        // return view('login.login', ['nama' => $nama]); 

        // cara ke 2
        // return view('login.login')->with('nama', $nama);

        // cara ke 3
        // return view('login.login', compact('nama', 'sekolah', 'dataArray'));
    }
}
