# App


## Como utilizar


* Necessário Docker instalado;
* Fazer o download ou clone do projeto;
* Acessar o diretório do projeto;
* Executar o comando `docker-compose up -d`
* `docker exec app composer install`
* `cp .env.example .env`
* `docker-compose exec app php artisan key:generate`
* `docker-compose exec app php artisan migrate` 

Altere o arquivo `.env` com as variévies do banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```

As demais variáveis não precisar alterações.


Feito isso acesse:

Para o PHPMyAdmin: `http://localhost:13306/`

E execute os script para a criação das tebelas:
```sql
CREATE TABLE tipo_telefone (
    codigo BIGINT(20), CONSTRAINT pk_tipo_telefone primary key (codigo),
    termo VARCHAR(50)
);

CREATE TABLE sexo (
    codigo BIGINT(20), CONSTRAINT pk_sexo primary key (codigo),
    termo VARCHAR(10)
);

CREATE TABLE cidade (
    codigo BIGINT(20), CONSTRAINT pk_cidade primary key (codigo),
    termo VARCHAR(50)
);

CREATE TABLE pessoa (
    id BIGINT(20) auto_increment, CONSTRAINT pk_pessoa primary key (id),
    nome VARCHAR(150),
    sexo BIGINT(20), CONSTRAINT fk_pessoa_sexo FOREIGN KEY (sexo) REFERENCES sexo (codigo),
    cpf_cnpj VARCHAR(14),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp
);

CREATE TABLE pessoa_endereco (
    id BIGINT(20) auto_increment, CONSTRAINT pk_pessoa_endereco primary key (id),
    pessoa BIGINT(20),
    logradouro VARCHAR(150),
    bairro VARCHAR(150),
    numero VARCHAR(15),
    complemento VARCHAR(150),
    cep VARCHAR(8),
    cidade BIGINT(20), CONSTRAINT fk_pessoa_endereco_cidade FOREIGN KEY (cidade) REFERENCES cidade (codigo),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp
);

CREATE TABLE pessoa_telefone (
    id BIGINT(20) auto_increment, CONSTRAINT pk_pessoa_telefone primary key (id),
    pessoa BIGINT(20),
    tipo BIGINT(20), CONSTRAINT fk_pessoa_telefone_tipo FOREIGN KEY (tipo) REFERENCES tipo_telefone (codigo),
    numero  VARCHAR(15),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp
);

INSERT INTO sexo (codigo, termo) VALUES (1, 'Feminino');
INSERT INTO sexo (codigo, termo) VALUES (2, 'Masculino');

INSERT INTO tipo_telefone (codigo, termo) VALUES (1,'Residencial');
INSERT INTO tipo_telefone (codigo, termo) VALUES (2,'Trabalho');
INSERT INTO tipo_telefone (codigo, termo) VALUES (3,'Particular');
```

Para a aplicação: `http://localhost`


## Tela Inicial do app


![Tela](./img/01.png "Tela")

