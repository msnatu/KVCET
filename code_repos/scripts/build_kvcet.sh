#!/bin/bash
env="$1"
if [[ -z $env ]]
then
  echo "Usage : build_kvcet.sh env"
else
  DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
  cd $DIR
  START=$(date +%s)
  cd ..
  ./symfony doctrine:drop-db --no-confirmation --env=$env
  ./symfony doctrine:create-db --env=$env
  ./symfony doctrine:migrate --env=$env
  ./symfony doctrine:build --all-classes --env=$env
  ./symfony doctrine:data-load --env=$env --append
  END=$(date +%s)
  DIFF=$(( $END - $START ))
  echo "It took $DIFF seconds"
fi