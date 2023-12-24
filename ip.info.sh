#!/bin/bash

function ip.info () {
    echo -e "\n\e[4mIP Address (blank for your info):\e[0m "
    read -p "IP Address: " ip

    if [ -z "$ip" ]; then
        echo -ne "\n \033[01;33mInternal IP   \033[01;37m>\033[01;32m   ";   hostname -I | cut -d ' ' -f1
    else
        cd ~
        echo "$ip" &> "ip.info.txt"
    fi

    /usr/bin/php  "ip.info.php"

    if test -f "ip.info.txt"; then
        rm "ip.info.txt"
    fi
     
}
