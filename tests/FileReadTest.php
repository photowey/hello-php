<?php

use PHPUnit\Framework\TestCase;

/**
 * {@code FileReadTest}
 *
 * @author photowey
 * @date 2022/04/20
 * @since 1.0.0
 */
class FileReadTest extends TestCase
{

    public const HEAD_SYMBOL = ")";
    public const TAIL_SYMBOL = "array (";

    /**
     * @throws Exception
     */
    public function testFileRead()
    {
        $path = 'tests/resources/server.txt';
        $file = fopen($path, 'r');
        $size = filesize($path);
        if (!$file) {
            throw new Exception("文件打开失败");
        }
        $contentArray = [];
        $block = [];
        while (false !== ($line = fgets($file, $size))) {
            $inner = preg_replace("/\r\n/i", "", trim($line));
            if (pends_with($inner, FileReadTest::TAIL_SYMBOL)) {
                $block = [];
                continue;
            }
            if (pstarts_with($inner, FileReadTest::HEAD_SYMBOL)) {
                $contentArray[] = array_merge(array(), $block);
                continue;
            }

            // 能到这儿 -> 表明读取的是正文
            $pattern = "/.*\'(.*)\' *=> *\'(.*)\'(.*)?$/i";
            $key = preg_replace($pattern, "$1", $inner);
            $value = preg_replace($pattern, "$2", $inner);
            $block[$key] = $value;
        }
        printafln($contentArray);

        fclose($file);
        $this->assertTrue(count($contentArray) > 0);
    }

}