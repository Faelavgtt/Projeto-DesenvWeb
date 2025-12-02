DROP DATABASE magicart;
CREATE DATABASE magicart;
use magicart;

CREATE TABLE usuario(
	id int not null PRIMARY KEY AUTO_INCREMENT,
    email varchar(255) not null,
    senha varchar(100) not null
);

CREATE TABLE produtos(
	id int not null PRIMARY KEY AUTO_INCREMENT,
    image_url varchar(255) not null,
    nome varchar(255) not null,
    preco float not null,
    descricao varchar(255)
);
insert into usuario(id, email, senha) VALUES(null, 'admin@gmail.com', 1234);
INSERT INTO produtos (id, image_url, nome, preco, descricao) VALUES
(	
    null,
    '/Projeto-DesenvWeb/src/public/assets/img/heroimg.jpg', 
    'O Sol Amigo e o Arco-Íris',
    65.00,
    'Um desenho feliz com cores vibrantes feito com giz de cera, perfeito para o quarto!'
),
(	null,
    '/Projeto-DesenvWeb/src/public/assets/img/heroimg.jpg',
    'Dino-Amigão no Jardim',
    79.90,
    'Uma pintura de um dinossauro verde sorridente explorando um jardim de flores azuis.'
),
(	null,
    '/Projeto-DesenvWeb/src/public/assets/img/heroimg.jpg',
    'Os Gatos Baloeiros',
    88.50,
    'Três gatinhos fofos voando em balões de festa coloridos, pintura a dedo.'
),
(	null,
    '/Projeto-DesenvWeb/src/public/assets/img/heroimg.jpg',
    'Castelo de Jujuba da Princesa',
    95.00,
    'Desenho de fantasia com um castelo feito de doces e glitter, desenhado por uma criança de 5 anos.'
);

