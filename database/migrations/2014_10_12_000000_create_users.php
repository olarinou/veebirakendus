<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	/*public function up($username,$password)
	{
		DB::table('users')->insert(
			array(
			'id'=>increments('id')
			'username'=>$username,			
			//'password' =>Hash::make($password),
			'password' =>$password,
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			)
		);
		/*DB::table('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username')->unique();			
			$table->string('password');
			//$table->string('remember_token',100)->nullable();
            //$table->timestamps();
		*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 *//*
	public function down()
	{
		DB::table('users')->where('username','=',$username)->delete(); 
	}
	*/

}
