<?php namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class User extends \Eloquent implements AuthenticatableContract {

	protected $table = 'users';
	protected $primaryKey = 'username';
	protected $fillable = array('username', 'password');	
	
	/*public function up()
	{
		DB::table('users')->insert(
			array(
			'id'=>increments('id'),
			'username'=>$username,			
			'password' =>Hash::make($password),
			//'password' =>$password,
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			)
		);
	}
	
	public function down()
	{
		DB::table('users')->where('username','=',$username)->delete(); 
	}
	*/
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return $this->remember_token;
	}
	
	public function getAuthIdentifier()
	{
		return $this->username; //should be changed to      
	}
	
	public function getAuthPassword()
	{
		 return $this->password;
	}
}
