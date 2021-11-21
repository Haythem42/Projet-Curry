## How to use :wave:


```bash
#Clone this repository
cd toTheDirectoryWhereYouWantToClone

git clone https://gitlab.com/sco-chartreux/slam21-22/team-4/curry.git

#Run the project

cd curry

php -S 127.0.0.1:8080 -t html (You can change the port.)
```


## Features available :star2:


* Fireman part
    - [x] **DISPLAY | RESEARCH**
    - [x] **CREATE | MODIFY | DELETE**<br><br>

* Barrack part 
    - [x] **DISPLAY | RESEARCH**
    - [x] **CREATE | MODIFY | DELETE**<br><br>

* User part
    - [x] **DISPLAY**
    - [x] **CREATE | MODIFY | DELETE**<br><br>

* Role & permissions part
    - [x] **DISPLAY**
    - [x] **CREATE | MODIFY | DELETE**<br><br>


## Setting up database :eyes:


The **curry project** is based on a database called **'pompiers'** so you'll need this database too. Follow these steps :

* Create an empty database
```bash
create database pompiers;
```


* Retrieve the database

Warning :   Two possibilities for the user :
            -First possibility : You need to create a user called "pompier_dbuser" with the password "123456"
            -Second one : You create an other user but you need to modify config.ini file with your information

You have to open a terminal located in the directory which contains the file "pompiersDUMP.sql" and then :

```bash
mysql -u pompier_dbuser -p pompiers < pathToYourFile"pompiersDUMP.sql";
```


## Login and password :computer:


* **Administrator**

```bash
Login : q.chavet@orange.fr | h.belhadjmansour@orange.fr | a.lourenco@orange.fr
Password : 9tZ;6~H3zf | H45im!2QJf | =tRg89|sU7
```

* **Fireman manager**

```bash
Login : p.parker@orange.fr
Password : 2%pgL64F,x
```

* **Barrack manager**

```bash
Login : r.crow@orange.fr
Password : 2-3LG4yp~z
```

* **Employee**

```bash
Login : l.james@orange.fr
Password : L8;9xS!y2v
```

* **Secretary**

```bash
Login : e.watson@orange.fr
Password : 8@Hjd|69Pl
```

* **Manager U**

```bash
Login : d.lillard@orange.fr
Password : Tu!5x;Uio9
```

* **Manager R-P**

```bash
Login : j.morant@orange.fr
Password : G@59;!x!Es
```

* **Director**

```bash
Login : f.couder@orange.fr
Password : Hj59@;!jdh
```


## Permissions :open_book:


* **How the permissions are made ?**

For this project we decided to have permissions under binary form.
Every role has a int number which corresponds to a binary number.

* **Permissions'organization**

BIT N°1 : display firemen\
BIT N°2 : create a new fireman\
BIT N°3 : modify | update a fireman\
BIT N°4 : delete a fireman

BIT N°5 : display barracks\
BIT N°6 : create a new barrack\
BIT N°7 : modify | update a barrack\
BIT N°8 : delete a barrack

BIT N°9 : display users\
BIT N°10 : create a new user\
BIT N°11 : modify | update a user\
BIT N°12 : delete a user

BIT N°13 : display roles & permissions\
BIT N°14 : create a role\
BIT N°15 : modify | update a role or the role's permissions\
BIT N°16 : delete a role


* **Administrator**

The administrator's permissions are : 1111 1111 1111 1111


* **Fireman manager**

The fireman manager's permissions are : 0000 0000 0000 1111


* **Barrack manager**

The barrack manager's permissions are : 0000 0000 1111 0000


* **Employee**

The employee's permissions are : 0000 0000 0001 0001

* **Secretary**

The secretary's permissions are : 0000 0000 0111 0111

* **Manager U**

The user manager's permissions are : 0000 1111 0000 0000

* **Manager R-P**

The role | permissions manager's permissions are : 1111 0000 0000 0000

* **Director**

The director's permissions are : 0001 0001 0001 0001


## License


:copyright: Haythem Belhadjmansour and Quentin Chavet
