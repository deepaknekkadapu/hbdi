#!/bin/bash
while true; do
    inotifywait -r projects && sshpass -p "12wq!@WQ" scp -r projects inbounddata@192.168.60.110:/opt/inbox/
done
