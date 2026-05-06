# Docker setup

This project is a legacy plain PHP app that uses the old `mysql_*` extension, so the Docker image runs PHP 5.6 with Apache.

## Start the app

```sh
docker compose up --build
```

Open:

```text
http://localhost:8080/login.php
```

Adminer is available at:

```text
http://localhost:8081
```

Use these Adminer login details:

```text
System: MySQL
Server: db
Username: root
Password: root
Database: fee_session or 2017-2018
```

MySQL is exposed on the host at:

```text
127.0.0.1:3307
user: root
password: root
```

## Database import

On the first run, Docker imports:

- `fee_session.sql`
- `2017-2018 (1).sql`

The app reads the active school session from the `fee_session.user_session` table, which currently points to the `2017-2018` database.

If you need to re-import from scratch:

```sh
docker compose down -v
docker compose up --build
```

## Notes

- The PHP files still default to the old local settings (`localhost`, `root`, empty password) when Docker environment variables are not present.
- Inside Docker, the app uses `DB_HOST=db`, `DB_USER=root`, and `DB_PASS=root`.
