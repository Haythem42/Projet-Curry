## How to use

```bash
#Clone this repository
git clone https://gitlab.com/sco-chartreux/slam21-22/team-4/curry.git

#Run the project
php -S 127.0.0.1:8080 -t html (You can change the port.)
```


## Features available

* Fireman part
    - [x] **Display all** and **research** a fireman.
    - [x] **Create, modify and delete** fireman.<br><br>

* Barrack part
    - [x] **Display all** and **research** a barrack.
    - [x] **Create, modify and delete** barracks.<br><br>

* User part
    - [x] **Display all** the users.
    - [x] **Create, modify and delete** users.<br><br>

* Role part
    - [x] **Display all** the roles and permissions.
    - [x] **Create, modify and delete** roles and permissions.<br><br>


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
The administrator account can see all the page of the project.
Login : 
Password : 
```

* **Fireman manager**

```bash
The fireman manager account can see all the page related to firemen.
Login : 
Password : 
```

* **Barrack manager**

```bash
The barrack manager account can see all the page related to barracks.
Login : 
Password : 
```

* **User**

```bash
The user account has limited permissions and can see a number limited of page.
Login : 
Password : 
```


## License

:copyright: Haythem Belhadjmansour and Quentin Chavet
