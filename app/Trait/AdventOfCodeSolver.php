<?php

namespace App\Trait;

use ReflectionMethod;

trait AdventOfCodeSolver
{
    public static function getAnswer($part = 1)
    {
        $methodName = "part{$part}";
        if (!method_exists(self::class, "part{$part}")) {
            abort(404);
        }
        return self::$methodName();
    }

    public static function getSolution($part = 1)
    {
        $methodName = "part{$part}";
        if (!method_exists(self::class, "part{$part}")) {
            abort(404);
        }
        return self::getFunctionCode($methodName);
    }

    public static function getFunctionCode(string $functionName)
    {
        try {
            $className = get_called_class();
            $method = new ReflectionMethod($className, $functionName);

            $file = $method->getFileName();
            $startLine = $method->getStartLine();
            $endLine = $method->getEndLine();
            $lines = file($file);
            $codeLines = array_slice($lines, $startLine, $endLine - $startLine);
            $code = implode("", $codeLines);

            $code = preg_replace('/^[^{]*\{/', '', $code);
            $code = preg_replace('/\}\s*$/', '', $code);

            $code = trim($code);

            $lines = explode("\n", $code);
            $indentation = strlen($lines[1]) - strlen(ltrim($lines[1]));

            foreach ($lines as $index => $line) {
                if ($index > 0) {
                    $lines[$index] = substr($line, $indentation);
                }
            }
            $code = implode("\n", $lines);
            return $code;
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

}
