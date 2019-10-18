# apiology
PHP REST API FrameWork

## Getting Started

If it's going to be used in a path different as in the *root (/)*, change the ***RewriteBase*** from the .htaccess to the path that is going to be used


## How to use it
This API uses REST JSON via HTTP, so every message should be in a JSON format

### Resources
Each resource will be a class sindie the *Apiology/Resources* folder. Just set up a class with its own name just as shown in the sample.php Class.


### Methods
The main Method inisde each class should be main() which do not need to get any parameters.

If a method with parameters is needed, use the sample_method_two() structure code provided in the ***Sample*** Class

- Handle HTTP REQUEST METHODS isnide each method, so for example, if only a method GET allowed, try to only accept GET requests

Example:

``` 
	public function sample_method()
	{
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			#Code...
		}
		else
		{
			parent::get_header(400, true, "We only accept GET Requests");
		}
	}
```


### Headers
Headers were set in a file called headersClass.php, instantiated inside the ***Init()*** Class and with its namespace declared, so no need to instantiated

Hints about Headers

	1. To use it just call the ***get_header()*** method. 

	2. This method requires 3 parameters except the one by default **Code Client Error 417**

	3. 
	```
	parent::get_header(int [HTTP Status Code], boolean [true/false [ true = with message, false = no message (followed by null as the next parameter)]], string/null ["Custom Message for the JSON Message [or null for no message and if its set to false in the previous parameter]"])
	```

Example:
``` 
	parent::get_header(200, true, "It's all good!");
```


--------------------

## Contributing
Always available to improve, so if you want to contribute just fork it and let me know.

Thanks!!!!