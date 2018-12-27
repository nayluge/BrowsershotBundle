<?php
namespace Nayluge\BrowsershotBundle;

use Nayluge\BrowsershotBundle\DependencyInjection\NaylugeBrowsershotBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NaylugeBrowsershotBundle extends Bundle
{
    public function __construct()
    {
        $this->extension = new NaylugeBrowsershotBundleExtension();
    }
}
