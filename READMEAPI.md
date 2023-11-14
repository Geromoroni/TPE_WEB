Miembro: Geronimo Moroni.

La temática del tpe es una empresa de viajes dependiendo la estacion, eliges la estacion en la que estas y genera los mejores destinos en la argentina sobre esa estacion.

Listar todos las ciudades:

GET ciudades

Listar todas las ciudades ordenados segun el campo seleccionado de manera ascendente o descendente:

GET ciudades?sort={CampoSeleccionado}&order=asc GET ciudades?sort={CampoSeleccionado}&order=desc

Listar una ciudad por su id:

GET ciudades/:id

Agregar un viaje:

POST ciudades

campos necesarios: {"nombre": varchar, "info_ciudad": Text , "id_estacion": int}

Editar un viaje:

PUT ciudad/:id

campos necesarios: {"nombre": varchar, "info_ciudad": Text , "id_estacion": int}

Eliminar un viaje:

DELETE ciudad/:id
