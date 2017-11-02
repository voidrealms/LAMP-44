<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php

class myerror extends Exception
{
	public function DOOM()
	{
		$err = "The sky is falling in " . $this->getFile() . " at " . $this->getLine();
		
		return $err;
	}
}

//OOP Error handing
class AgeCheck
{
	public function CheckAge($Age)
	{
		if($Age > 0)
		{
			echo "You are $Age years old <br>";
		}
		else
		{
			//bad situation
			//throw new Exception("Age can not be zero!");
			throw new myerror("Age can not be zero!");
			
		}
	}
}

class person
{
	public function SetAge($A)
	{
		
		try
		{
			$c = new AgeCheck();
			$c->CheckAge($A);
		}
		catch(myerror $e)
		{
			echo "Error: " . $e->DOOM();
		}
		catch(Exception $err)
		{
			echo "Error: " . $err->getTraceAsString();
		}
	}
}

$a = new person();
$a->SetAge(0);

?>

</body>
</html>
