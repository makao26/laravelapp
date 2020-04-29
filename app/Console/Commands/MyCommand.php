<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Person;

class MyCommand extends Command
{
    //define("TESTFILE","TEST.txt");
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'my:cmd {person?}';
    // protected $signature = 'my:cmd {num?*}';
    protected $signature = 'my:cmd {--id=?} {--name=?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is my first command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      // echo "\n*今日の格言*\n\n";
      // echo Inspiring::quote();
      // echo "\n\n";
      // $p = $this->argument('person');
      // if($p != null){
      //   $person = Person::find($p);
      //   if($person != null){
      //     echo "\nPerson id = ".$p.":\n";
      //     echo $person->getData() . "\n";
      //   }
      // }else{
      //   $person = Person::all();
      //   foreach ($person as $val) {
      //     echo $val->getData()."\n";
      //   }
      // }
      $id = $this->option('id');
      $name = $this->option('name');
      if($id != '?'){
        $p = Person::find($id);
      }else{
        if($name != '?'){
          $p = Person::where('name',$name)->first();
        }else{
          $p = null;
        }
      }
      if($p != null){
        //file_put_contents(TESTFILE,$p->getData());
        Log::debug($p->getData());
        //echo $p->getData()."\n";
      }else{
        echo 'no Person find...';
      }
    }
}
