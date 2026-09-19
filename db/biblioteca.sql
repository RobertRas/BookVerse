CREATE DATABASE IF NOT EXISTS biblioteca;

USE biblioteca;

CREATE TABLE IF NOT EXISTS categoria (

    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (255)
);

CREATE TABLE IF NOT EXISTS livro (
    id_livro INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR (255),
    ano_pub VARCHAR (255),
    autor TEXT,
    resumo VARCHAR(255),
    capa VARCHAR(255),
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria)
);


CREATE TABLE IF NOT EXISTS usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    foto VARCHAR(255)
);

--seeds
INSERT INTO categoria (nome) VALUES ("Romance"), ("Terror"),("Fantasia");

INSERT INTO livro (titulo, ano_pub, autor, resumo) VALUES
('Dom Casmurro', 1899, 'Machado de Assis', 'A história de Bento Santiago, o Bentinho, e seu amor por Capitu, marcada por intensas dúvidas sobre uma possível traição.'),
('1984', 1949, 'George Orwell', 'Um romance distópico sobre uma sociedade totalitária controlada pelo Grande Irmão, onde a verdade é manipulada.'),
('O Senhor dos Anéis: A Sociedade do Anel', 1954, 'J.R.R. Tolkien', 'O início da jornada do hobbit Frodo Bolseiro para destruir o Um Anel e salvar a Terra-média das forças sombrias de Sauron.'),
('O Pequeno Príncipe', 1943, 'Antoine de Saint-Exupéry', 'Um piloto de avião perdido no deserto do Saara encontra um jovem príncipe que viaja de planeta em planeta em busca de sabedoria.'),
('A Metamorfose', 1915, 'Franz Kafka', 'A perturbadora história de Gregor Samsa, um caixeiro-viajante que acorda um dia transformado em um inseto monstruoso.');