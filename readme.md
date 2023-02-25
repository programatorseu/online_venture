# Notes 
![image](https://user-images.githubusercontent.com/3199051/221358397-cf0b2fe7-00bb-4a0f-84f4-6f435ea9d1a0.png)


Dzień dobry, 

Zadanie było w języku angielskim dlatego też pozwolę sobie na odpowiedź :

Task was about creating API - simple news SYSTEM 

> I have learned that people have different opinions about API. 

> I reason about API in terms of REST. But reading carefully your task  i was trying do not overthink it:)

- Created simple and scalable  MVC to run CRUD operations 

- Created REST API easily from that point - creating just different routing and using encoding/decoding data to FORM

- Used tailwind for Frontend  <u>not in production mode</u> !

- Used mysql. For REST API issues with numeric values being coverted to strings :

  ```sql
              PDO::ATTR_EMULATE_PREPARES => false,
              PDO::ATTR_STRINGIFY_FETCHES => false
  ```



**cautions**

I could complete all below steps in short time distance : 

- **no validation **- setup some simple rule. Could add some `filter_input` with `regex` or use external libraries 
- **no authorization** - Could setup some  key -bearer system or JWT if required 
- **no jS** - Could implement Vue.js if required
- **No Framework**   - Could build in Laravel if required.  example (https://github.com/programatorseu/LaraveRestApi)
- **no testing** - Could create few unit / feature  testing in PHPunit if required



**requirements** 

- php 8 - used constructor promotion
- composer (autoloading, phpdotenv for configuration)
- mysql 
- setup document root to public. Root is structured taking account security measures.
- used: 
```
php -S localhost:8888 -t public/
```
--- 

## Setup

1. Please create databse `online_venture_api`
2. Please import schema 

   ```bash
   mysql -u root -p online_venture_api  < schema.sql
   ```

3. Please import data
```
mysql -u root -p online_venture_api  < data.sql
```
4. run composer install
`composer install`
5. create .env file in root (.env_example)
6. run server 
```php -S localhost:8888 -t public/```


**API TABLE endpoints**

| Method       | URL                |
| ------------ | ------------------ |
| GET          | /api/articles      |
| GET          | /api/articles/{id} |
| POST         | /api/articles      |
| PUT or Patch | /api/articles/{id} |
| DELETE       | /api/articles/1    |



I have used **httpie** console client for testing purposes

```
http localhost:8888/api/articles
http localhost:8888/api/articles/1
http post localhost:8888/api/articles title="title from api" body="message from api"
http patch  localhost:8888/api/articles/1 title="new title" body="New body"
http delete  localhost:8888/api/articles/1
```

