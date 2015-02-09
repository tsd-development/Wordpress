<?php
namespace NV;

/**
 * This class contains general PHP helper methods.
 */
class Php {

    /**
     * Detaches a specified item from an array and returns that item.
     *
     * @param array $array The array from which you want to detach an item (by reference).
     * @param mixed $key The key to detach and return.
     *
     * @return mixed Returns the key that was detached, or false if no key was found.
     */
    public static function array_detach( array &$array, $key ) {
        if ( ! array_key_exists($key, $array) ) {
            return false;
        }
        $value = $array[$key];
        unset( $array[$key] );
        return $value;
    }

    /**
     * Detaches a specified item from an array by value and returns that item.
     *
     * @param array $array The array from which you want to detach an item (by reference).
     * @param mixed $value The value to find, detach, and return.
     *
     * @return null
     */
    public static function array_detach_value( array &$array, $value ) {
        if ( ! $key = array_search($value, $array) ) {
            return false;
        }
        return self::array_detach($array, $key);
    }

    /**
     * Moves an item from one position in an array to another position in the array.
     *
     * @param $array
     * @param $old_index
     * @param $new_index
     *
     * @return mixed
     */
    function array_reorder($array, $old_index, $new_index) {
        array_splice(
            $array,
            $new_index,
            count($array),
            array_merge(
                array_splice($array, $old_index, 1),
                array_slice($array, $new_index, count($array))
            )
        );
        return $array;
    }

}