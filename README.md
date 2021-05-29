<p><a>Documentación Proyecto Integrado</a>: https://docs.google.com/document/d/1gRsizWlva1M4w53tu9CZpWBa3xQlReg-T0Vqsyf7DtA/edit#</p>
<p></p>
<p>Procedimiento para instalar el proyecto:</p>
-Crear la base de datos desde el CMD: <br>
&nbsp;&nbsp;&nbsp;&nbsp;->mysql -u root -p contrasena <br>
&nbsp;&nbsp;&nbsp;&nbsp;->create database milesy1; <br>
&nbsp;&nbsp;&nbsp;&nbsp;->create user milesy1@'localhost' identified by 'milesy1'; <br>
&nbsp;&nbsp;&nbsp;&nbsp;->grant all on milesy1.* to milesy1@'localhost'; <br>
-En Visual Studio Code, una vez importado el proyecto ejecutamos el comando "composer update" en la raiz del proyecto. <br>
&nbsp;&nbsp;&nbsp;&nbsp;->Una vez hecho modificamos el archivo .env(nombre, usuario, contraseña de base de datos):  <br>
&nbsp;&nbsp;&nbsp;&nbsp;->De nuevo en la raiz del proyecto ejecutamos el comando "php artisan migrate:fresh --seed" <br>
&nbsp;&nbsp;&nbsp;&nbsp;->Ahora el comando "php artisan storage:link" <br>
&nbsp;&nbsp;&nbsp;&nbsp;->Y teniendo instalado NodeJs ejecutamos el comando "php artisan serve" y nuestro proyecto se verá en la url http://127.0.0.1:8000/


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre Laravel

Laravel es un marco de aplicación web con una sintaxis elegante y expresiva. Creemos que el desarrollo debe ser una experiencia divertida y creativa para ser verdaderamente satisfactorio. Laravel elimina la molestia del desarrollo al facilitar las tareas comunes que se utilizan en muchos proyectos web, como:

- [Motor de enrutamiento simple y rápido](https://laravel.com/docs/routing).
- [Potente contenedor de inyección de dependencia](https://laravel.com/docs/container).
- Múltiples back-end para almacenamiento de [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel es accesible, potente y proporciona las herramientas necesarias para aplicaciones grandes y robustas.

## Aprendiendo Laravel

Laravel tiene la biblioteca de tutoriales de video y [documentación](https://laravel.com/docs) más extensa y completa de todos los marcos de aplicaciones web modernos, por lo que es muy fácil comenzar con el marco.

Si no tiene ganas de leer, [Laracasts](https://laracasts.com) puede ayudarlo. Laracasts contiene más de 1500 videos tutoriales sobre una variedad de temas que incluyen Laravel, PHP moderno, pruebas unitarias y JavaScript. Mejore sus habilidades buscando en nuestra completa biblioteca de videos.

## Patrocinadores de Laravel

Nos gustaría extender nuestro agradecimiento a los siguientes patrocinadores por financiar el desarrollo de Laravel. Si está interesado en convertirse en patrocinador, visite la [página de Laravel Patreon](https://patreon.com/taylorotwell).

### Socios Premium

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
