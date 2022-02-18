
# Laravel 9 Back End

Serviço REST em Laravel 9 que alimenta as rotinas do teste de cadastro de produtos.


## Setup

Instalar dependências do composer

```bash
  cd teste-cadastro-produtos-laravel
  composer install
```

Renomear arquivo ".env.example" para ".env" (opicional)

Executar migrations

```bash
  vendor/bin/sail artisan migrate
```

Iniciar servidor e containers do Laravel Sail

```bash
  vendor/bin/sail up
```


## SQL de relevância de produtos

```sql
SELECT t.id,
	   t.name,
	   (SELECT group_concat(p.name separator ', ')
		  FROM product p
		INNER JOIN product_tag pt ON pt.product_id
        WHERE pt.tag_id = t.id
        ORDER BY p.name) products
  FROM tag t
ORDER BY t.id, t.name
```


## Autor

- [@luccasl](https://www.github.com/luccasl)


# Documentação

End-points e utilização geral.

## Listar todos produtos

### Request

`GET /products`

    http://localhost/api/products

## Retornar produto por "id"

### Request

`GET /products/{id}`

    http://localhost/api/products/12

## Adicionar produto

### Request

`POST /products`

    http://localhost/api/products

### Payload
    {
        "name": integer,
        "tags": [
            {
                "tag": {
                    "id": integer
                }
            }
        ]
    }

## Atualizar produto

### Request

`PUT /products/{id}`

    http://localhost/api/products/12

### Payload
    {
        "name": integer,
        "tags": [
            {
                "tag": {
                    "id": integer
                }
            }
        ]
    }

## Apagar produto

### Request

`DELETE /products/{id}`

    http://localhost/api/products/12

## Listar todas tags

### Request

`GET /tags`

    http://localhost/api/tags

## Retornar tag por "id"

### Request

`GET /tags/{id}`

    http://localhost/api/tags/12

## Adicionar tag

### Request

`POST /tags`

    http://localhost/api/tags

### Payload
    {
        "name": integer
    }

## Atualizar tag

### Request

`PUT /tags/{id}`

    http://localhost/api/tags/12

### Payload
    {
        "name": integer
    }

## Apagar tag

### Request

`DELETE /tags/{id}`

    http://localhost/api/tags/12