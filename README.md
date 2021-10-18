# Bellcom Estonia test task

## How install
First check ports 8080 and 8000 are free in your docker

```
git clone https://github.com/kolotov/bellcom.git
cd bellcom
make run
```

## How use
There are meetings # 1580, # 1582

### Demo XMLHttpRequest loading
http://localhost:8080/index.html

### Demo JSON loading
http://localhost:8080/json_demo.html

#### DataBase
MySQL http://localhost:8000/
```
SERVER db
LOGIN root
PASSWORD mysql
```
BD dump https://github.com/kolotov/bellcom/blob/main/config/init.sql




