# anales_ciencia_api

<div id="top"></div>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="">
    <img src="https://key0.cc/images/preview/27177_e37c477ada017fd7cc4ecc3ac315a21a.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Anales de la Ciencia API</h3>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

Este proyecto ha sido realizado con propositos académicos.
Es la parte back de un servicio que se pretende montar más adelante.

<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

This are some of the languages and tools used to build this project

* [Symfony](https://symfony.com/)
* [PHP8](https://www.php.net/releases/8.0/es.php)
* [API Platform](https://api-platform.com/)
* [Swagger](https://swagger.io/)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

Para que el proyecto funcione se necesita tener instalado:

* PHP8        : [Instalar php](https://www.php.net/downloads) (Se puede instalar con xampp https://www.apachefriends.org/es/index.html)
* Composer    : [Guía instalación composer](https://www.geeksforgeeks.org/how-to-install-php-composer-on-windows/) (Elegir la ruta donde está el php.exe guardado del paso anterior)
* Mysql       : [Instalar mysql](https://dev.mysql.com/downloads/) (Instalarlo en el puerto 3306 (Puerto por defecto))
* scoop       : [Guía instalaciçon scoop](https://tecnonucleous.com/2021/05/23/como-instalar-scoop-en-windows/) (Paquete para poder instalar symfony-cli)
* symfony-cli : scoop install symfony-cli




### Installation

_This project has been build in a Windows 10_

1. Clonar el repositorio
   ```sh
   git clone https://github.com/walterbaidal/anales_ciencia_api.git
   ```

2. Acceder al directorio e instalar las dependencias con composer
   ```sh
   cd /anales_ciencia_api && composer install
    ```
 
3. Crear base de datos
   ```sh
   ./bin/console doctrine:database:create
   ``` 
   
4. Actualizar schema de la base de datos
   ```sh
   ./bin/console doctrine:schema:update --dump-sql --force
   ``` 

5. Ejecutar el server
   ```sh
   symfony server:start
   ``` 
   
Acceder a la ruta que nos proporciona el cli. Normalmente 127.0.0.1:8001/api (Sea cual sea la direccion, entrar en /api)


<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

Work in progress 

_For more examples, please refer to the [Documentation](https://example.com)_

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Walter Baidal - [@NatsukashiiNee](https://twitter.com/NatsukashiiNee) - walterbaidal96@gmail.com

Project Link: [https://github.com/walterbaidal/k8s-app](https://github.com/walterbaidal/k8s-app)

<p align="right">(<a href="#top">back to top</a>)</p>
