# anales_ciencia_api

<div id="top"></div>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="">
    <img src="https://assets.stickpng.com/images/589c80bb64b351149f22a81e.png" alt="Logo" width="80" height="80">
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

* Git           : [Git Bash para Windows](https://git-scm.com/download/win)
* Docker        : [IDocker Dekstop en Windows](https://docs.docker.com/desktop/windows/install/) Comprobar que se incluya docker-compose


### Installation

_This project has been build in a Windows 10_

1. Clonar el repositorio
   ```sh
   git clone https://github.com/walterbaidal/anales_ciencia_api.git
   ```

2. Acceder al directorio y provisionar los servicios
   ```sh
   cd /anales_ciencia_api && docker-compose up -d --build
    ```
 
3. Acceder al contenedor de PHP
   ```sh
   docker exec -it php /bin/bash
   ``` 
   
4. Instalar las dependencias
   ```sh
   composer install
   ``` 

5. Actualizar schema de la base de dato
   ```sh
   ./bin/console doctrine:schema:update --dump-sql --force
   ``` 
   
Acceder en tu navegador favorito: http://localhost:8080/api


<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

Este es un ejemplo de creación (POST) de un usuario (User)
* Desplegamos endpoint POST api/user
* Clickeamos en Try it out
* Rellenamos los datos
* Clickeamos en Execute

![image](https://user-images.githubusercontent.com/9332710/168494551-aa9a311d-ffc5-4e2e-8328-49b6a5f5f5e3.png)


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

Project Link: [https://github.com/walterbaidal/anales_ciencia_api](https://github.com/walterbaidal/anales_ciencia_api)

<p align="right">(<a href="#top">back to top</a>)</p>
