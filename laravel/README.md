 API de Categorias e Subcategorias

Este projeto é uma API construída com Laravel para gerenciar categorias e subcategorias, incluindo seus relacionamentos. A API utiliza Laravel Sanctum para autenticação e segue boas práticas de desenvolvimento.

## Funcionalidades

- **Gerenciamento de Categorias:** Criação, leitura, atualização e exclusão de categorias.
- **Gerenciamento de Subcategorias:** Criação, leitura, atualização e exclusão de subcategorias.
- **Relacionamento entre Categorias e Subcategorias:** Cada subcategoria está associada a uma categoria específica.
- **Autenticação:** Protege as rotas com autenticação baseada em tokens usando Laravel Sanctum.

## Tecnologias Utilizadas

- [Laravel](https://laravel.com/) - Framework PHP para desenvolvimento web.
- [Laravel Sanctum](https://laravel.com/docs/9.x/sanctum) - Biblioteca para autenticação de APIs.
- [MySQL](https://www.mysql.com/) - Sistema de gerenciamento de banco de dados relacional.

## Pré-requisitos

Antes de começar, certifique-se de ter as seguintes ferramentas instaladas:

- [PHP](https://www.php.net/) (>= 8.0)
- [Composer](https://getcomposer.org/)
- [docker](https://www.docker.com/) (opcional)
- [MySQL](https://www.mysql.com/) ou outro banco de dados compatível

## OBS

- Existe um arquivo no Insomnia na raiz do projeto para ser importado para auxiliar nos endpoints