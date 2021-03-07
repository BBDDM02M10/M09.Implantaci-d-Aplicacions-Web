/* Ejercicio 1 */

/* function MostrarTarget */

SELECT * FROM trabajos;

/* function BorrarTarget */

DELETE FROM trabajos WHERE id='$id';




/* Ejercicio 2 */

/*function Inicio */

SELECT NOW();

INSERT INTO tiempo (inicio) VALUES ('$inicio');

/* function Fin */

SELECT NOW();

SELECT COUNT(id) FROM tiempo;

UPDATE tiempo SET fin = '$fin' WHERE id = '$cont';

SELECT inicio FROM tiempo WHERE id ='$cont';

UPDATE tiempo SET diff = '$timeseconds' WHERE id = '$cont';

SELECT SUM(diff) FROM tiempo;


