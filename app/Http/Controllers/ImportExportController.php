<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function import(Request $request){
        if ($request->file('imported-file')){
            $path = $request->file('imported-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            if(!empty($data) && $data->count()){
                foreach ($data->toArray() as $row){
                    if(!empty($row)){
                        $dataImported[] = [
                            'title'=>$row['title'],
                            'text'=>$row['text'],
                            'user_id'=>Auth::user()->id
                        ];
                    }
                }

                if(!empty($dataImported)){
                    Auth::user()->notes()->insert($dataImported);
                    return redirect()->back()->with('message', 'Данные успешно импортированы');
                }
            }
        }
    }

    public function export(){
        $articles = Article::all();

        Excel::create('notes',function($excel) use ($articles){
            $excel->sheet('ExportFile', function($sheet) use($articles){
               $sheet->fromArray($articles);
            });
        })->export('xls');
        return redirect()->back()->with('message', 'Данные успешно экспортированы');
    }
}
