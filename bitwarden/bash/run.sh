#!/bin/bash
curl -Lso bitwarden.sh https://go.btwrdn.co/bw-sh \
    && chmod +x /app/bash/bitwarden.sh
    
/app/bash/bitwarden.sh install
