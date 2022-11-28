### Proyecto v1 - YARD SALE
Este repositorio pertenece al proyecto correspondiente a la Materia de Aprendizaje de Tolerancia a Fallos, en el cual se buscará la implementación de una aplicación con las herramientas y conocimientos adquiridos en el semestre.

####Objetivo
Desarrollar una aplicación en cualquier herramienta conocida a lo largo del semestre para así desplegarla para su uso, en este caso se utilizaron dos herramientas:
- Docker Desktop and Docker Hub
- GitHub


####¿De qué va?
Nuestro servicio está enfocado a las ventas online, pensamos en ofrecer al público una página de ventas la cual está inspirada en lo que se conoce en Estados Unidos como "Venta de Garaje", en donde los artículos vendidos son de segunda mano, pero claro aquí se piensa ofrecer estos productos, pero con un estándar de calidad adecuado para su venta, esto conjunto a que el usuario puede revisar varias categorías y de ahí proceder a llenar su carrito de compras.
- Para el desarrollo de esta aplicación usamos React, el cual trabaja conjunto a html, css y javascript para así proporcionar un trabajo más fluido.
- Para el despliegue como se verá a continuación y como se ha mencionado será mediante Docker.

####¿Como puedes desplegarlo?
Para desplegar nuestra aplicación tenemos dos formas:
#####Forma 1
Para esta forma puedes descargar el repositorio completo, descomprimes los archivos y de ahí en tu Visual Studio Code realizas los siguientes comandos:
######Contruir Imagen
- docker build -t [nombre_imagen]

######Ver Imagen Creada
- docker image ls

######Correr Imagen
- docker run -d -p 3000:3000 [nombre_imagen]

#####Forma 2
Esta forma la consideramos un poco más simple ya que no es necesario construir la imagen, sino que puedes agregarla a tu Docker Desktop mediante lo siguiente:
######Descargar Imagen
- docker pull aaravos/reactshop

######Correr Imagen
- docker run -d -p 3000:3000 aaravos/reactshop

######Ver Imagen
- [Docker Hub](https://hub.docker.com/r/aaravos/reactshop)

####Resultado
Para consultar el servicio puedes ingresar a la dirección http://localhost:3000 de tu ordenador y así observar la página.