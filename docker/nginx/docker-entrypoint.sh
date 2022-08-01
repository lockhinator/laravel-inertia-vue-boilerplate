#!/bin/bash

# do not fail fast
# failing fast causes us to not get back info if the curl
# request to check web availability fails
# set -e

function start_nginx {
    nginx -g "daemon off;"
}
export -f start_nginx

function start_vite {
    yarn dev
}
export -f start_vite

action=$1; shift

case $action in

  start_app)
    start_nginx
  ;;

  start_dev)
    start_vite
  ;;

  bash)
    exec env /bin/bash -il
  ;;

  exec)
    exec "$@"
  ;;

  *)
    echo "Invalid action: $action"
    exit 1
  ;;

esac