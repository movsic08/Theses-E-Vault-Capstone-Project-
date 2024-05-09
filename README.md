
# Theses E-Vault

An Archiving system for retrieving and storing reaserch works for PSU-Alaminos City Campus.


## Authors & Developer

- Elmer Tirao
- Milane Batan
- John Jeric Redito
- John Riemyl Catubay



## Run Locally

Clone the project

```bash
  git clone https://github.com/movsic08/Theses-E-Vault-Capstone-Project-.git
```

Go to the project directory

```bash
  cd Theses-E-Vault-Capstone-Project
```

Small configuration
- Change the.env.example into .env
- you need to have mailer account to make the OTP working. You can add your email and password inside the .env file (I used gmail account for this)
```bash
MAIL_USERNAME= #Insert the email of your enabled gmail mailer here
MAIL_PASSWORD= #Insert the password of your enabled gmail mailer here
```



Install dependencies

```bash
  php artisan key:generate
  php artisan storage:link
  npm install
  composer install
```
PLEASE MAKE SURE THE STORAGE IS BINDED CORRECTLY, ELSE SOME FUNCTIONS AND DATA DUMP WILL NOT LOAD. To get the Data dump, contact the developer (me), to get the link of data dump files. After receiving the copy thru link, extract the folder in /storage and extract the following folder: sql, watermarks, PDF_uploads. These folders should be inside the /storage.

Import the database (sql file) for faster and smooth use of the system.
- The SQL dump file can be found in the folder "storage/sql/". You  need to use MySQl to import the database. THIS IS MUST, WITHOUT IMPORTING THE SQL DUMP YOU CAN'T USE THE FUNCTIONALITY OF THE SYSTEM SINCE I DIDN'T USED SEEDER FOR THIS.

Start the server

```bash
  npm run start
  php artisan serve
```


## Documentation

[Documentation](https://linktodocumentation)


## FAQ

#### Something went wrong in using or insalling

You can contact us on our email or thru here.






