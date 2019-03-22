<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student_info;
use DB;
use Session;
use Redirect;
use Excel;
class StudentController extends Controller
{
    public function index()
    {
    	return view('add_student');
    }
    public function save_student(Request $request)
    {
       // return $this->imageResize($request->image);
    	$insert = DB::table('student_info')
    			->insertGetId([
                    'name' => $request->name,
                    'roll' => $request->roll,
    				'email' => $request->email,
    				'contact' => $request->contact,
    			]);
    				Session::put('message','Student data insert successfully');
    				return redirect('add-student');
    }
		    public function all_student()
            {
                $all_student = DB::table('student_info')->get();
                return view('all_student',compact('all_student'));
            }
            public function edit_student($id)
            {
                //return $id;
                $edit_student = DB::table('student_info')
                    ->where('student_id',$id)
                    ->first();
                  //print_r($edit_student);
                  return view('/edit_student',compact('edit_student'));  
            }
            public function update_student(Request $request,$id)
            {  
                DB::table('student_info')
                        ->where('student_id',$id)
                        ->update([
                            'name' =>$request->name,
                            'roll' =>$request->roll,
                            'email' =>$request->email,
                            'contact' =>$request->contact
                        ]);
                    Session::put('message','Student data Updated Successfully');
                    return redirect('all-student');      
            }
            public function delete_student($id)
            {
                DB::table('student_info')
                        ->where('student_id',$id)
                        ->delete();
                Session::put('message','Student data deleted Successfully');  
                return redirect('all-student');      
            }
        // public function imageResize($file_name)
        // {
        //     $fileName = $file_name;
        //     list($width, $height) = getimagesize($fileName);
        //     // print $height;
        //     $newwidth = '100';
        //     $newheight = '100';
        //     $thumb = imagecreatetruecolor($newwidth,$newheight);
        //     $source = imagecreatefromjpeg($fileName);
        //     imagecopyresized($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);
        //     imagejpeg($thumb,'public/images/2.jpeg');
        //     imagedestroy($thumb);
        // }
            // public function imageResize($file_name)
            // {
            //     $fileName = $file_name;
            //     $destination = $file_name;
            //     list($width, $height) = getimagesize($fileName);
            //     $newwidth = '100';
            //     $newheight = '100';
            //     // Load
            //     $thumb = imagecreatetruecolor($newwidth, $newheight);
            //     $source = imagecreatefromjpeg($fileName);
            //     // Resize
            //     imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            //     // Output
            //     imagejpeg($thumb,$destination);
            //     imagedestroy($thumb);
            //     return;
            // }

         public function downloadExcel($type)
    	{
        $data = DB::table('student_info')->get()->toArray();
        //$data = get_object_vars($data);
        //$data = (array)$data;
        $data= json_decode(json_encode($data), true);
            
        return Excel::create('exportData', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }   

        public function import_data(Request $request)
    	{
            // $this->validate($request,[
            //     'import_file' => 'required|mimes:csv,txt'
            // ]);
        $request->validate([
            'import_file' => 'required'
        ]);
 
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
 
        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                	'name' => $value->name, 
                	'email' => $value->email
                ];
            }
 
            if(!empty($arr)){
                //Item::insert($arr);
                DB::table('student_info')->insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
    } 

    
}
