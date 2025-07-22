#!/bin/bash

if [ $# -eq 0 ]
then
  echo "ERROR, NO HAS PUESTO NOMBRE EN LA CARPETA"
  exit 0
  else
  mkdir $1
  cd $1
  wget https://github.com/dhg/Skeleton/releases/download/2.0.4/Skeleton-2.0.4.zip
  unzip Skeleton-2.0.4.zip
  exit
fi


