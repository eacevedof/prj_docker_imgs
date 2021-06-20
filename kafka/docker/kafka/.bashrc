export PATHBASH="$HOME/bash"
export PATHKAFKACONFIG="/opt/kafka/config"
export PATH=$PATH:$PATHBASH

alias show-version="$PATHBASH/version.sh"
alias consumer-test="$PATHBASH/consumer.sh"
alias producer-test="$PATHBASH/producer.sh"
alias show-config="$PATHBASH/show_config.sh"
alias topics="$PATHBASH/topics.sh"
alias enable-delete="$PATHBASH/enable-delete.sh"

# directorios
alias kafkaconfig="cd $PATHKAFKACONFIG"

function describe_topic_config {
    topic_name="$1"
    ./bin/kafka-configs.sh --describe --all \
      --bootstrap-server=0.0.0.0:9092 \
      --topic ${topic_name}
}
