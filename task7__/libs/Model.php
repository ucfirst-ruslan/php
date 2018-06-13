<?php 
include_once 'validModel.php';
include_once 'helpers/htmlhelpers.php';

class Model
{ 
	private $email;
	private $name;
	private $dep;
	private $message;
	private $arrayMess;
	private $dataSelect;


    public function __construct()
    {
	    $this->arrayMess = [];
    }

	/**
	 * @return array
	 */
	public function getArray(): array
	{
		return $this->arrayMess;
	}

	public function array()
    {
	    $select = $this->select();

	    $this->arrayMess['%TITLE%'] = 'Contact Form';
	    $this->arrayMess['%SELECT%'] = $select;
	    $this->arrayMess['%ERR_EMAIL%'] = '';
	    $this->arrayMess['%ERR_NAME%'] =  '';
	    $this->arrayMess['%ERR_DEP%'] = '';
	    $this->arrayMess['%ERR_MESS%'] = '';
	    $this->arrayMess['%FIELD_EMAIL%'] = '';
	    $this->arrayMess['%FIELD_NAME%'] =  '';
	    $this->arrayMess['%FIELD_DEP%'] = '';
	    $this->arrayMess['%FIELD_MESS%'] = '';

    }
	
	public function checkForm()
	{
		$valid = new ValidModel();

		$this->email = $valid->checkEmail($_POST['email']);
		$this->name = $valid->checkName($_POST['name']);
		$this->dep = $valid->checkDep($_POST['department'],$this->dataSelect);
		$this->message = $valid->checkMessade($_POST['message']);

		if ($valid->getError())
		{
			$this->addErrorMess();
			$this->addFields();
			return false;
		}
		return true;
	}
   
	public function sendEmail()
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$date = '';

		$to      = 'ucfirst.ruslan@gmail.com';
		$subject = 'the subject';
		$message = 'hello';
		$headers = "MIME-Version: 1.0 \r\n";
		$headers .= "Content-type: text/plain; charset=utf-8 \r\n";
		$headers .= "FROM: ucfirst.ruslan@gmail.com";
		$headers .= "Reply-To: >\r\n";

		if(mail($to, $subject, $message, $headers))
			echo "письмо отправлено";
		else
			echo "письмо не отправлено";
	}

	public function addErrorMess()
	{
		if (!$this->email)
			$this->arrayMess['%ERR_EMAIL%'] = ERROR_VALIDATE_EMAIL;

		if (!$this->name)
			$this->arrayMess['%ERR_NAME%'] = ERROR_VALIDATE_NAME;

		if (!$this->dep)
			$this->arrayMess['%ERR_DEP%'] = ERROR_VALIDATE_DEP;

		if (!$this->message)
			$this->arrayMess['%ERR_MESS%'] = ERROR_VALIDATE_MESSAGE;

	}

	private function addFields()
	{
		if (!$this->email)
			$this->arrayMess['%FIELD_EMAIL%'] = $this->email;

		if (!$this->name)
			$this->arrayMess['%FIELD_NAME%'] = $this->name;

		if (!$this->dep)
			$this->arrayMess['%FIELD_DEP%'] = $this->dep;

		if (!$this->message)
			$this->arrayMess['%FIELD_MESS%'] = $this->message;
	}


	private function select()
	{
		$options = array(
			'department_1'  => DEPARTMENT_1,
			'department_2'  => DEPARTMENT_2,
			'department_3'  => DEPARTMENT_3
		);
		$this->dataSelect = $options;
		$name = 'department';
		return HtmlHelpers::getDropdown($name, $options, $_POST['department']);

	}
}
