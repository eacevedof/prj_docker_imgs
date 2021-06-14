#!/bin/bash
kafka-topics.sh --zookeeper kafka_zookeeper_1:2181 --delete --topic test
# zkCli.sh -server kafka_zookeeper_1:2181
