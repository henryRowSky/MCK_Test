# MCK Backend Developer

***

## Laravel INEGI

***

### Utilizar:
* Laravel
* Bootstrap
* mySQL

### Instrucciones:
1. [Consumir el siguiente servicio:](#paso1)
    * [INEGI](https://gaia.inegi.org.mx/wscatgeo/mgee/) 
2. [Guardar la información de los 32 estados en una base de datos:](#paso2)
3. [Mostrar los estados en un listado, posiblemente usando datatables.net](#paso3)
4. [Al dar click en un estado del listado, abrir a formulario con información del estado seleccionado, mostrando únicamente los primeros 5 campos del estado](#paso4)

***

## Solución:

***

### <a name="paso1">Consumir el servicio de INEGI</a>:

Para utilizar el servicio de INEGI y poder guardarlo en la base de datos, debemos consumir el servicio y traerlo por un seeder como se muestra a continuación:

Crear InegiSeeder:
![Alt text](my-project/storage/app/public/images/InegiSeeder.png?raw=true "Consumir el servicio de INEGI")


### <a name="paso2">Crear Modelo</a>:

A continuación  necesitamos crear un modelo para agregar lo que trajimos del servicio a la Base de datos.

![Alt text](my-project/storage/app/public/images/inegiModel.png?raw=true "Crear modelo")

Verificamos la migración del servicio a la base de datos:

![Alt text](my-project/storage/app/public/images/inegiMigration.png?raw=true "Migración")


### <a name="paso3">Datatables</a>:
Modificamos welcome.blade.php para agregar datatables.
Pero necesitaremos agregar un controlador para indexarlo, Aquí tambien agregaremos un boton que nos ayudara a visualizar los datos en un modal.

Controlador:
![Alt text](my-project/storage/app/public/images/inegiController.png?raw=true "Controlador con boton de acción")

Se agrega la siguiente ruta a "routes/web.php"
```
Route::get('/inegi', [App\Http\Controllers\InegiController::class, 'index'])->name('inegi.index');
```

El resultado:
![Alt text](my-project/storage/app/public/images/datatables.png?raw=true "Datatables")


### <a name="paso4">Modal</a>:

Para desplegar la información la agregó dentro de un "data-value" en formato json. Para posteriormente mandarla a un formulario.

Resultado:

![Alt text](my-project/storage/app/public/images/modal.png?raw=true "Listar tarjetas del usuario")



***
