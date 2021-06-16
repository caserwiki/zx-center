const mix = require('laravel-mix');
require('dotenv').config();

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
const glob = require('glob')

let theme = null;

let distPath = mix.inProduction() ? 'resources/dist' : 'resources/pre-dist';

function mixAssetsDir(query, cb) {
  (glob.sync('resources/assets/' + query) || []).forEach(f => {
    f = f.replace(/[\\\/]+/g, '/');
    cb(f, f.replace('resources/assets', distPath));
  });
}

function themeCss(path) {
  let sf = theme ? '-'+theme : '';

  return `${distPath}/${path}${sf}.css`
}

function zxPath(path) {
  return 'resources/assets/zx/' + path;
}

function zxDistPath(path) {
  return distPath + '/zx/' + path;
}


/*
 |--------------------------------------------------------------------------
 | Zx Center assets
 |--------------------------------------------------------------------------
 */

mix.copyDirectory('resources/assets/images', distPath + '/images');
mix.copyDirectory('resources/assets/fonts', distPath + '/fonts');

// AdminLTE3.0
mix.sass('resources/assets/adminlte/scss/AdminLTE.scss', themeCss('adminlte/adminlte')).sourceMaps();
mix.js('resources/assets/adminlte/js/AdminLTE.js', distPath + '/adminlte/adminlte.js').sourceMaps();

// 复制第三方插件文件夹
mix.copyDirectory(zxPath('plugins'), zxDistPath('plugins'));
// 打包app.js
mix.js(zxPath('js/zx-app.js'), zxDistPath('js/zx-app.js')).sourceMaps();
// 打包app.scss
mix.sass(zxPath('sass/zx-app.scss'), themeCss('zx/css/zx-app')).sourceMaps();
mix.copy(zxPath('sass/nunito.css'), `${distPath}/zx/css/nunito.css`);

// 打包所有 extra 里面的所有js和css
mixAssetsDir('zx/extra/*.js', (src, dest) => mix.js(src, dest));
mixAssetsDir('zx/extra/*.scss', (src, dest) => mix.sass(src, dest.replace('scss', 'css')));
