# Tycoon

El proyecto Tycoon consiste en una aplicación web que permite gestionar citas médicas entre pacientes, médicos generales y médicos especialistas. Los pacientes pueden agendar y modificar citas con médicos generales y los médicos generales pueden dar órdenes para citas con médicos especialistas. Los pacientes pueden agendar citas con médicos especialistas si tienen una orden para hacerlo. 

### Pasos para correr el proyecto:

1.  configurar el archivo .env dependiendo del gestor y el nombre de la base de datos que se vaya a usar. 
_El nombre de la base de datos usada es **tycoon**_
2.  abrir una consola y en la carpeta del proyecto utilizar el comando composer install.
3.  utilizar el comando php artisan key:generate.
4.  realizar una migracion con el comando php artisan migrate.
5.  cargar los datos iniciales a la base de datos con el comando php artisan db:seed.
6.  poner a correr el proyecto con el comando php artisan serve.

#### Como utilizar el proyecto: 
Después de haber ejecutado los comandos anteriores, el único usuario registrado en la DB será el usuario "admin". 
La cédula del admin es _**1**_ y su contraseña es _**12345678**_. 
Una vez dentro del perfil del admin, podemos crear pacientes, médicos generales y médicos especialistas. 
Una vez creados usuarios suficientes de cada tipo, podemos proceder a ingresar al perfil de un paciente y desde allí agendar citas con un médico general. 
Desde el perfil de un médico general, podemos generar una orden para que que el paciente pueda agendar una cita con un médico especialista.
Desde el perfil del paciente, podemos consultar las órdenes existentes y por medio de ellas podemos agendar citas con médicos especialistas.
Desde el perfil de un médico especialista, podemos generar una nueva orden.
