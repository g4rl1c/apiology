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
  - Reference: When POST
- 204:
  - Method/s: GET, POST, PUT, DELETE
  - Message: No Content
  - Reference: When the resource was expecting an argument and got _no content_
- 400:
  - Method/s: GET, POST, PUT, DELETE
  - Message: Bad Request
  - Reference: When the resource does not exist
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
  - Message: Forbidden
  - Reference: Requires an extra **header** to access this resource
