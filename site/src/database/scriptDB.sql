CREATE DATABASE nerdclub;

USE nerdclub;

CREATE TABLE obra(
idObra INT PRIMARY KEY auto_increment,
nome VARCHAR(45) UNIQUE,
generoObra VARCHAR(45),
imagem VARCHAR(100)
) AUTO_INCREMENT = 1;

CREATE TABLE categoria(
idCategoria INT PRIMARY KEY auto_increment,
nome VARCHAR(45) UNIQUE,
descricao VARCHAR(500)
) auto_increment = 10;

CREATE TABLE personagem (
idPersonagem INT PRIMARY KEY auto_increment,
nome VARCHAR(20) UNIQUE,
sobrenome VARCHAR(20),
idade INT,
genero CHAR(1),
cor CHAR(10),
CONSTRAINT chkGen CHECK (genero in ('m', 'f')),
descricao VARCHAR(500),
imagem VARCHAR(100),
fkCategoria INT,
fkObra INT,
FOREIGN KEY (fkCategoria) REFERENCES categoria(idCategoria),
FOREIGN KEY (fkObra) REFERENCES obra(idObra)
);

CREATE TABLE usuario(
idUsuario INT PRIMARY KEY auto_increment,
nome VARCHAR(45),
email VARCHAR(45) UNIQUE,
senha CHAR(255)
) auto_increment = 1000;

CREATE TABLE voto(
idVoto INT auto_increment,
fkPersonagem INT,
fkUsuario INT,
FOREIGN KEY (fkPersonagem) REFERENCES personagem(idPersonagem),
FOREIGN KEY (fkUsuario) REFERENCES usuario(idUsuario),
primary key (idVoto, fkPersonagem, fkUsuario)
);

SELECT * FROM obra;
INSERT INTO obra (nome, generoObra, imagem) VALUES
('Jujutsu Kaisen', 'Shounen', 'assets/img/logos/Jujutsu_Kaisen_logo.png'),
('Dragon Ball',  'Shounen', 'assets/img/logos/dbz.png'),
('Naruto', 'Shounen', 'assets/img/logos/naruto.png'),
('One Piece', 'Shounen', 'assets/img/logos/one_piece.png'),
('Death note', 'Seinen','assets/img/logos/death_note.png');

SELECT * FROM categoria;
INSERT INTO categoria (nome, descricao) VALUES
('Vilão', 'Quem tem ações vis, abjetas, buscando prejudicar alguém; desprezível. Aquele que não é nobre; desprovido de nobreza; plebeu. Quem se comporta rústica e grosseiramente; rústico.'),
('Herói', 'Quem executa ações excepcionais, com coragem e bravura, com o intuito de solucionar situações críticas, tendo como base princípios morais e éticos.'),
('Anti-heroi', 'Quem executa ações vis, abjetas buscando o bem maior. Para ele os fins justificam os meios.');

INSERT INTO personagem (nome, sobrenome, idade, genero, descricao, cor, imagem, fkCategoria, fkObra) VALUES
('Ryomen', 'Sukuna', '1500', 'm', 
'Conhecido como um ser maligno e sádico, o feiticeiro mais poderoso de todos os tempos, Ryomen Sukuna teve sua alma dividida em 20 partes seladas separadamente em cada um de seus dedos. (sim, ele possui 4 braços em sua forma original), é justamente um desses dedos que o protagonista Yuji Itadori engole e assim, entra no universo Jujutsu e trás Sukuna de volta à vida.', 
'#b81414', 'assets/img/c_icons/sukuna.jpg', 10, 1),
('Satoru', 'Gojo', '28', 'm', 
'Satoru Gojo é conhecido por ser o feiticeiro mais poderoso de seu tempo. Abençoado com o ilímitado e dos seis olhos, duas das técnicas mais poderosas do mundo Jujutsu.', 
'#40e0d0', 'assets/img/c_icons/gojo.jpg', 11, 1),
('Yutta', 'Okkotsu', '17', 'm', 
'Yuta é um estudante do segundo ano que trabalha como Feiticeiro de Grau Especial e estava na África aprimorando seu treinamento com Miguel e, depois do Arco do Incidente de Shibuya (no mangá), retornou para Tóquio afim de auxiliar seus companheiros no Jogo do Abate.', 
'#7e21ff', 'assets/img/c_icons/yuta.jpg', 11, 1),
('Maki', 'Zenin', '17', 'f', 
'Maki é uma estudante do segundo ano que não possui nenhuma energia amaldiçoada por conta da sua restrição celestial, por conta da falta de energia amaldiçoada ela recebe um aumento sobre-humano em todas as suas habilidades físicas', 
'#349834', 'assets/img/c_icons/maki.jpg', 11, 1),
('Kenjaku', null, '1500', 'm', 
'Kenjaku é um feiticeiro muito antigo, possui uma técnica inata curiosa que o permite assumir o corpo de outras pessoas através de um transplante cerebral. Técnica esta que ele tem usado duante centenas de anos para se manter vivo e dar continuidade aos seus experimentos jujutsu.', 
'#fde910', 'assets/img/c_icons/kenjaku.jpeg', 10, 1);
SELECT * FROM PERSONAGEM;

INSERT INTO usuario(nome, email, senha) VALUES
('CaiqueLucio', 'caique@gmail.com', 'sptech88');
SELECT * FROM USUARIO;

INSERT INTO voto(fkPersonagem, fkUsuario) VALUES
(1, 1000),
(1, 1000),
(1, 1000),
(1, 1000),
(1, 1000),
(1, 1000),
(2, 1000),
(2, 1000),
(2, 1000),
(2, 1000),
(2, 1000),
(2, 1000),
(2, 1000),
(3, 1000),
(3, 1000),
(3, 1000),
(3, 1000),
(3, 1000),
(3, 1000),
(3, 1000),
(3, 1000),
(3, 1000),
(3, 1000),
(4, 1000),
(4, 1000),
(4, 1000),
(4, 1000),
(4, 1000),
(4, 1000),
(4, 1000),
(4, 1000),
(4, 1000),
(5, 1000),
(5, 1000),
(5, 1000),
(5, 1000),
(5, 1000),
(5, 1000),
(5, 1000),
(5, 1000);
SELECT * FROM VOTO;