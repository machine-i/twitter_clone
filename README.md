# twitter_clone
Tal projeto, foi realizado unicamente para fins de aprendizado.

<img src="https://user-images.githubusercontent.com/68506101/152866261-55115509-116d-4389-8521-0a7a4a3bd1cd.png">

Para utilizar é necessário instalar o programa XAMPP e inicializar os módulos do Apache e MySQL. Em seu computador, vá até o diretório "C:" e abra a pasta "xampp". A pasta chamada "twitter_clone" desse repositório deve ser armazenada dentro da tal pasta (xampp).

Dentro da pasta "xampp", há uma pasta chamada "htdocs". Dentro dela, crie uma nova pasta chamada "bkp". Mova todos os arquivos para dentro da pasta que acaba de criar, a "bkp". Deixando a pasta "htdocs" do seu computador apenas com um único diretório, o "bkp".

O diretório "htdocs" disponibilizado nesse repositório, contém alguns arquivos. Tais arquivos devem ser levados para a pasta "htdocs" do seu computador. O arquivo ".htaccess" também deve ser levado para a pasta "htdocs" do seu computador.

<hr>

Com o programa do XAMPP aberto e os módulos do Apache e MySQL inicializados, clique em "Admin" do módulo "MySQL", abrindo, dessa forma, o "phpmyadmin".

Com a página do "phpmyadmin" aberta, vá até a aba "SQL" e execute as seguintes instruções:
<hr>
create database twitter_clone;

use twitter_clone;

create table usuarios(
	id int not null primary key AUTO_INCREMENT,
	nome varchar(100) not null,
	email varchar(150) not null,
	senha varchar(32) not null
);

create table tweets(
	id int not null PRIMARY KEY AUTO_INCREMENT,
	id_usuario int not null,
	tweet varchar(140) not null,
	data datetime default current_timestamp
);

create table usuarios_seguidores(
	id int not null primary key auto_increment,
	id_usuario int not null,
	id_usuario_seguindo int not null
);
<hr>

Por fim, basta digitar "localhost" na URL do seu navegador e criar uma conta para começar a acessar a aplicação.
