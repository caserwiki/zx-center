
/*=========================================================================================
  File Name: app.js
  Description: Zx Center JS脚本.
  ----------------------------------------------------------------------------------------
  Item Name: Zx Center
  Author: Jqh
  Author URL: https://github.com/caserwiki
==========================================================================================*/

import Zx from './Zx'

import NProgress from './NProgress/NProgress.min'
import Ajax from './extensions/Ajax'
import Toastr from './extensions/Toastr'
import SweetAlert2 from './extensions/SweetAlert2'
import RowSelector from './extensions/RowSelector'
import Grid from './extensions/Grid'
import Form from './extensions/Form'
import DialogForm from './extensions/DialogForm'
import Loading from './extensions/Loading'
import AssetsLoader from './extensions/AssetsLoader'
import Slider from './extensions/Slider'
import Color from './extensions/Color'
import Validator from './extensions/Validator'
import DarkMode from './extensions/DarkMode'

import Menu from './bootstrappers/Menu'
import Footer from './bootstrappers/Footer'
import Pjax from './bootstrappers/Pjax'
import DataActions from './bootstrappers/DataActions'

let win = window,
    $ = jQuery;

// 扩展Zx对象
function extend (Zx) {
    // ajax处理相关扩展函数
    new Ajax(Zx);
    // Toastr简化使用函数
    new Toastr(Zx);
    // SweetAlert2简化使用函数
    new SweetAlert2(Zx);
    // Grid相关功能函数
    new Grid(Zx);
    // loading效果
    new Loading(Zx);
    // 静态资源加载器
    new AssetsLoader(Zx);
    // 颜色管理
    new Color(Zx);
    // 表单验证器
    new Validator(Zx);
    // 黑色主题切换
    new DarkMode(Zx);

    // 加载进度条
    Zx.NP = NProgress;

    // 行选择器
    Zx.RowSelector = function (options) {
        return new RowSelector(options)
    };

    // ajax表单提交
    Zx.Form = function (options) {
        return new Form(options)
    };

    // 弹窗表单
    Zx.DialogForm = function (options) {
        return new DialogForm(Zx, options);
    };

    // 滑动面板
    Zx.Slider = function (options) {
        return new Slider(Zx, options)
    };
}

// 初始化
function listen(Zx) {
    // 只初始化一次
    Zx.booting(() => {
        Zx.NP.configure({parent: '.app-content'});

        // layer弹窗设置
        layer.config({maxmin: true, moveOut: true, shade: false});

        //////////////////////////////////////////////////////////

        // 菜单点击选中效果
        new Menu(Zx);
        // 返回顶部按钮
        new Footer(Zx);
        // data-action 动作绑定(包括删除、批量删除等操作)
        new DataActions(Zx);
    });

    // 每个请求都初始化
    Zx.bootingEveryRequest(() => {
        // ajax全局设置
        $.ajaxSetup({
            cache: true,
            error: Zx.handleAjaxError,
            headers: {
                'X-CSRF-TOKEN': Zx.token
            }
        });

        // pjax初始化功能
        new Pjax(Zx);
    });
}

function prepare(Zx) {
    extend(Zx);
    listen(Zx);

    return Zx;
}

/**
 * @returns {Zx}
 */
win.CreateZx = function(config) {
    return prepare(new Zx(config));
};
