# Bellcom Estonia test task

## How install
First check ports 8080 and 8000 are free in your docker

```
git clone https://github.com/kolotov/bellcom.git
cd bellcom
make run
```

## How use
For test you can try get info for meetings 1580, 1582

### Demo XML loading
I used XMLHttpRequest for to get XML data and parse XML on client side

http://localhost:8080/index.html

### Demo JSON loading
Another way used jQuery for to get JSON data (XMLHttpRequest also allow to get JSON) and parse XML on backend

http://localhost:8080/json_demo.html

#### DataBase
MySQL http://localhost:8000/
```
SERVER db
LOGIN root
PASSWORD mysql
```
BD dump https://github.com/kolotov/bellcom/blob/main/config/init.sql




