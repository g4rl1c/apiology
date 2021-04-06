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

---

## Framework reference
