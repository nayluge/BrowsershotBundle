<?php

namespace Nayluge\BrowsershotBundle\Service;

use Spatie\Browsershot\Browsershot;

class BrowsershotWrapper
{
    protected $browsershot;

    public function __construct(
        ?string $npmPath,
        ?string $nodePath,
        ?string $chromePath,
        ?bool $sandbox
    )
    {
        $this->browsershot = new Browsershot();

        if($nodePath) {
            $this->browsershot->setNpmBinary($npmPath);
        }

        if($nodePath) {
            $this->browsershot->setNodeBinary($nodePath);
        }

        if($chromePath) {
            $this->browsershot->setChromePath($chromePath);
        }

        if(!$sandbox) {
            $this->browsershot->noSandbox();
        }

    }

    public function __call($name, $arguments): Browsershot
    {
        $this->browsershot->$name(...$arguments);
        return $this->browsershot;

    }
}