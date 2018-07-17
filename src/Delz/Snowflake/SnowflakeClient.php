<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Delz\Snowflake {

  class SnowflakeClient extends \Grpc\BaseStub {

     // @param string $hostname hostname
     // @param array $opts channel options
     // @param \Grpc\Channel $channel (optional) re-use channel object
    public function __construct($hostname, $opts, $channel = null) {
      parent::__construct($hostname, $opts, $channel);
    }

     // 生成id
     // @param \Delz\Snowflake\SnowflakeRequest $argument input argument
     // @param array $metadata metadata
     // @param array $options call options
    public function Gen(\Delz\Snowflake\SnowflakeRequest $argument,
      $metadata = [], $options = []) {
      return $this->_simpleRequest('/delz.snowflake.Snowflake/Gen',
      $argument,
      ['\Delz\Snowflake\SnowflakeReply', 'decode'],
      $metadata, $options);
    }

  }

}
