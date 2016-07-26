<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Responses/CatchPokemonResponse.php');

namespace POGOProtos\Networking\Responses {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;


  // enum POGOProtos.Networking.Responses.CatchPokemonResponse.CatchStatus
  abstract class CatchPokemonResponse_CatchStatus extends ProtobufEnum {
    const CATCH_ERROR = 0;
    const CATCH_SUCCESS = 1;
    const CATCH_ESCAPE = 2;
    const CATCH_FLEE = 3;
    const CATCH_MISSED = 4;

    public static $_values = array(
      0 => "CATCH_ERROR",
      1 => "CATCH_SUCCESS",
      2 => "CATCH_ESCAPE",
      3 => "CATCH_FLEE",
      4 => "CATCH_MISSED",
    );

    public static function isValid($value) {
      return array_key_exists($value, self::$_values);
    }

    public static function toString($value) {
      checkArgument(is_int($value), 'value must be a integer');
      if (array_key_exists($value, self::$_values))
        return self::$_values[$value];
      return 'UNKNOWN';
    }
  }

  // message POGOProtos.Networking.Responses.CatchPokemonResponse
  final class CatchPokemonResponse extends ProtobufMessage {

    private $_unknown;
    private $status = CatchPokemonResponse_CatchStatus::CATCH_ERROR; // optional .POGOProtos.Networking.Responses.CatchPokemonResponse.CatchStatus status = 1
    private $missPercent = 0; // optional double miss_percent = 2
    private $capturedPokemonId = 0; // optional fixed64 captured_pokemon_id = 3
    private $captureAward = null; // optional .POGOProtos.Data.Capture.CaptureAward capture_award = 4

    public function __construct($in = null, &$limit = PHP_INT_MAX) {
      parent::__construct($in, $limit);
    }

    public function read($fp, &$limit = PHP_INT_MAX) {
      $fp = ProtobufIO::toStream($fp, $limit);
      while(!feof($fp) && $limit > 0) {
        $tag = Protobuf::read_varint($fp, $limit);
        if ($tag === false) break;
        $wire  = $tag & 0x07;
        $field = $tag >> 3;
        switch($field) {
          case 1: // optional .POGOProtos.Networking.Responses.CatchPokemonResponse.CatchStatus status = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->status = $tmp;

            break;
          case 2: // optional double miss_percent = 2
            if($wire !== 1) {
              throw new \Exception("Incorrect wire format for field $field, expected: 1 got: $wire");
            }
            $tmp = Protobuf::read_double($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_double returned false');
            $this->missPercent = $tmp;

            break;
          case 3: // optional fixed64 captured_pokemon_id = 3
            if($wire !== 1) {
              throw new \Exception("Incorrect wire format for field $field, expected: 1 got: $wire");
            }
            $tmp = Protobuf::read_uint64($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_unint64 returned false');
            $this->capturedPokemonId = $tmp;

            break;
          case 4: // optional .POGOProtos.Data.Capture.CaptureAward capture_award = 4
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->captureAward = new \POGOProtos\Data\Capture\CaptureAward($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Capture\CaptureAward did not read the full length');

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->status !== CatchPokemonResponse_CatchStatus::CATCH_ERROR) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->status);
      }
      if ($this->missPercent !== 0) {
        fwrite($fp, "\x11", 1);
        Protobuf::write_double($fp, $this->missPercent);
      }
      if ($this->capturedPokemonId !== 0) {
        fwrite($fp, "\x19", 1);
        Protobuf::write_uint64($fp, $this->capturedPokemonId);
      }
      if ($this->captureAward !== null) {
        fwrite($fp, "\"", 1);
        Protobuf::write_varint($fp, $this->captureAward->size());
        $this->captureAward->write($fp);
      }
    }

    public function size() {
      $size = 0;
      if ($this->status !== CatchPokemonResponse_CatchStatus::CATCH_ERROR) {
        $size += 1 + Protobuf::size_varint($this->status);
      }
      if ($this->missPercent !== 0) {
        $size += 9;
      }
      if ($this->capturedPokemonId !== 0) {
        $size += 9;
      }
      if ($this->captureAward !== null) {
        $l = $this->captureAward->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearStatus() { $this->status = CatchPokemonResponse_CatchStatus::CATCH_ERROR; }
    public function getStatus() { return $this->status;}
    public function setStatus($value) { $this->status = $value; }

    public function clearMissPercent() { $this->missPercent = 0; }
    public function getMissPercent() { return $this->missPercent;}
    public function setMissPercent($value) { $this->missPercent = $value; }

    public function clearCapturedPokemonId() { $this->capturedPokemonId = 0; }
    public function getCapturedPokemonId() { return $this->capturedPokemonId;}
    public function setCapturedPokemonId($value) { $this->capturedPokemonId = $value; }

    public function clearCaptureAward() { $this->captureAward = null; }
    public function getCaptureAward() { return $this->captureAward;}
    public function setCaptureAward(\POGOProtos\Data\Capture\CaptureAward $value) { $this->captureAward = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('status', $this->status, CatchPokemonResponse_CatchStatus::CATCH_ERROR)
           . Protobuf::toString('miss_percent', $this->missPercent, 0)
           . Protobuf::toString('captured_pokemon_id', $this->capturedPokemonId, 0)
           . Protobuf::toString('capture_award', $this->captureAward, null);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Responses.CatchPokemonResponse)
  }

}