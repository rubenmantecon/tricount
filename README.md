# tricount
A Tricount web clone written in PHP, SQL, and a bit of Bootstrap. 

# Requirements
LAMP stack or derivatives

# Setup
Create a database and username for the app. Also, grant privileges to said database:
```
CREATE DATABASE tricount;
CREATE USER exercises@localhost IDENTIFIED BY 'exercises';
GRANT ALL on tricount.* TO exercises@localhost;
```

Clone the repo, `cd` into it and run the initial SQL scripts:

```
sudo mysql < db/initDB.sql
sudo mysql < db/populateDB.sql
```

Inspect the scripts for more information about what gets inserted. For now, you can login with username **jd@jd.com** and password **jd**:

![Screenshot from 2021-06-18 17-50-04](https://user-images.githubusercontent.com/31513406/122587026-e1d72f80-d04c-11eb-9801-99fc36aecf90.png)
