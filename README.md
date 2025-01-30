codigo para inserir tabela no banco

aruivo está em public/assets
inserir o arquivo no caminho C:/xampp/mysql/data/


LOAD DATA INFILE 'C:/xampp/mysql/data/1.csv'
INTO TABLE ensino_fundamental
CHARACTER SET utf8
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n' 
IGNORE 1 ROWS
(componente, ano_faixa, praticas_de_linguagem, objetos_de_conhecimento, habilidades, comentario, possibilidades_para_o_curriculo);

LOAD DATA INFILE 'C:/xampp/mysql/data/2.csv'
INTO TABLE ensino_fundamental
CHARACTER SET utf8
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n' 
IGNORE 1 ROWS
(ano_faixa,habilidade,codigo_habilidade,materia);