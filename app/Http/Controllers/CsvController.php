<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;
use App\Csvsample;
use Illuminate\Support\Facades\Log;

class CsvController extends Controller
{
  public function showImportCSV()
  {
     return view('csv.sample');
  }

  public function importCSV(Request $request)
  {
     //postで受け取ったcsvファイルデータ
     $file = $request->file('file');

     //Goodby CSVのconfig設定
     $config = new LexerConfig();
     $interpreter = new Interpreter();
     $lexer = new Lexer($config);

     //CharsetをUTF-8に変換
     $config->setToCharset("UTF-8");
     $config->setFromCharset("sjis-win");

     $rows = array();

     $interpreter->addObserver(function(array $row) use (&$rows) {
         $rows[] = $row;
     });

     // CSVデータをパース
     $lexer->parse($file, $interpreter);

     $data = array();

     // CSVのデータを配列化
     Log::debug($rows);
     foreach ($rows as $key => $value) {
        $arr = array();
        foreach ($value as $k => $v) {
            switch ($k) {
              case 0:
        	     $arr['name'] = $v;
        	     break;
              case 1:
        	     $arr['mail'] = $v;
        	     break;
              default:
        	     break;
            }
        }
        $data[] = $arr;
    }

    // DBに一括保存
    Csvsample::insert($data);

    return redirect('/csv/sample')->with('save_message', 'CSVのデータを読み込みました');

  }
}
