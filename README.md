# Kit de inicio para el área TI - Vilbra 🧑‍💻

## Propósito 🎯

Kit de inicio diseñado para agilizar la implementación de la plantilla **Metronic**, facilitando la gestión de un **sistema de autenticación**, asegurando una **estructura organizada** y proporcionando **paquetes útiles** listos para su implementación en diversos proyectos.

## Requisitos 📋
* **PHP 8**
* **Composer**

## Construido con 🛠️

* Plantilla:
    - **[Metronic](https://keenthemes.com/metronic/)** - Plantilla administrativa de la aplicación.
* Framework:
    - **[Laravel](https://laravel.com/docs/10.x)** - Framework PHP de alto rendimiento.
* Paquetes:
    - **[Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)** - Proporciona información detallada sobre el rendimiento y el estado de la aplicación mientras se encuentra en desarrollo.
    - **[Laravel Fortify](https://github.com/laravel/fortify)** - Implementación de funciones de autenticación de usuario.
    - **[Flysystem](https://flysystem.thephpleague.com/v1/docs/adapter/aws-s3-v3)** - Sistema de almacenamiento de archivos.
    - **[Laravel Excel](https://laravel-excel.com)** - Proporciona herramientas y funcionalidades para trabajar con archivos de hojas de cálculo Excel de una manera sencilla y conveniente.
    - **[Laravel Dompdf](https://github.com/barryvdh/laravel-dompdf)** - Facilita la generación de archivos PDF.
    - **[Laravel Permission](https://spatie.be/docs/laravel-permission/v5/introduction)** -  Facilita la gestión de roles y permisos.

## Primeros pasos 👟

1. Clonar el kit de inicio
    - En una nueva carpeta
        ```bash
        git clone https://github.com/vilbra-ti/vilbra-starterkit-metronic-lv10.git vilbra
        ```

        > **Nota:** Reemplazar `vilbra` por el nombre de la carpeta.

    - Dentro de una carpeta vacía
        ```bash
        git clone https://github.com/vilbra-ti/vilbra-starterkit-metronic-lv10.git .
        ```

2. Iniciar el proyecto
    - Ejecute el siguiente comando para copiar y renombrar el archivo `.env.example` a `.env`
        ```bash
        cp .env.example .env
        ```

    - Ejecute el siguiente comando para instalar las dependencias del proyecto
        ```bash
        composer install
        ```

    - Ejecute el siguiente comando para generar la llave de la aplicación en el archivo `.env`
        ```bash
        php artisan key:generate
        ```

## Tips 📌

* Para evitar problemas con el caché de la aplicación, se recomienda ejecutar el siguiente comando después de realizar cambios en el código:
    ```bash
    php artisan optimize:clear
    ```

* Para agregar un certificado SSL a la aplicación, se recomienda ejecutar el siguiente comando:
    ```bash
    sudo certbot --apache -d vilbra.vilbragroup.net -d www.vilbra.vilbragroup.net
    ```
    > **Nota:** Reemplazar `vilbra` por el nombre de la aplicación.

* Para crear un commit para el repositorio, se recomienda la siguiente estructura:

    | Tipo              | Descripción                                                                           |
    | :---------------- | :------------------------------------------------------------------------------------ |
    | `🎉 init:`        | Se inicia el repositorio                                                              |
    | `➕ feat:`        | Se añade una nueva característica                                                     |
    | `🛠 fix:`         | Se corrige un error                                                                   |
    | `♻️ refactor:`    | Se realiza un cambio en el código que no corrige un error ni añade una característica |
    | `📚 docs:`        | Se realiza un cambio en la documentación                                              |
    | `💀 delete:`      | Se elimina código o archivos                                                          |
    | `🚀 perf:`        | Se realiza un cambio en el código que mejora el rendimiento                           |
    | `🚧 revert:`      | Se revierte un commit                                                                 |
    | `🚧 merge:`       | Se realiza un merge de un branch a otro                                               |
    | `🚀 release:`     | Se realiza un lanzamiento de la aplicación                                            |

    ```bash
    git commit -m "Mensaje del commit" -m "Descripción del commit"
    ```

    > **Nota:** Reemplazar `Mensaje del commit` por el título del commit y `Descripción del commit` por la descripción del commit.

* Para agregar un tag al repositorio, se recomienda la siguiente estructura:

    ```bash
    git tag -a v1.0.0 -m "Mensaje del tag" -m "Descripción del tag"
    ```

    > **Nota:** Reemplazar `v1.0.0` por el nombre del tag, `Mensaje del tag` por el título del tag y `Descripción del tag` por la descripción del tag.
