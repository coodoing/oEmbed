<?php
abstract class EmbedException{
	public abstract function exceptionTrace();
}

class NotFoundException extends EmbedException{
	public function exceptionTrace()
	{
		echo "404 error";
	}
}

class NotImplementedException extends EmbedException{
	public function exceptionTrace()
	{
		echo "501 error";
	}
}

class UnauthorizedException extends EmbedException{
	public function exceptionTrace()
	{
		echo "401 error";
	}
}

class IllegalException extends EmbedException{
	public function exceptionTrace()
	{
		echo "Endpoint illegal";
	}
}

?>