select
	a.IdUser,
	a.IdApp,
	a.nivel,
	a.quien_autorizo,
	a.fecha_autorizacion,
	(select idapcat from apps where idapp = a.idapp) as idapcat,
	(select nombre from apps_categorias where idapcat = (select idapcat from apps where idapp = a.idapp)) as Categoria
	
	
from apps_seguridad a

where IdUser='2809'