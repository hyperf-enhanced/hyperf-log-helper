<?php

namespace hyperf\Pro\LogHelper\Kernel;


use Exception;
use Hyperf\Context\ApplicationContext;
use Hyperf\Logger\LoggerFactory;
use Psr\Log\LoggerInterface;

/**
 * @method static string emergency(string $message, array $context = []);
 * @method static string alert(string $message, array $context = []);
 * @method static string critical(string $message, array $context = []);
 * @method static string error(string $message, array $context = []);
 * @method static string warning(string $message, array $context = []);
 * @method static string notice(string $message, array $context = []);
 * @method static string info(string $message, array $context = []);
 * @method static string debug(string $message, array $context = []);
 * @method static string log(string $message, array $context = []);
 */
class Log
{
    protected static $name = 'hyperf';

    protected static $group = 'default';

    public static function __callStatic($name, $arguments)
    {
        $logger = self::get(self::getName(),self::getGroup());
        if (method_exists($logger, $name)) {
            return $logger->$name(...$arguments);
        }
        throw new Exception('方法不存在');
    }

    public static function get($name, $string): LoggerInterface
    {
        /** @var LoggerFactory $loggerFactory */
        $loggerFactory = ApplicationContext::getContainer()->get(LoggerFactory::class);
        return $loggerFactory->get($name, $string);
    }


    /**
     * @param string $name
     */
    public static function setName(string $name): void
    {
        self::$name = $name;
    }

    /**
     * @param string $group
     */
    public static function setGroup(string $group): void
    {
        self::$group = $group;
    }

}