<?php

namespace Zx\Admin\Layout;

use Zx\Admin\Admin;
use Zx\Admin\Color;
use Illuminate\Support\Str;

class Asset
{
    /**
     * 别名.
     *
     * @var array
     */
    protected $alias = [
        // Zx Center静态资源路径别名
        '@admin' => 'vendor/zx-center',
        // Zx Center扩展静态资源路径别名
        '@extension' => 'vendor/zx-center-extensions',

        '@adminlte' => [
            'js' => [
                '@admin/adminlte/adminlte.js',
            ],
            'css' => [
                '@admin/adminlte/adminlte.css',
            ],
        ],
        '@nunito' => [
            //'css' => 'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i',
            'css' => '@admin/zx/css/nunito.css',
        ],
        '@zx' => [
            'js'  => '@admin/zx/js/zx-app.js',
            'css' => '@admin/zx/css/zx-app.css',
        ],
        '@vendors' => [
            'js'  => '@admin/zx/plugins/vendors.min.js',
            'css' => '@admin/zx/plugins/vendors.min.css',
        ],
        '@jquery.initialize' => [
            'js' => '@admin/zx/plugins/jquery.initialize/jquery.initialize.min.js',
        ],
        '@datatables' => [
            'css' => '@admin/zx/plugins/tables/datatable/datatables.min.css',
        ],
        '@grid-extension' => [
            'js' => '@admin/zx/extra/grid-extend.js',
        ],
        '@resource-selector' => [
            'js' => '@admin/zx/extra/resource-selector.js',
        ],
        '@select-table' => [
            'js' => '@admin/zx/extra/select-table.js',
        ],
        '@layer' => [
            'js' => '@admin/zx/plugins/layer/layer.js',
        ],
        '@tinymce' => [
            'js' => '@admin/zx/plugins/tinymce/tinymce.min.js',
        ],
        '@pjax' => [
            'js' => '@admin/zx/plugins/jquery-pjax/jquery.pjax.min.js',
        ],
        '@toastr' => [
            'js'  => '@admin/zx/plugins/extensions/toastr.min.js',
            'css' => '@admin/zx/plugins/extensions/toastr.css',
        ],
        '@jquery.nestable' => [
            'js'  => '@admin/zx/plugins/nestable/jquery.nestable.min.js',
            'css' => '@admin/zx/plugins/nestable/nestable.css',
        ],
        '@validator' => [
            'js' => '@admin/zx/plugins/bootstrap-validator/validator.min.js',
        ],
        '@select2' => [
            'js'  => [
                '@admin/zx/plugins/select/select2.full.min.js',
                '@admin/zx/plugins/select/i18n/{lang}.js',
            ],
            'css' => '@admin/zx/plugins/select/select2.min.css',
        ],
        '@bootstrap-datetimepicker' => [
            'js'  => '@admin/zx/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js',
            'css' => '@admin/zx/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css',
        ],
        '@moment' => [
            'js' => [
                '@admin/zx/plugins/moment/moment-with-locales.min.js',
            ],
        ],
        '@moment-timezone' => [
            'js' => [
                '@admin/zx/plugins/moment-timezone/moment-timezone-with-data.min.js',
            ],
        ],
        '@jstree' => [
            'js'  => '@admin/zx/plugins/jstree-theme/jstree.min.js',
            'css' => '@admin/zx/plugins/jstree-theme/themes/proton/style.min.css',
        ],
        '@switchery' => [
            'js'  => '@admin/zx/plugins/switchery/switchery.min.js',
            'css' => '@admin/zx/plugins/switchery/switchery.min.css',
        ],
        '@webuploader' => [
            'js' => [
                '@admin/zx/plugins/webuploader/webuploader.min.js',
                '@admin/zx/extra/upload.js',
            ],
            'css' => '@admin/zx/extra/upload.css',
        ],
        '@chartjs' => [
            'js' => '@admin/zx/plugins/chart.js/chart.bundle.min.js',
        ],
        '@jquery.sparkline' => [
            'js' => '@admin/zx/plugins/jquery.sparkline/jquery.sparkline.min.js',
        ],
        '@jquery.bootstrap-duallistbox' => [
            'js'  => '@admin/zx/plugins/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js',
            'css' => '@admin/zx/plugins/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css',
        ],
        '@number-input' => [
            'js' => '@admin/zx/plugins/number-input/bootstrap-number-input.js',
        ],
        '@ionslider' => [
            'js' => [
                '@admin/zx/plugins/ionslider/ion.rangeSlider.min.js',
            ],
            'css' => [
                '@admin/zx/plugins/ionslider/ion.rangeSlider.css',
                '@admin/zx/plugins/ionslider/ion.rangeSlider.skinNice.css',
            ],
        ],
        '@editor-md' => [
            'js' => [
                '@admin/zx/plugins/editor-md/lib/raphael.min.js',
                '@admin/zx/plugins/editor-md/lib/marked.min.js',
                '@admin/zx/plugins/editor-md/lib/prettify.min.js',
                '@admin/zx/plugins/editor-md/lib/underscore.min.js',
                '@admin/zx/plugins/editor-md/lib/sequence-diagram.min.js',
                '@admin/zx/plugins/editor-md/lib/flowchart.min.js',
                '@admin/zx/plugins/editor-md/lib/jquery.flowchart.min.js',
                '@admin/zx/plugins/editor-md/editormd.min.js',
            ],
            'css' => [
                '@admin/zx/plugins/editor-md/css/editormd.preview.min.css',
                '@admin/zx/extra/markdown.css',
            ],
        ],
        '@editor-md-form' => [
            'js' => [
                '@admin/zx/plugins/editor-md/lib/raphael.min.js',
                '@admin/zx/plugins/editor-md/editormd.min.js',
            ],
            'css' => [
                '@admin/zx/plugins/editor-md/css/editormd.min.css',
            ],
        ],
        '@jquery.inputmask' => [
            'js' => '@admin/zx/plugins/input-mask/jquery.inputmask.bundle.min.js',
        ],
        '@apex-charts' => [
            'js' => '@admin/zx/plugins/charts/apexcharts.min.js',
        ],
        '@fontawesome-iconpicker' => [
            'js' => '@admin/zx/plugins/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js',
            'css' => '@admin/zx/plugins/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css',
        ],
        '@color' => [
            'js' => '@admin/zx/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
            'css' => '@admin/zx/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
        ],
        '@qrcode' => [
            'js' => '@admin/zx/plugins/jquery-qrcode/dist/jquery-qrcode.min.js',
        ],
        '@sortable' => [
            'js' => '@admin/zx/plugins/sortable/Sortable.min.js',
        ],
        '@autocomplete' => [
            'js' => '@admin/zx/plugins/autocomplete/jquery.autocomplete.min.js',
        ],
    ];

