#!/bin/bash
kafka-server-start.sh $PATHKAFKACONFIG/server.properties \
  --override delete.topic.enable=true \
  #--override broker.id=100 \
  #--override log.dirs=/tmp/kafka-logs-100 \
  #--override port=9192
