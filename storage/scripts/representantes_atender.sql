/*Representantes que podem atender*/

SELECT r.id, r.nome, r.cidade_id, r.estado
FROM representantes r
JOIN clientes_representantes cr ON r.id = cr.representante_id
JOIN clientes c ON cr.cliente_id = c.id
WHERE c.id = cliente_id;

