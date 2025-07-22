# Bash Scripting
Angel Hesse Caracena
### **Introducción**
Este documento consistirá en la exposición de los pasos que he seguido para crear un script en Bash que cree una carpeta con el nombre que se le pasa como argumento. Dentro de decha carpeta se descarguen unos achivos de la web de [**_Skeleton_**](http://getskeleton.com/) y los descomprima.

### **Procedimiento**
Para empezar, he hecho la carpeta sobe la que trabajaré el script.

Ahora hago el scipt, el cual tiene la orden de, en caso de intoducir el nombre de la carpeta, la cree, vaya a su interior y descargue y descomprima el archivo previamente dicho. En caso de no introduci ningún nombre devolverá un error. De forma que quedará asi:

```
#!/bin/bash

if [ $# -eq 0 ]
then
  echo "ERROR, NO HAS PUESTO NOMBRE A TU CARPETA"
  exit 0
  else
  mkdir $1
  cd $1
  wget https://github.com/dhg/Skeleton/releases/download/2.0.4/Skeleton-2.0.4.zip
  unzip Skeleton-2.0.4.zip
  exit
fi
```

Una vez creado el script, abrimos un terminal de comandos y ponemos `sh makeweb.sh NombreCarpeta` para ejecutar el script con el nombre que queremos para nuestra carpeta.



Para comproba si ha funcionado correctamente ponemos en el teminal `cd NombeCarpeta -ls` y después `ls -l`, entonces podríamos ver si los archivos están en la carpeta.