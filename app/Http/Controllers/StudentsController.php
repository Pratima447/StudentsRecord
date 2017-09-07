<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\students;
use Session;
use studentpages\add;
class StudentsController extends Controller
{
    public function home()
    {
        return view('studentpages.home');
    }
    public function addStdRecord(Request $request)
    {
        $model = new students;

        $model->sname  = $request->sname;
        $model->age    = $request->age;
        $model->class  = $request->class;
        $model->status = $request->status;

        $model->save();
        $result = $model->latest()->get();        
        
        Session::flash('message', 'Added student details successfully');
        return view('studentpages.list', compact('result'));
    }

    public function displayStdRecord() 
    {
        $model  = new students;
        $result = $model->latest()->get();

        Session::flash('message','Displaying Student record');
        return view('studentpages.list',compact('result'));
    }

    public function updateStdRecord($id, Request $request) 
    {
        $model  = new students;
        $record = $model->find($id);

        Session::flash('message','Edit the details you Want');

        return view('studentpages.add', compact('record'));
     }

    public function editStdRecord($id, Request $request) 
    {
        $model          = new students;
        $record         = $model->find($id);
        $record->sname  = $request->sname;
        $record->age    = $request->age;
        $record->class  = $request->class;
        $record->status = $request->status;

        $record->update();
        $result = $model->get();

        Session::flash('message','Updated successfully');

        return view('studentpages.list',compact('result'));
     }

    public function deleteStdRecord($id)
    {
        $model  = new students;
        $record = $model->find($id);
        $delete = $record->delete();
        if ($delete)
        {
            $record->update();
            return 1;
        }
        return 0;
    }

    public function promoteStudent($id)
    {
        $model         = new students;
        $record        = $model->find($id);
        $record->class = $record->class + 1;
        $promoted = $record->update();
        if( $promoted)
        {
            return 1;
        }
        return 0;
    }
}
