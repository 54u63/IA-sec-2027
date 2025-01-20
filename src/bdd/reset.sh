#!/bin/bash
echo "On reset les artefacts liés à Docker..."
sudo docker stop $(sudo docker ps -aq) && sudo docker rm $(sudo docker ps -aq)
sudo docker volume prune -f
sudo docker volume rm $(sudo docker volume ls -q)
sudo docker rmi $(sudo docker images -q) -f

