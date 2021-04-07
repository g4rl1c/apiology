# Apiology Framework

A PHP + Apache framework.

Includes a Docker YAML file to start 2 containers

1. Web Container: PHP + Apache
2. Database Container: MySQL

#### Latest Versions Tested

- **PHP**: 7.3
- **Apache**: 2.4
- **MySQL**: 5.7

---

## Environment Setup

### Step 1

Edit **docker-compose.yml**

- web > container_name: [YOUR_WEB_CONTAINER_NAME]
- web > ports: [CONTAINER_PORT:HOST_PORT]
- mysql > container_name: [YOUR_MYSQL_CONTAINER_NAME]
- mysql > environment > TZ: [YOUR_DB_TIMEZONE]
- mysql > environment > MYSQL_ROOT_PASSWORD: [YOUR_DB_ROOT_PASSWORD]
- mysql > environment > MYSQL_DATABASE: [YOUR_DB_NAME]
- mysql > environment > MYSQL_USER: [YOUR_DB_USER]
- mysql > environment > MYSQL_PASSWORD: [YOUR_DB_PASSWORD]

### Step 2

Check src working directory on **web** container:

```
...

volumes:
	- ./api/:/var/www/html/

...
```

**src** directory is where te **Apiology Framework** will sit

### Step 3

Setup Docker:

```
cd [My-Cloned-Repository]
```

```
docker-compose up -d
```

**Important**

- Make sure you remove all previous Volumes and or Containers
- Rebuild Image (if changes were made)

---

## Framework

By default, there are 2 resources created

1. App > Resources > test.php
2. App > Resources > contact.php

#### Description:

Resources are named after the Class name, and this class has the following structure:

```
<?php
namespace Apiology\Resources;

// Headers Class
use Apiology\Classes\{HTTP};

// Resource / Class
class Test extends HTTP {

	// default resource, acts as a constructor
	// responds to: domain.com/test
	public function main()
	{
		// Condition as Request Method
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			// Message in JSON
			$this->arrayPost['status_code'] = 200; // HTTP Status Code
			$this->arrayPost['response'] = "This resource exists"; // Return Message
			parent::setHeader($this->arrayPost['status_code']); // Get HTTP Status Code from parent class
			print(json_encode($this->arrayPost, JSON_PRETTY_PRINT)); // JSON
		}
	}

	// Child resource
	// responds to: domain.com/test/sample
	public function sample(){
		// Message in JSON
		$this->arrayPost['status_code'] = 200; // HTTP Status Code
		$this->arrayPost['response'] = "This resource exists"; // Return Message
		parent::setHeader($this->arrayPost['status_code']); // Get HTTP Status Code from parent class
		print(json_encode($this->arrayPost, JSON_PRETTY_PRINT)); // JSON
	}

	// Child resource with arguments
	// responds to: domain.com/test/sample-two/param1/param2/param3
	public function sample-two()
 	{

			foreach(func_get_args() as $value){
				$v = $value;
			}

			// Message in JSON
			$this->arrayPost['status_code'] = 200; // HTTP Status Code
			$this->arrayPost['response'] = var_dump($v); // Return Message
			parent::setHeader($this->arrayPost['status_code']); // Get HTTP Status Code from parent class
			print(json_encode($this->arrayPost, JSON_PRETTY_PRINT)); // JSON
 	}
}
```

### Create a Resource

### HTTP METHODS

The HTTP Methods allowed yet are:

- GET
- POST
- PUT
- DELETE

### HTTP STATUS CODES

- 200:
  - Method/s: GET
  - Message: OK
  - Reference: All GET requests
- 201:
  - Method/s: POST
  - Message: Created
  - Reference: To be used with DB and save data
- 202:
  - Method/s: POST
  - Message: Accepted
  - Reference: To send POST values
- 204:
  - Method/s: GET, POST, PUT, DELETE
  - Message: No Content
  - Reference: When the resource was expecting an argument and got _no content_
- 400:
  - Method/s: GET, POST, PUT, DELETE
  - Message: Bad Request
  - Reference: When the resource does not exist or the request is unacceptable
- 401:
  - Method/s: GET, POST, PUT, DELETE
  - Message: Unauthorized
  - Reference: When API-Key, Token or Authorization is no longer valid
- 403:
  - Method/s: GET, POST, PUT, DELETE
  - Message: Forbidden
  - Reference: Requires an extra **header** to access this resource
- 404:
  - Method/s: GET, POST, PUT, DELETE
  - Message: NOT FOUND
  - Reference: No Resurce Found
- 406:
  - Method/s: POST, PUT, DELETE
  - Message: Not Acceptable
  - Reference: The resource return an Error
