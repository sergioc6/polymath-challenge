# Polymath Challenge - TaskApp

Requerimientos para configurar el proyecto:
- git
- docker
- docker-compose
- composer

## Instalación

Clonar el repositorio
```sh
$ git clone https://github.com/sergioc6/polymath-challenge.git
$ cd polymath-challenge
```

Installar dependencias
```sh
$ composer install
```

Copiar el archivo de enviromente
```sh
$ cp .env.example .env
```

Levantar los servicios
```sh
$ ./vendor/bin/sail up -d
```

Generar app key
```sh
$ ./vendor/bin/sail php artisan key:generate
```

Ejecutar migraciones y seeders
```sh
$ ./vendor/bin/sail php artisan migrate:fresh --seed
```

## Usuarios de Prueba

Usuario | Password  
--- | --- 
sergiocabral.1990@gmail.com | 123456 
juanromanriquelme@gmail.com | 123456
martinpalermo@gmail.com | 123456

## Correr Tests
```sh
$ ./vendor/bin/phpunit --filter TaskTest
```

## Links

- [TasksApp (HEROKU)](http://polymath-challenge.herokuapp.com/)
- [TasksApp (LOCAL)](http://localhost/tasks)
