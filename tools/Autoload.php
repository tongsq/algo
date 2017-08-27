<?php
/**
 * @author tongsq
 * @since 2017/8/27
 * @desc autoloader register
 */
namespace algo;

class Autoload
{
    private $directory;
    private $prefix;
    private $prefixLength;
    /**
     * @param string $baseDirectory Base directory where the source files are located.
     */
    public function __construct($baseDirectory = __DIR__)
    {
        $this->directory = $baseDirectory;
        $this->prefix = __NAMESPACE__.'\\';
        $this->prefixLength = strlen($this->prefix);
    }

    public function register($prepend = false)
    {
        spl_autoload_register(array($this, 'autoload'), true, $prepend);
    }

    public function autoload($className)
    {
        if (0 === strpos($className, $this->prefix)) {
            $parts = explode('\\', substr($className, $this->prefixLength));
            $filepath = $this->directory.DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, $parts).'.php';
            if (is_file($filepath)) {
                require $filepath;
            }
        }
    }
}