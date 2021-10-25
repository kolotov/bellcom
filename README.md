# Bellcom Estonia test task
The task is about using PHP, database (any RDMS), parsing XML and printing output.

<!--
<details>
  <summary>
The task is about using PHP, database (any RDMS), parsing XML and printing output.
  </summary>
  
You are asked to create a simple PHP page, where user can insert (manually from keyboard) a number of an meeting agenda (XML file).
There are two XML files attached to this task, but consider as if there could be more (so no dropdown box).
_Example: The meetings file is XML_1580 is fetched via typing “1580” and pressing submit button._

Next to a input field there should be a button (simple submit button), pressing which should return meeting’s basic information parsed from XML file (the call should happen via AJAX). The parsing should be efficient (_hint: substring is not efficient enough here_).
  
The information to be printed is following (see XML file, only bold part should be printed):
```html
<table name="meeting"> <fields>
  <field name="Direktionsmøde"/> <field sysid="1463"/>
  <field date="2012­07­03 09:00"/>
</fields> </table>
```
The paths to the XML files are stored in the database, so when user presses submit button the right path of the XML file should be looked up in the database.
Use a simple table for that (with couple of fields). Think about how can the search can be improved for future, if we have many entries (_hint: use some of database features to increase the search speed_).
  
Please think about the page security, even very smart user should not be able to do more with a page, than just request the meeting’s information based on number and see it.

You are expected to send back:
* PHP/JS files
* db script (with table initialization and data adding ­ XML files paths)
Please look carefully at the comments in italic.

</details>
-->

## How to install
First check ports 8080 and 8000 are free

```
git clone https://github.com/kolotov/bellcom.git
cd bellcom
make run
```

## How to use
For test you can try get info for meetings 1580, 1582

### Demo XML loading
I used XMLHttpRequest for to get XML data and parse XML on client side

http://localhost:8080/index.html

### Demo JSON loading
Another way used jQuery (it also used XMLHttpRequest) for to get JSON data and parse XML on backend

http://localhost:8080/json_demo.html

#### DataBase
MySQL http://localhost:8000/
```
SERVER db
LOGIN root
PASSWORD mysql
```
BD dump https://github.com/kolotov/bellcom/blob/main/config/init.sql




