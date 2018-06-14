<?php

include_once 'validModel.php';
include_once 'helpers/htmlhelpers.php';

class Model
{
	private $mArrey;

	public function __construct()
	{
		$this->mArrey = array(
			'%TITLE%'       => 'Contact Form',
			'%ERRORS%'      => 'Empty field',
			'%SELECT%'      => $this->select(),
			'%ERR_NAME%'    => '',
			'%ERR_EMAIL%'   => '',
			'%ERR_DEP%'     => '',
			'%ERR_MESS%'    => '',
			'%ERR_DATE%'    => '',
			'%FIELD_NAME%'  => '',
			'%FIELD_EMAIL%' => '',
			'%FIELD_MESS%'  => '',
			'%MAIL_SEND%'   => '',
			'%MAIL_ERROR%'  => ''
		);
	}

	public function getArray()
	{
		return $this->mArrey;
	}

	public function checkForm()
	{
		$valid = new ValidModel();

		if (!$valid->checkName($_POST['name']))
			$this->mArrey['%ERR_NAME%'] = ERROR_VALIDATE_NAME;

		if (!$valid->checkEmail($_POST['email']))
			$this->mArrey['%ERR_EMAIL%'] = ERROR_VALIDATE_EMAIL;

		if (!$valid->checkDep($_POST['department'], $this->selectArray()))
			$this->mArrey['%ERR_DEP%'] = ERROR_VALIDATE_DEP;

		if (!$valid->checkMessade($_POST['message']))
			$this->mArrey['%ERR_MESS%'] = ERROR_VALIDATE_MESSAGE;

		if (!$valid->checkDate($_POST['date']))
			$this->mArrey['%ERR_DATE%'] = ERROR_VALIDATE_DATE;

		if ($valid->getError())
		{
			$this->mArrey['%FIELD_NAME%'] = $_POST['name'];
			$this->mArrey['%FIELD_EMAIL%'] = $_POST['email'];
			$this->mArrey['%SELECT%'] = $this->select();
			$this->mArrey['%FIELD_MESS%'] = $_POST['message'];

			return false;
		}
		return true;
	}

	public function sendEmail()
	{
		$dep = $this->selectArray();
		$mess = htmlspecialchars(trim($_POST["message"]));

		$header =  'From: '. $_POST['email'] . "\r\n";
		$header .= 'Reply-To: ' . $_POST['email'] . "\r\n";
		$header .= 'Subject: ' . $dep[$_POST['department']] . "\r\n";
		$header .= 'Content-type: text/html; charset=utf8' . "\r\n";
		$header .= 'X-Mailer: PHP/' . phpversion();

		$message = "From: ". $_POST["name"] . "<br><br>\r\n";
		$message .= $mess . "<br><br>\r\n";
		$message .= 'IP address: ' . $_SERVER['REMOTE_ADDR'] . "<br>\r\n";
		$message .= 'Client time: '.$_POST['date'] . "<br>\r\n";

		if (!mail('ucfirst.ruslan@gmail.com', $dep[$_POST['department']], $message, $header))
		{
			throw new Exception(EMAIL_ERROR);
		}

	}

	private function select()
	{
		return HtmlHelpers::getDropdown(NAME_SELECT, $this->selectArray(), $_POST['department']);
	}

	private function selectArray()
	{
		return array(
			'department_1'  => DEPARTMENT_1,
			'department_2'  => DEPARTMENT_2,
			'department_3'  => DEPARTMENT_3
		);
	}
}