    /**
     * js代码.
     *
     * @var array
     */
    public $script = [];

    /**
     * @var array
     */
    public $directScript = [];

    /**
     * css代码.
     *
     * @var array
     */
    public $style = [];

    /**
     * css脚本路径.
     *
     * @var array
     */
    public $css = [];

    /**
     * js脚本路径.
     *
     * @var array
     */
    public $js = [];

    /**
     * 在head标签内加载的js脚本.
     *
     * @var array
     */
    public $headerJs = [
        'vendors' => '@vendors',
        'zx'    => '@zx',
    ];

    /**
     * 基础css.
     *
     * @var array
     */
    public $baseCss = [
        'adminlte'    => '@adminlte',
        'vendors'     => '@vendors',
        'toastr'      => '@toastr',
        'datatables'  => '@datatables',
        'zx'        => '@zx',
    ];

    /**
     * 基础js.
     *
     * @var array
     */
    public $baseJs = [
        'adminlte'  => '@adminlte',
        'toastr'    => '@toastr',
        'pjax'      => '@pjax',
        'validator' => '@validator',
        'layer'     => '@layer',
        'init'      => '@jquery.initialize',
    ];

    /**
     * @var array
     */
    public $fonts = [
        '@nunito',
    ];

    /**
     * 初始化主题样式.
     */
    protected function setUpTheme()
    {
        $color = Admin::color()->getName();

        if ($color === Color::DEFAULT_COLOR) {
            return;
        }

        $alias = [
            '@adminlte',
            '@zx',
        ];

        foreach ($alias as $n) {
            $before = (array) $this->alias[$n]['css'];

            $this->alias[$n]['css'] = [];

            foreach ($before as $css) {
                $this->alias[$n]['css'][] = str_replace('.css', "-{$color}.css", $css);
            }
        }
    }

    /**
     * 设置或获取别名.
     *
     * @param  string|array  $name
     * @param  string|array  $value
     * @return void|array
     */
    public function alias($name, $value = null)
    {
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                $this->alias($key, $value);
            }

