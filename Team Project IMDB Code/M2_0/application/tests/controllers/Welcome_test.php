<?php

class Welcome_test extends TestCase
{
	public function testRegisterTrue()
    {
        $output = $this->request('GET', 'Register/register');        
		$this->assertStringContainsString("<input type='text' placeholder='username' name='username' class='txtb' id='username'>", $output);
		$this->assertStringContainsString("<input type='password' placeholder='password' name='password' class='txtb' id='password'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='country' name='country' class='txtb' id='country'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='gender' name='gender' class='txtb' id='gender'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='fullname' name='fullname' class='txtb' id='fullname'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='email' name='email' class='txtb' id='email'>", $output);
    }

    public function testAdminRegister()
    {
        $output = $this->request('GET', 'Admin_Register/admin_register');
		$this->assertStringContainsString("<input type='text' placeholder='username' name='username' class='txtb' id='username'>", $output);
		$this->assertStringContainsString("<input type='password' placeholder='password' name='password' class='txtb' id='password'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='country' name='country' class='txtb' id='country'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='gender' name='gender' class='txtb' id='gender'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='fullname' name='fullname' class='txtb' id='fullname'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='email' name='email' class='txtb' id='email'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='admin_id' name='admin_id' class='txtb' id='admin_id'>", $output);
    }

    public function testPCORegister()
    {
        $output = $this->request('GET', 'PCO_Register/pco_register');           
		$this->assertStringContainsString("<input type='text' placeholder='pco_name' name='pco_name' class='txtb' id='pco_name'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='organisation' name='organisation' class='txtb' id='organisation'>", $output);
		$this->assertStringContainsString("<input type='text' placeholder='phone_number' name='phone_number' class='txtb' id='phone_number'>", $output);
		$this->assertStringContainsString("<input type='password' placeholder='password' name='password' class='txtb' id='password'>", $output);
    }

	public function testLogiTrue(){
		$output = $this->request('GET', 'Login/login');
		$this->assertStringContainsString("<input type='text' placeholder='username' name='username' class='txtb' id='username'>", $output);
	}

	public function testLoginAdmin()
    {
        $output = $this->request('GET', 'Admin_Login/admin_login');
        $this->assertStringContainsString("<input type='text' placeholder='username' name='username' class='txtb' id='username'>", $output);
    }

    public function testPCOLogin()
    {
        $output = $this->request('GET', 'Pco_Login/pco_login');
        $this->assertStringContainsString("<input type='text' placeholder='pco_name' name='pco_name' class='txtb' id='username'>", $output);
    }
	
	public function testLogOutFunction()
    {

        $output = $this->request('GET', 'User/index');
		$this->assertStringContainsString("<input type='submit' name='Logout' value='Logout'>", $output);

    }

    public function testAdminAddingMovies()
    {
        $output = $this->request('GET', 'User/movieadmintest');
        $this->assertStringContainsString("<h3>Insert a new movie</h3>", $output);
    }

    public function testAdminRequireMovies()
    {
        $output = $this->request('GET', 'User/adminrequire');
        $this->assertStringContainsString("<input type='submit' name='Require' value='Require'>", $output);
    }

    public function testEditMovies()
    { 
        $output = $this->request('GET', 'User/editmovie');
        $this->assertStringContainsString("<input type='submit' name='edit' value='edit'>", $output);
    }

    public function testPcoAddingMovies()
    {
        $output = $this->request('GET','User/moviepcotest');
        $this->assertStringContainsString("<h3>Insert a new movie</h3>", $output);
    }

    public function testInsertCharacter()
    {
        $output = $this->request('GET','User/insertcharacter');
        $this->assertStringContainsString("<input type='submit' name='character' value='Submit'>", $output);
    }

    public function testInsertCharacterToMovie()
    {
        $output = $this->request('GET','User/insertcharactertomovie');
        $this->assertStringContainsString("<input type='submit' name='list' value='Submit' id='submit1'>", $output);
    }


}