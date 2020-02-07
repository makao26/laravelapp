<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HelloRequest;
use Validator;
use App\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    // public function index(){
    //   $data = ['msg'=>'名前を入力して下さい'];
    //   //$data = ['msg'=>'',];
    //   return view('hello.index',$data);
    // }
    // public function post(Request $request){
    //   $msg = $request -> msg;
    //   $data = ['msg'=>'こんにちは'.$msg.'さん'];
    //   return view('hello.index',$data);
    // }

    // public function index(){
    //   $data = [
    //     ['name'=>'山田たろう','mail'=>'taro@yamada'],
    //     ['name'=>'田中はなこ','mail'=>'hanako@flower'],
    //     ['name'=>'鈴木さちこ','mail'=>'sachico@happy']
    //   ];
    //   return view('hello.index',['data'=>$data]);
    // }

    // public function index(Request $request){
    //   return view('hello.index',['data'=>$request->data]);
    // }

    // public function index(Request $request){
    //   return view('hello.index',['msg'=>'フォーム入力']);
    // }

    // public function post(Request $request){
    //   $validate_rule = [
    //     'name' => 'required',
    //     'mail' => 'email',
    //     'age' => 'numeric|between:0,150',
    //   ];
    //   $this -> validate($request,$validate_rule);
    //   return view('hello.index',['msg' => '正しく入力されました']);
    // }
    // public function post(HelloRequest $request){
    //   return view('hello.index',['msg' => '正しく入力されました']);
    // }

    // public function post(Request $request){
    //   $validator = Validator::make($request->all(),[
    //     'name' => 'required',
    //     'mail' => 'email',
    //     'age' => 'numeric|between:0,150',
    //   ]);
    //   if($validator->fails()){
    //     return redirect('/hello')
    //       ->withErrors($validator)
    //       ->withInput();
    //   }
    //   return view('hello.index',['msg' => '正しく入力されました']);
    // }
    // public function index(Request $request){
    //   $validator = Validator::make($request->query(),[
    //     'id' => 'required',
    //     'pass' => 'required',
    //   ]);
    //   if($validator->fails()){
    //     $msg = 'クエリーに問題があります。';
    //   }else{
    //     $msg = 'ID/PASSを受け付けました。フォームを入力ください。';
    //   }
    //   return view('hello.index',['msg' => $msg]);
    // }

    // public function index(Request $request){
    //   return view('hello.index',['msg'=>'フォームを入力下さい']);
    // }

    // public function post(Request $request){
    //   $rules = [
    //     'name' => 'required',
    //     'mail' => 'email',
    //     'age' => 'numeric',
    //   ];
    //   $message = [
    //     'name.required' => '名前は必ず入力して下さい。',
    //     'mail.email' => 'メールアドレスが必要です。',
    //     'age.numeric' => '年齢を整数で記入下さい。',
    //     'age.min' => '年齢は0歳以上で入力下さい。',
    //     'age.max' => '年齢は200歳以下で入力下さい。',
    //   ];
    //   $validator = Validator::make($request->all(),$rules,$message);
    //   $validator -> sometimes('age','min:0',function($input){
    //     return !is_int($input->age);
    //   });
    //   $validator -> sometimes('age','max:200',function($input){
    //     return !is_int($input->age);
    //   });
    //   if($validator->fails()){
    //     return redirect('/hello')
    //       ->withErrors($validator)
    //       ->withInput();
    //   }
    //   return view('hello.index',['msg' => '正しく入力されました']);
    // }

    // public function post(HelloRequest $request){
    //   return view('hello.index',['msg'=>'正しく入力されました！']);
    // }

    // public function index(Request $request){
    //   if($request->hasCookie('msg')){
    //     $msg = 'Cookie:'.$request->cookie('msg');
    //   }else{
    //     $msg = '※クッキーはありません。';
    //   }
    //   return view('hello.index',['msg' => $msg]);
    // }

    // public function post(Request $request){
    //   $validate_rule = [
    //     'msg' => 'required',
    //   ];
    //   $this -> validate($request,$validate_rule);
    //   $msg = $request->msg;
    //   $response = response()->view('hello.index',['msg'=>'「'.$msg.'」をクッキーに保存しました。']);
    //   $response -> cookie('msg',$msg,100);
    //   return $response;
    // }

    // public function index(Request $request){
    //   //インスタンスに依存しないためDB::select()は静的メソッドでの実装である
    //   // $items = DB::select('select * from people');
    //   // return view('hello.index',['items' => $items]);
    //
    //   if(isset($request->id)){
    //     $param = ['id' => $request -> id];
    //     $items = DB::select('select * from people where id =:id',$param);
    //   }else{
    //     $items = DB::select('select * from people');
    //   }
    //   return view('hello.index',['items' => $items]);
    // }

    // public function index(Request $request){
    //   $items = DB::select('select * from people');
    //   return view('hello.index',['items' => $items]);
    // }

    // public function index(Request $request){
    //   $items = DB::table('people')->get();
    //   return view('hello.index',['items' => $items]);
    // }

    public function index(Request $request){
      $user = Auth::user();
      $sort = $request->sort;
      //$sortが空のときのデフォルトをageにするための処理を追加する
      if(empty($sort)){
        $sort = 'age';
      }
      // $items = DB::table('people')->orderBy('age','asc')->simplePaginate(5);
      // $items = Person::orderBy('age','asc')->simplePaginate(5);
      // $items = Person::orderBy($sort,'asc')->simplePaginate(5);
      $items = Person::orderBy($sort,'asc')->paginate(5);
      //return view('hello.index',['items' => $items]);
      $param = ['items'=>$items,'sort'=>$sort,'user'=>$user];
      return view('hello.index',$param);
    }

    public function post(Request $request){
      $items = DB::select('select * from people');
      return view('hello.index',['items' => $items]);
    }

    public function add(Request $request){
      return view('hello.add');
    }

    public function create(Request $request){
      $param = [
        'name' => $request->name,
        'mail' => $request->mail,
        'age' => $request->age,
      ];
      //DB::insert('insert into people (name,mail,age) values (:name,:mail,:age)',$param);
      DB::table('people')->insert($param);
      return redirect('/hello');
    }

    public function edit(Request $request){
      // $param = [
      //   'id'=>$request->id,
      // ];
      // $item = DB::select('select * from people where id =:id',$param);
      $item = DB::table('people')->where('id',$request->id)->first();
      //return view('hello.edit',['form'=>$item[0]]);
      return view('hello.edit',['form'=>$item]);
    }

    public function update(Request $request){
      $param = [
        'id' => $request->id,
        'name' => $request->name,
        'mail' => $request->mail,
        'age' => $request->age,
      ];
      //DB::update('update people set name =:name,mail=:mail,age=:age where id=:id',$param);
      DB::table('people')->where('id',$request->id)->update($param);
      return redirect('/hello');
    }

    public function del(Request $request){
      // $param = [
      //   'id'=>$request->id,
      // ];
      // $item = DB::select('select * from people where id =:id',$param);
      $item = DB::table('people')->where('id',$request->id)->first();
      //return view('hello.del',['form'=>$item[0]]);
      return view('hello.edit',['form'=>$item]);
    }

    public function remove(Request $request){
      // $param = [
      //   'id'=>$request->id,
      // ];
      // $item = DB::delete('delete from people where id =:id',$param);
      DB::table('people')->where('id',$request->id)->delete();
      return redirect('/hello');
    }

    // public function show(Request $request){
    //   $id = $request->id;
    //   $item = DB::table('people')->where('id',$id)->first();
    //   return view('hello.show',['item'=>&item]);
    // }

    // public function show(Request $request){
    //   $name = $request->name;
    //   $item = DB::table('people')->where('name','like','%'.$name.'%')
    //     ->orwhere('mail','like','%'.$name.'%')->get();
    //   return view('hello.show',['item'=>&item]);
    // }

    //Limitでページネーション $pageはURLでページ指定する
    public function show(Request $request){
      $page = $request->page;
      $items = DB::table('people')->offset($page * 3)
        ->limit(3)->get();
      return view('hello.show',['items'=> $items]);
    }

    public function rest(Request $request){
      return view('hello.rest');
    }

    public function ses_get(Request $request){
      $sesdata = $request->session()->get('msg');
      return view('hello.session',['session_data'=>$sesdata]);
    }

    public function ses_put(Request $request){
      $msg = $request->input;
      $request->session()->put('msg',$msg);
      return redirect('/hello/session');
    }

    public function getAuth(Request $request){
      $param = ['message'=>'ログインして下さい。'];
      return view('hello.auth',$param);
    }
    public function postAuth(Request $request){
      $email = $request->email;
      $password = $request->password;
      if(Auth::attempt(['email'=>$email,'password'=>$password])){
        $msg = 'ログインしました。('.Auth::user()->name.')';
      }else{
        $msg = 'ログインに失敗しました。';
      }
      return view('hello.auth',['message'=>$msg]);
    }
}
