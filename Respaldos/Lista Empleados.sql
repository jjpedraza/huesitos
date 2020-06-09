select 
a.IdUser,
CONCAT(a.Nombre, ' ', a.Paterno, ' ',a.Materno) as NombreCompleto,
a.IdPuesto,
ifnull((select cat_puestos.Puesto from cat_puestos where IdPuesto = a.IdPuesto),'') as Puesto,
a.IdDpto,
(select organigrama.Departamento from organigrama where organigrama.IdDpto = a.IdDpto) as Departamento,
(select EstadoLaboral from cat_estadolaboral where IdEstadoLaboral = a.IdEstadoLaboral) as EstadoLaboral,
a.*
from empleados a 