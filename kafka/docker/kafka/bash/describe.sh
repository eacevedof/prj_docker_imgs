#!/bin/bash
# es una func sacada de aqui: https://www.baeldung.com/kafka-message-retention
#describe_topic_config "test" | awk 'BEGIN{IFS="=";IRS=" "} /^[ ]*retention.ms/{print $1}'
kafka-configs.sh --describe --all \
      --bootstrap-server=0.0.0.0:9092 \
      --topic ${topic_name}
