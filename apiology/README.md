# APIOLOGY - PHP API FRAMEWORK

## Setup

- Create a function inside v*.php (where * means number of the version)
- Add Function Name in v\*.php with the following code in it

```php
$this->http_response = new HTTP();
        // temp variable "$function" remove in production
        // true => simple algorithm inside the function with a http message in return
        // false => calls module -> class -> function
        $function = false;
        if ($function) {

            $this->status_code = 200;
            $this->response['message'] = "Welcome to the version => 2, resource => sample";

            $this->http_response->httpJsonResponse(
                $this->status_code,
                $this->response
            );
        } else {
            $file = "apiology/version/resources/sample.php";
            if (file_exists($file)) {
                require $file;
                $module = "Apiology\\Apiology\\version\\resources\\Sample";
                $module = new $module();
                $module->sample($_data);
            }
        }
```

- Add the name of the method to be called in v\*.php in line 41
