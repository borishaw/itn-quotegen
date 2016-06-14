<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita58da89471ff1a00cf44575d63b79e39
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Respect\\Validation\\' => 19,
        ),
        'L' => 
        array (
            'League\\Csv\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Respect\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/respect/validation/library',
        ),
        'League\\Csv\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/csv/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static $classMap = array (
        'DB' => __DIR__ . '/..' . '/sergeytsalkov/meekrodb/db.class.php',
        'DBHelper' => __DIR__ . '/..' . '/sergeytsalkov/meekrodb/db.class.php',
        'DBTransaction' => __DIR__ . '/..' . '/sergeytsalkov/meekrodb/db.class.php',
        'MeekroDB' => __DIR__ . '/..' . '/sergeytsalkov/meekrodb/db.class.php',
        'MeekroDBEval' => __DIR__ . '/..' . '/sergeytsalkov/meekrodb/db.class.php',
        'MeekroDBException' => __DIR__ . '/..' . '/sergeytsalkov/meekrodb/db.class.php',
        'WhereClause' => __DIR__ . '/..' . '/sergeytsalkov/meekrodb/db.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita58da89471ff1a00cf44575d63b79e39::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita58da89471ff1a00cf44575d63b79e39::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita58da89471ff1a00cf44575d63b79e39::$prefixesPsr0;
            $loader->classMap = ComposerStaticInita58da89471ff1a00cf44575d63b79e39::$classMap;

        }, null, ClassLoader::class);
    }
}