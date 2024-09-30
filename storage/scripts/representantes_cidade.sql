
SELECT r.id, r.nome, r.cidade_id, r.estado
FROM representantes r
WHERE r.cidade_id = 1;

SELECT r.id, r.nome, r.cidade_id, r.estado
FROM representantes r
WHERE r.cidade_id = 3;

/*Listar Todos representantes*/

SELECT r.id, r.nome, r.cidade_id, r.estado
FROM representantes r
WHERE r.cidade_id = cidade_id;