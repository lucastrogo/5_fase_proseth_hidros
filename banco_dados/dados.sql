create DATABASE bench_hidros;

use bench_hidros;

create table usuarios(
    id_usuario int AUTO_INCREMENT PRIMARY key,
    nome varchar(30),
    email varchar(40),
    senha varchar(32)
);
