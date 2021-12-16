<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## Descripción

En esta tercer actividad deberéis desarrollar una aplicación web de notas con el
Framework Laravel. Además, se tendrá que acoplar la aplicación anterior también con
este Framework para poder tener una aplicación web completa de consulta de horarios
y notas escolares.

## Objetivo

El objetivo principal es:
● Desarrollar una aplicación a través de la utilización de un Framework PHP y
profundizar con el control de versiones.

## Pasos a seguir

Los pasos a seguir para llevar a cabo el producto son:
1. Importar la base de datos proporcionada por el consultor.
a. Se utilizará la base de datos completa que hemos utilizado en el
producto 2, junto con los registros creados.
b. Se importará la base de datos proporcionada por el consultor para
poder continuar con el producto 3, añadiendo así las nuevas tablas
necesarias para este producto.
c. Se podrá modificar la base de datos añadiendo campos o tablas nuevas
solamente si se quiere añadir alguna función adicional al proyecto, no
para facilitar las funciones básicas.
2. Adaptar el producto 2 a Laravel.
a. Adaptar el producto 2 realizado con el servidor XAMPP al Framework
Laravel.
b. Hacer la continuación de nuestro proyecto web escolar junto con las
características que a continuación se explican para el producto 3.
3. Crear el sitio web con los siguientes apartados:
a. FrontEnd: sitio web de contenido estático donde se presenta la
aplicación y todas sus características junto con su funcionamiento.
b. Registro-Login: sistemas de alta del usuario en el sistema y de acceso
(una vez dado de alta) a la aplicación web. En los casos que no se
pueda dar de alta o acceder, el sistema debe mostrar los mensajes de
error correspondientes. Si no es un usuario administrador, seleccionar
qué cursos o ciclos está inscrito.
c. Panel administración: una vez se accede como administrador o como
profesor, tendrá acceso al Panel Administración donde podrá ver los/las
estudiantes inscritos/as y las asignaturas y cursos ya añadidos en el
producto anterior. Cada asignatura tendrá diferentes trabajos y
exámenes junto con el día y hora de entrega de cada trabajo y la nota
correspondiente para cada estudiante. Además, también se pondrá la
nota final de evaluación continua y del curso. Finalmente, para cada
clase de cada curso, se especificará el valor del porcentaje de la nota
final que tendrá la evaluación continua (suma de todos los trabajos) y de
los exámenes (suma de todos los exámenes). El Administrador tendrá
control total sobre todas las características anteriores y el profesor solo
podrá hacer modificaciones en el curso y clase que imparte.
d. Expediente: el estudiantado podrá seleccionar el curso o cursos que
está inscrito para poder visualizar todas sus asignaturas o clases y las
notas de cada trabajo, evaluación continua, exámenes y nota final de
cada clase de cada curso inscrito.
a. Perfil: sistema de configuración del usuario: modificación del nombre de
usuario, correo electrónico y contraseña. Se podrá activar notificaciones
para recibir un correo electrónico cada vez que tenemos una nueva nota
en nuestro expediente.
4. Seguir trabajando con el control de versiones y con el mismo repositorio que se
ha utilizado en el producto anterior.

## Se requiere

Los requisitos indispensables para realizar el producto son:
1. Disponer de un editor de texto.
2. Tener instalado en local el Framework Laravel.
3. Adaptar el producto 2 al Framework Laravel.
4. Disponer de la base de datos que os proporcionará el consultor.
5. Tener un repositorio creado y seguir trabajando con él.

##


- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
