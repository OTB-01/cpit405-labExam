# CPIT405 Lab Exam Project
This project is developed as part of the CPIT405 lab exam. It comprises a web application with both front-end and back-end components, designed to demonstrate proficiency in web development concepts.

## Project Overview
simple CRUD full-stack bookmarking application that encompasses the following components:
- **Database**
- **API Server**
- **React App**

---

## Requirements

### Back-End:
- **PHP** (Version 7.4 or higher)
- **MySQL** (Version 8.0 or higher)

### Front-End:
- **Node.js** (Version 14 or higher)
- **React** (Version 17 or higher)

---

## Build and Installation

### 1. Clone the Repository:
```bash
git clone https://github.com/OTB-01/cpit405-labExam.git
cd cpit405-labExam
```

### 2. Back-End Installation and Setup:
1. Create the database and the table in:
```bash
config/db.php
```
2. Set the MySQL credentials as environment variables. on Windows:
    ```powershell
    $env:DB_HOST='localhost'
    $env:DB_PORT=3306
    $env:DB_DATABASE='bookmarking_db'
    $env:DB_USERNAME='root'
    $env:DB_PASSWORD='root'
     ```

3. **Start** the API development server:
```bash
php -c C:\php\php.ini-development -S localhost:3000
```

### 3. Front-End Installation and Setup:
1. Install dependencies:
```bash
cd react-app
npm install
```
2. **Start** the Front-End development server:
```bash
npm start
```

---

## API Endpoints
The back-end exposes several API endpoints to handle data interactions. Below is a list of key API routes:
1. `POST /api/create` Create a new Bookmark

    ```shell
    curl --request POST 'http://localhost:3000/api/create.php' \
    --header 'Content-Type: application/json' \
    --data '{
    "title": "google",
    "link": "google.com"
    }'
    ```

2. `GET /api/readAll.php` Get all Bookmarks

    ```shell
    curl 'http://localhost:3000/api/readAll.php'
    ```

3. `GET /api/readOne.php` Get a single Bookmark

    ```shell
    curl 'http://localhost:3000/api/readOne.php?id=1'
    ```

4. `PUT /api/update` Update a Bookmark by its id

    ```shell
    curl --request PUT 'http://localhost:3000/api/update.php' \
    --header 'Content-Type: application/json' \
    --data '{
    "id": 2,
    "title": "new title",
    "link": "https://newUrl.com"
    }'
    ```

5. `DELETE /api/delete` Delete a Bookmark by its id

    ```shell
    curl --request DELETE 'http://localhost:3000/api/delete.php' \
    --header 'Content-Type: application/json' \
    --data '{
        "id": 1
    }'
    ```
