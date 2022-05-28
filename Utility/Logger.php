<!-- /*
Stephan Moncavage
CST451
Capstone Project
5/19/2022
Logging Module
*/
/* 
https://www.loggly.com/ultimate-guide/php-logging-basics/

Directive 	Default 	Recommended 	Description
display_errors ** 	1 	0 	Defines whether errors are included in output.
display_startup_errors 	0 	0 	Whether to display PHP startup sequence errors.
error_log *** 	0 	path 	Path to the error log file. When running PHP in a Docker container, consider logging to stdout instead.
error_reporting 	null 	E_ALL 	The minimum error reporting level.
log_errors 	0 	1 	Toggles error logging.
log_errors_max_length 	1024 	1024 	Max length of logged errors. Set to zero for no maximum.
report_memleaks 	1 	0 	Reports memory leaks detected by Zend memory manager.
track_errors 	0 	1 	Stores the last error message in $php_errormsg.

Status 	Message 	            Description
200 	OK 	                    Indicates that the request was successful.
201 	Created 	            The object was successfully created. This is for a POST call.
204 	Deleted 	            The object was deleted. This pertains to DELETE calls.
400 	Bad Request 	        Check your request parameters. You might be using an unsupported parameter or have a malformed something or another.
401 	Unauthorized 	        The credentials you specified were invalid.
403 	Forbidden 	            User does not have privileges to execute the action.
404 	Not Found 	            The resource you have referenced could not be found.
409 	Conflict/Duplicate 	    There was some conflict. Most likely you are trying to create a resource that already exists.
410 	Gone 	                You have referenced an object that does not exist.
500 	Internal Server Error 	There was an internal error processing your request. If the description is a timeout, you can try again.
501 	Not Implemented 	    You are trying to access functionality that is not implemented. Yet.
503 	Throttled 	            The server is currently unable to handle the request due to a temporary overloading or maintenance of the server.
504 	Gateway Timeout 	    There was a network issue contacting the server. Try again later.
*/
-->
<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use Monolog\Handler\LogglyHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Processor\WebProcessor;
require_once __DIR__.('vendor/autoload.php');

class MyLogger implements \Psr\Log\LoggerInterface {
	private static ?Logger $logger = null;
		
	static function getLogger(): ?Logger
    {
		if(self::$logger == null){
			//Log to Standard 
			self::$logger = new Logger('phpLog');
			self::$logger->pushHandler(new LogglyHandler('e835e345-6359-461c-ae27-66eb600b922e/tag/monolog', Logger::DEBUG));
            $dateFormat = "Y n j, g:i a";
            $output = "%datetime% > %level_name% > %message% %context% %extra%\n";
            //$formatter = new LineFormatter($output, $dateFormat);
            //$stream = new StreamHandler(__DIR__.'../my_app.log', Level::Debug);
            //$stream->setFormatter($formatter);
			self::$logger->addRecord(1, 'test logs to loggly' );
		}
		return self::$logger;
	}

    public function emergency(\Stringable|string $message, array $context = []): void
    {
        self::getLogger()->addRecord($message, (string)$context);
    }

    public function alert(\Stringable|string $message, array $context = []): void
    {
        self::getLogger()->addRecord($message, (string)$context);
    }

    public function critical(\Stringable|string $message, array $context = []): void
    {
        self::getLogger()->addRecord($message, (string)$context);
    }

    public function notice(\Stringable|string $message, array $context = []): void
    {
        self::getLogger()->addRecord($message, (string)$context);
    }

    public function info(\Stringable|string $message, array $context = []): void
    {
        self::getLogger()->addRecord($message, (string)$context);
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        self::getLogger()->addRecord($message, (string)$context);
    }

    public function error(\Stringable|string $message, array $context = []): void
    {
        self::getLogger()->addRecord($message, (string)$context);
    }

    public function warning(\Stringable|string $message, array $context = []): void
    {
        self::getLogger()->addRecord($message, (string)$context);
    }

    public function debug(\Stringable|string $message, array $context = []): void
    {
        self::getLogger()->addRecord($message, (string)$context);
    }
}
?>