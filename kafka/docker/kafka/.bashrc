export PATHBASH="$HOME/bash"
export PATHKAFKACONFIG="/opt/kafka/config"
export PATH=$PATH:$PATHBASH

alias consumer-test="$PATHBASH/consumer.sh"
alias producer-test="$PATHBASH/producer.sh"
alias show-config="$PATHBASH/show_config.sh"
alias topics="$PATHBASH/topics.sh"
alias enable-delete="$PATHBASH/enable-delete.sh"

# directorios
alias kafkaconfig="cd $PATHKAFKACONFIG"
