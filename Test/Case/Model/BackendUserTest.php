<?php
App::uses('BackendUser', 'Backend.Model');
App::uses('AuthComponent','Controller/Component');

/**
 * BackendUser Test Case
 * 
 * @property BackendUser $BackendUser
 */
class BackendUserTest extends CakeTestCase {

	public $fixtures = array(
		'plugin.backend.backend_user',
		'plugin.backend.backend_user_role',
		'plugin.backend.backend_user_roles_user',
	);
	
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BackendUser = ClassRegistry::init('Backend.BackendUser');
	}

	/**
	 * Test required fields on create
	 */
	public function testCreateRequiredFields() {
		
		$this->BackendUser->create();
		$result = $this->BackendUser->save(array('BackendUser'=>array()));
		$this->assertEqual($result, false);
		$this->assertTrue(array_key_exists('username', $this->BackendUser->validationErrors));
		$this->assertTrue(array_key_exists('first_name', $this->BackendUser->validationErrors));
		$this->assertTrue(array_key_exists('last_name', $this->BackendUser->validationErrors));
		$this->assertTrue(array_key_exists('mail', $this->BackendUser->validationErrors));
		$this->assertTrue(array_key_exists('pass', $this->BackendUser->validationErrors));
	}
	
	/**
	 * Test automatic binding of the pass2 field if pass field is set
	 */
	public function testCreateRequiredPasswordRepeat() {
	
		$data = array(
			'username' => 'test',
			'first_name' => 'Firstname',
			'last_name' => 'Lastname',
			'mail' => 'test@example.org',
			'pass' => 'asdfasdf'
		);
		
		$this->BackendUser->create();
		$result = $this->BackendUser->save(array('BackendUser'=>$data));
		$this->assertEqual($result, false);
		$this->assertTrue(array_key_exists('pass2', $this->BackendUser->validationErrors));
	}
	

	/**
	 * Test if the password repeat validation works
	 */
	public function testPasswordRepeatMatch() {
	
		$update = $user = $this->BackendUser->find('first',array('recursive'=>-1));
		
		// do not match
		$update['BackendUser']['pass'] = 'asdfasdf';
		$update['BackendUser']['pass2'] = 'asdf';
	
		$result = $this->BackendUser->save($update);
		$this->assertEqual($result, false);
		$this->assertTrue(array_key_exists('pass2', $this->BackendUser->validationErrors));
		
		// do match
		$update['BackendUser']['pass'] = 'asdfasdf';
		$update['BackendUser']['pass2'] = 'asdfasdf';
		
		$result = $this->BackendUser->save($update);
		$this->assertTrue(is_array($result));
		$this->assertEqual($result['BackendUser']['password'], AuthComponent::password('asdfasdf'));
	}
	
	/**
	 * Test that the password field can't be saved directly.
	 * Instead, the field 'pass' and 'pass2' have to be set.
	 */
	public function testPasswordOverrideProtection() {
	
		// try to inject new password
		$update = $user = $this->BackendUser->find('first',array('recursive'=>-1));
		$update['BackendUser']['password'] = 'newpassword';
		$result = $this->BackendUser->save($update);
		$this->assertTrue(is_array($result));
	
		// password shouln't have changed
		$this->BackendUser->id = $user['BackendUser']['id'];
		$result = $this->BackendUser->field('password');
		$this->assertEqual($result, $user['BackendUser']['password']);
	
		// try again without validation
		$result = $this->BackendUser->save($update, false);
		$this->assertTrue(is_array($result));
	
		// password shouln't have changed
		$this->BackendUser->id = $user['BackendUser']['id'];
		$result = $this->BackendUser->field('password');
		$this->assertEqual($result, $user['BackendUser']['password']);
	
	}	
	
	/**
	 * Test create new record
	 */
	public function testCreate() {

		$data = array(
			'username' => 'test',
			'first_name' => 'Firstname',
			'last_name' => 'Lastname',
			'mail' => 'test@example.org',
			'pass' => 'asdfasdf',
			'pass2' => 'asdfasdf',
			'published' => true
		);
		
		$this->BackendUser->create();
		$result = $this->BackendUser->save(array('BackendUser'=>$data));
		$this->assertTrue(is_array($result));
		$this->assertEqual($result['BackendUser']['published'], true);
	}

	/**
	 * Test saveAdd wrapper method.
	 * Ensures that published is false. 
	 * (Security feature, as all BackendUsers can add a new user, 
	 * but only user with 'admin' and 'usermanager' roles can edit/publish users)
	 */
	public function testSaveAdd() {
		
		$data = array(
			'username' => 'test',
			'first_name' => 'Firstname',
			'last_name' => 'Lastname',
			'mail' => 'test@example.org',
			'pass' => 'asdfasdf',
			'pass2' => 'asdfasdf',
			'published' => true
		);
		
		$this->BackendUser->create();
		$result = $this->BackendUser->saveAdd(array('BackendUser'=>$data));
		$this->assertTrue(is_array($result));
		$this->assertEqual($result['BackendUser']['published'], false);
	}	
	
	/**
	 * Username and Email have to be unique
	 */
	public function testCreateDuplicate() {

		$data = array(
			'username' => 'test',
			'first_name' => 'Firstname',
			'last_name' => 'Lastname',
			'mail' => 'test@example.org',
			'pass' => 'asdfasdf',
			'pass2' => 'asdfasdf',
		);

		$this->BackendUser->create();
		$result = $this->BackendUser->save(array('BackendUser'=>$data));
		$this->assertTrue(is_array($result));

		$this->BackendUser->create();
		$result = $this->BackendUser->save(array('BackendUser'=>$data));
		$this->assertEqual($result, false);
		$this->assertTrue(array_key_exists('username', $this->BackendUser->validationErrors));
		$this->assertTrue(array_key_exists('mail', $this->BackendUser->validationErrors));
	}
	
	/**
	 * Test password update
	 */
	public function testSaveEditWithPasswordChange() {

		$update = $user = $this->BackendUser->find('first',array('recursive'=>-1));
		$update['BackendUser']['first_name'] = 'New Firstname';
		$update['BackendUser']['mail'] = 'newemail@example.org';
		$update['BackendUser']['pass'] = 'newpassword';
		$update['BackendUser']['pass2'] = 'newpassword';
		
		$result = $this->BackendUser->saveEdit($update);
		$this->assertTrue(array_key_exists('password', $result['BackendUser']));
		$this->assertEqual($result['BackendUser']['password'], AuthComponent::password('newpassword'));
	}
	
	/**
	 * Test if password is empty, then ignore it
	 */
	public function testSaveEditWithoutPasswordChange() {
		
		$update = $user = $this->BackendUser->find('first',array('recursive'=>-1));
		$update['BackendUser']['pass'] = '';
		$update['BackendUser']['pass2'] = '';
		
		$result = $this->BackendUser->saveEdit($update);
		$this->assertTrue(!array_key_exists('password', $result['BackendUser']));
	}
	
	public function testDelete() {
		$this->skipIf(true, 'Tests missing');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BackendUser);

		parent::tearDown();
	}

}
