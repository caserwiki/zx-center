
import Helper from './Grid/Helper'
import Tree from './Grid/Tree'
import Orderable from './Grid/Orderable'
import AsyncTable from './Grid/AsyncTable'

(function (w, $) {
    let Zx = w.Zx,
        h = new Helper();

    // 树形表格
    Zx.grid.Tree = function (opts) {
        return new Tree(h, opts);
    };

    // 列表行可排序
    Zx.grid.Orderable = function (opts) {
        return new Orderable(h, opts);
    };

    // 异步表格
    Zx.grid.AsyncTable =function (opts) {
        return new AsyncTable(opts);
    };
})(window, jQuery);