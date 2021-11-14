## How to use


```bash
#Clone this repository
git clone https://gitlab.com/sco-chartreux/slam21-22/team-4/curry.git

#Run the project
php -S 127.0.0.1:8080 -t html (You can change the port.)
```


## Features available


* Fireman part
    - [x] **DISPLAY | RESEARCH**
    - [x] **CREATE | MODIFY | DELETE**<br><br>

* Barrack part
    - [x] **DISPLAY | RESEARCH**
    - [x] **CREATE | MODIFY | DELETE** barracks.<br><br>

* User part
    - [x] **DISPLAY**
    - [x] **CREATE | MODIFY | DELETE**<br><br>

* Role & permissions part
    - [x] **DISPLAY**
    - [x] **CREATE | MODIFY | DELETE**<br><br>


## Setting up database


The **curry project** is based on a database called **'pompiers'** so you'll need this database too. Follow these steps :

* Recover the general structure of the database
```bash
mysql -u root -p pompiers < dumpFiremen.sql
```

* Recover role & user tables
```bash
mysql -u root -p pompiers < dumpRoles.sql
mysql -u root -p pompiers < dumpUsers.sql
```

* Recover data about firemen, barracks and disponibilities
```bash
mysql -u root -p pompiers < Path to the file dumpDataFiremen.sql
mysql -u root -p pompiers < Path to the file dumpDataFiremenDisponibilities.sql
mysql -u root -p pompiers < Path to the file dumpDataBarracks.sql
```

## Login and password


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
Login : p.dupont@orange.fr
Password : L8;9xS!y2v
```


## Permissions


* **How the permissions are made ?**

For this project we decided to have permissions under binary form.
Every role has a int number which corresponds to a binary number.

* **Permissions'organization**

BIT N°1 : display firemen
BIT N°2 : create a new fireman
BIT N°3 : modify | update a fireman
BIT N°4 : delete a fireman

BIT N°5 : display barracks
BIT N°6 : create a new barrack
BIT N°7 : modify | update a barrack
BIT N°8 : delete a barrack

BIT N°9 : display users
BIT N°10 : create a new user
BIT N°11 : modify | update a user
BIT N°12 : delete a user

BIT N°13 : display roles & permissions
BIT N°14 : create a role
BIT N°15 : modify | update a role or the role's permissions
BIT N°16 : delete a role


* **Administrator**

The administrator's permissions are : 1111 1111 1111 1111


* **Fireman manager**

The fireman manager's permissions are : 0000 0000 0000 1111


* **Barrack manager**

The barrack manager's permissions are : 0000 0000 1111 0000


* **Employee**

The employee's permissions are : 0000 0000 0001 0001


## Error page


This project has 2 error pages :

-The first one is a 404 error page when the URL does nott exist. If u want to test it you can try to reach for exemple /fireman/blabla.

-The second one is a 403 error page when the user does not have the right permissions to perform an action. If u want to test it you can try to reach /fireman/create using the employee account.


## License


:copyright: Haythem Belhadjmansour and Quentin Chavet