            return;
        }

        if ($value === null) {
            return $this->getAlias($name);
        }

        if (mb_strpos($name, '@') !== 0) {
            $name = '@'.$name;
        }

        $this->alias[$name] = $value;
    }

    /**
     * 获取别名.
     *
     * @param  string  $name
     * @param  array  $params
     * @return array|string
     */
    public function getAlias($name, array $params = [])
    {
        if (mb_strpos($name, '@') !== 0) {
            $name = '@'.$name;
        }

        [$name, $query] = $this->parseParams($name);

        $assets = $this->alias[$name] ?? [];

        // 路径别名
        if (is_string($assets)) {
            return $assets;
        }

        $params += $query;

        return [
            'js' => $this->normalizeAliasPaths($assets['js'] ?? [], $params) ?: null,
            'css' => $this->normalizeAliasPaths($assets['css'] ?? [], $params) ?: null,
        ];
    }

    /**
     * @param  array  $files
     * @param  array  $params
     * @return array
     */
    protected function normalizeAliasPaths($files, array $params)
    {
        $files = (array) $files;

        foreach ($files as &$file) {
            foreach ($params as $k => $v) {
                if ($v !== '' && $v !== null) {
                    $file = str_replace("{{$k}}", $v, $file);
                }
            }
        }

        return array_filter($files, function ($file) {
            return ! mb_strpos($file, '{');
        });
    }

    /**
     * 解析参数.
     *
     * @param  string  $name
     * @return array
     */
    protected function parseParams($name)
    {
        $name = explode('?', $name);

        if (empty($name[1])) {
            return [$name[0], []];
        }

        parse_str($name[1], $params);

        return [$name[0], $params];
    }

    /**
     * 根据别名设置需要载入的js和css脚本.
     *
     * @param  string|array  $alias
     * @param  array  $params
     * @return void
     */
    public function require($alias, array $params = [])
    {
        if (is_array($alias)) {
            foreach ($alias as $v) {
                $this->require($v, $params);
            }

            return;
        }

        $assets = $this->getAlias($alias, $params);

        $this->js($assets['js']);
        $this->css($assets['css']);
    }

    /**
     * 设置需要载入的css脚本.
     *
     * @param  string|array  $css
     */
    public function css($css)
    {
        if (! $css) {
            return;
        }
        $this->css = array_merge(
            $this->css,
            (array) $css
        );
    }

    /**
     * 设置需要载入的基础css脚本.
     *
     * @param  array  $css
     */
    public function baseCss(array $css, bool $merge = false)
    {
        if ($merge) {
            $this->baseCss = array_merge($this->baseCss, $css);
        } else {
            $this->baseCss = $css;
        }
    }

    /**
     * 设置需要载入的js脚本.
     *
     * @param  string|array  $js
     */
    public function js($js)
    {
        if (! $js) {
            return;
        }
        $this->js = array_merge(
            $this->js,
            (array) $js
        );
    }

    /**
     * 根据别名获取资源路径.
     *
     * @param  string  $path
     * @param  string  $type
     * @return string|array|null
     */
    public function get($path, string $type = 'js')
    {
        if (empty($this->alias[$path])) {
            return $this->url($path);
        }

        $paths = isset($this->alias[$path][$type]) ? (array) $this->alias[$path][$type] : null;

        if (! $paths) {
            return $paths;
        }

        foreach ($paths as &$value) {
            $value = $this->url($value);
        }

        return $paths;
    }

    /**
     * 获取静态资源完整URL.
     *
     * @param  string  $path
     * @return string
     */
    public function url($path)
    {
        if (! $path) {
            return $path;
        }

        $path = $this->getRealPath($path);

        if (mb_strpos($path, '//') === false) {
            $path = config('admin.assets_server').'/'.trim($path, '/');
        }

        return (config('admin.https') || config('admin.secure')) ? secure_asset($path) : asset($path);
    }

    /**
     * 获取真实路径.
     *
     * @param  string|null  $path
     * @return string|null
     */
    public function getRealPath(?string $path)
    {
        if (! $this->containsAlias($path)) {
            return $path;
        }

        return implode(
            '/',
            array_map(
                function ($v) {
                    if (! $this->isPathAlias($v)) {
                        return $v;
                    }

                    return $this->getRealPath($this->alias($v));
                },
                explode('/', $path)
            )
        );
    }

    /**
     * 判断是否是路径别名.
     *
     * @param  mixed  $value
     * @return bool
     */
    public function isPathAlias($value)
    {
        return $this->hasAlias($value) && is_string($this->alias[$value]);
    }

    /**
     * 判断别名是否存在.
     *
     * @param  $value
     * @return bool
     */
    public function hasAlias($value)
    {
        return isset($this->alias[$value]);
    }

    /**
     * 判断是否含有别名.
     *
     * @param  string  $value
     * @return bool
     */
    protected function containsAlias($value)
    {
        return $value && mb_strpos($value, '@') === 0;
    }

    /**
     * 设置在head标签内加载的js.
     *
     * @param  string|array  $js
     */
    public function headerJs($js, bool $merge = true)
    {
        if ($merge) {
            $this->headerJs = $js ? array_merge($this->headerJs, (array) $js) : $this->headerJs;
        } else {
            $this->headerJs = (array) $js;
        }
    }

    /**
     * 设置基础js脚本.
     *
     * @param  array  $js
     * @param  bool  $merge
     */
    public function baseJs(array $js, bool $merge = true)
    {
        if ($merge) {
            $this->baseJs = array_merge($this->baseJs, $js);
        } else {
            $this->baseJs = $js;
        }
    }

    /**
     * 设置js代码.
     *
     * @param  string|array  $script
     * @param  bool  $direct
     */
    public function script($script, bool $direct = false)
    {
        if (! $script) {
            return;
        }
        if ($direct) {
            $this->directScript = array_merge($this->directScript, (array) $script);
        } else {
            $this->script = array_merge($this->script, (array) $script);
        }
    }

    /**
     * 设置css代码.
     *
     * @param  string  $style
     */
    public function style($style)
    {
        if (! $style) {
            return;
        }
        $this->style = array_merge($this->style, (array) $style);
    }

    /**
     * 字体css脚本路径.
     */
    protected function addFontCss()
    {
        $this->fonts && ($this->baseCss = array_merge(
            $this->baseCss,
            (array) $this->fonts
        ));
    }

    protected function isPjax()
    {
        return request()->pjax();
    }

    /**
     * 合并基础css脚本.
     */
    protected function mergeBaseCss()
    {
        if ($this->isPjax()) {
            return;
        }

        $this->addFontCss();

        $this->css = array_merge($this->baseCss, $this->css);
    }

    /**
     * @return string
     */
    public function cssToHtml()
    {
        $this->setUpTheme();

        $this->mergeBaseCss();

        $html = '';

        foreach (array_unique($this->css) as &$v) {
            if (! $paths = $this->get($v, 'css')) {
                continue;
            }

            foreach ((array) $paths as $path) {
                $html .= "<link rel=\"stylesheet\" href=\"{$this->withVersionQuery($path)}\">";
            }
        }

        return $html;
    }

    /**
     * @param  string  $url
     * @return string
     */
    public function withVersionQuery($url)
    {
        if (! Str::contains($url, '?')) {
            $url .= '?';
        }

        $ver = 'v'.Admin::VERSION;

        return Str::endsWith($url, '?') ? $url.$ver : $url.'&'.$ver;
    }

    /**
     * 合并基础js脚本.
     */
    protected function mergeBaseJs()
    {
        if ($this->isPjax()) {
            return;
        }

        $this->js = array_merge($this->baseJs, $this->js);
    }

    /**
     * @return string
     */
    public function jsToHtml()
    {
        $this->mergeBaseJs();

        $html = '';

        foreach (array_unique($this->js) as &$v) {
            if (! $paths = $this->get($v, 'js')) {
                continue;
            }

            foreach ((array) $paths as $path) {
                $html .= "<script src=\"{$this->withVersionQuery($path)}\"></script>";
            }
        }

        return $html;
    }

    /**
     * @return string
     */
    public function headerJsToHtml()
    {
        $html = '';

        foreach (array_unique($this->headerJs) as &$v) {
            if (! $paths = $this->get($v, 'js')) {
                continue;
            }

            foreach ((array) $paths as $path) {
                $html .= "<script src=\"{$this->withVersionQuery($path)}\"></script>";
            }
        }

        return $html;
    }

    /**
     * @return string
     */
    public function scriptToHtml()
    {
        $script = implode(";\n", array_unique($this->script));
        $directScript = implode(";\n", array_unique($this->directScript));

        return <<<HTML
<script data-exec-on-popstate>
(function () {
    try {
        {$directScript}
    } catch (e) {
        console.error(e)
    }
})();
Zx.ready(function () {
    try {
        {$script}
    } catch (e) {
        console.error(e)
    }
})
</script>
HTML;
    }

    /**
     * @return string
     */
    public function styleToHtml()
    {
        $style = implode('', array_unique($this->style));

        return "<style>$style</style>";
    }
}
