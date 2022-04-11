<?php

namespace designpattern\singleton;

use Phello\HelloPhp\designpattern\singleton\King;
use PHPUnit\Framework\TestCase;
use ReflectionObject;
use ReflectionProperty;

class KingTest extends TestCase
{

    public function testSingleton()
    {
        $king1 = King::getInstance();
        $king2 = King::getInstance();

        var_dump($king1);
        var_dump($king2);

        $this->assertEquals($king1, $king2);
        $this->assertTrue($this->valuesAreIdentical($king1, $king2));
    }

    /**
     * 两个值比较
     * -- 完全相等
     * @param $v1
     * @param $v2
     * @return bool
     * @link * https://www.php.net/manual/zh/language.oop5.object-comparison.php
     */
    public function valuesAreIdentical($v1, $v2): bool
    {
        $type1 = gettype($v1);
        $type2 = gettype($v2);

        if ($type1 !== $type2) {
            return false;
        }

        switch (true) {
            case ($type1 === 'boolean' || $type1 === 'integer' || $type1 === 'double' || $type1 === 'string'):
                // Do strict comparison here.
                if ($v1 !== $v2) {
                    return false;
                }
                break;

            case ($type1 === 'array'):
                $bool = $this->arraysAreIdentical($v1, $v2);
                if ($bool === false) {
                    return false;
                }
                break;

            case 'object':
                $bool = $this->objectsAreIdentical($v1, $v2);
                if ($bool === false) {
                    return false;
                }
                break;

            case 'NULL':
                // Since both types were of type NULL, consider their "values" equal.
                break;

            case 'resource':
                // How to compare if at all?
                break;

            case 'unknown type':
                // How to compare if at all?
                break;
        } // end switch

        // All tests passed.
        return true;
    }

    public function objectsAreIdentical($o1, $o2): bool
    {
        // See if loose comparison passes.
        if ($o1 != $o2) {
            return false;
        }

        // Now do strict(er) comparison.
        $objReflection1 = new ReflectionObject($o1);
        $objReflection2 = new ReflectionObject($o2);

        $arrProperties1 = $objReflection1->getProperties(ReflectionProperty::IS_PUBLIC);
        $arrProperties2 = $objReflection2->getProperties(ReflectionProperty::IS_PUBLIC);

        $bool = $this->arraysAreIdentical($arrProperties1, $arrProperties2);
        if ($bool === false) {
            return false;
        }

        foreach ($arrProperties1 as $key => $propName) {
            $bool = $this->valuesAreIdentical($o1->$propName, $o2->$propName);
            if ($bool === false) {
                return false;
            }
        }

        // All tests passed.
        return true;
    }

    public function arraysAreIdentical(array $arr1, array $arr2): bool
    {
        $count = count($arr1);

        // Require that they have the same size.
        if (count($arr2) !== $count) {
            return false;
        }

        // Require that they have the same keys.
        $arrKeysInCommon = array_intersect_key($arr1, $arr2);
        if (count($arrKeysInCommon) !== $count) {
            return false;
        }

        // Require that their keys be in the same order.
        $arrKeys1 = array_keys($arr1);
        $arrKeys2 = array_keys($arr2);
        foreach ($arrKeys1 as $key => $val) {
            if ($val !== $arrKeys2[$key]) {
                return false;
            }
        }

        // They do have same keys and in same order.
        foreach ($arr1 as $key => $val) {
            $bool = $this->valuesAreIdentical($val, $arr2[$key]);
            if ($bool === false) {
                return false;
            }
        }

        // All tests passed.
        return true;
    }
}
