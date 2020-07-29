<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\User;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard();

    	//$this->call(PostTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    	//DB::Table('post')->delete();

    	//$this->command->info('Done');

    	
    	$faker = Faker::create();
    	for($i=0; $i<10;$i++){
    		Post::create(['descricao' => $faker->text, 'data' => 
    			$faker->dateTime, 'user_id' => $i]);//dateTime
    	
    	}
    	
    	//dd(Post::count());
    	for($i=0;$i<10;$i++)
            $model= user::create(['name'=> $faker->name(), 'email' => $faker->email, 'password'=> '123456' ]);


       
    }
}
