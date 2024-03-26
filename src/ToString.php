<?php

namespace kbATeam\ByteDebug;

/**
 * Class ToString
 * @package kbATeam\ByteDebug
 */
class ToString
{
    /**
     * Convert a boolean value to a string representation.
     * @param bool $value
     * @return string
     */
    public static function fromBoolean(bool $value):string
    {
        if ($value === false) {
            return 'false';
        }
        return 'true';
    }

    /**
     * Convert the int representation of a byte to a string.
     * In case of non-printable characters (<32, 127) the hexadecimal
     * representation is returned.
     * @param int $byte
     * @return string
     */
    public static function fromByte(int $byte): string
    {
        if ($byte > 31 && $byte < 127) {
            return chr($byte);
        }
        return sprintf("x%'.02X", $byte);
    }

    /**
     * Convert all characters of a string to printable characters. In case of
     * non-printable characters they are replaced by their hexadecimal
     * representation.
     * @param string $string
     * @return string
     */
    public static function fromString(string $string):string
    {
        /**
         * Convert string to its byte array and process each byte.
         */
        $bytes = unpack('C*', $string);
        $result = '';
        if (is_array($bytes)) {
            foreach ($bytes as $byte) {
                $result .= self::fromByte($byte);
            }
        }
        return $result;
    }

    /**
     * Convert any value to a readable string.
     * @param mixed $value
     * @return string
     */
    public static function fromAny($value):string
    {
        if (is_bool($value)) {
            return self::fromBoolean($value);
        }
        if (is_int($value) || is_float($value)) {
            return (string)$value;
        }
        if (is_string($value)) {
            return self::fromString($value);
        }
        return gettype($value);
    }
}
