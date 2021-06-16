<?php

namespace Zx\Admin\Widgets;

use Zx\Admin\Admin;
use Illuminate\Contracts\Support\Renderable;

class DarkModeSwitcher implements Renderable
{
    public $defaultDarkMode = false;

    public function __construct(?bool $defaultDarkMode = null)
    {
        $this->defaultDarkMode = is_null($defaultDarkMode) ? Admin::isDarkMode() : $defaultDarkMode;
    }

    public function render()
    {
        $icon = $this->defaultDarkMode ? 'icon-sun' : 'icon-moon';

        return <<<HTML
<ul class="nav navbar-nav float-right">
    <li class="dropdown dropdown-user nav-item">
        <a class="dropdown-toggle nav-link">
            <span class="dark-mode-switcher">
                <i class="feather {$icon}"></i>
            </span>
        </a>
    </li>
</ul>

<script>
Zx.darkMode.initSwitcher('.dark-mode-switcher');
</script>
HTML;
    }
}
