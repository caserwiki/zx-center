!function(e){var t={};function n(i){if(t[i])return t[i].exports;var l=t[i]={i:i,l:!1,exports:{}};return e[i].call(l.exports,l,l.exports,n),l.l=!0,l.exports}n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var l in e)n.d(i,l,function(t){return e[t]}.bind(null,l));return i},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=10)}({10:function(e,t,n){e.exports=n(11)},11:function(e,t){!function(e){function t(e){e=$.extend({dialog:null,container:null,input:null,button:".submit-btn",cancel:".cancel-btn",table:".async-table",multiple:!1,max:0,values:[],lang:{exceed_max_item:Zx.lang.exceed_max_item||"已超出最大可选择的数量"}},e);this.options=e,this.$input=$(e.input),this.selected={},this.init()}t.prototype={init:function(){var e=this,t=e.options,n=t.values;for(var i in e.labels={},n)e.labels[n[i].id]=n[i].label;e.resetSelected(),$(document).on("dialog:shown",t.dialog,(function(){e.$dialog=$(t.dialog),e.$button=e.$dialog.find(t.button),e.$cancel=e.$dialog.find(t.cancel),e.$button.on("click",(function(){var t=e.getSelectedRows();e.setKeys(t[1]),e.render(t[0]),e.$dialog.trigger("dialog:close"),e.resetSelected()})),e.$cancel.on("click",(function(){e.$dialog.trigger("dialog:close")})),e.bind(),e.resetSelected()})),e.render(n)},bind:function(){var e=this,t=e.options;e.$dialog.find(t.table).on("table:loaded",(function(){var n=e.getCheckbox();t.multiple||$(this).find(".checkbox-grid-header").remove(),n.on("change",(function(){var i=$(this),l=i.data("id"),o=i.data("label");if(this.checked){if(t.multiple||(e.selected={}),e.selected[l]={id:l,label:o},t.max&&e.getSelectedRows()[0].length>t.max)return i.prop("checked",!1),delete e.selected[l],Zx.warning(e.options.lang.exceed_max_item)}else delete e.selected[l];t.multiple||this.checked&&n.each((function(){var e=$(this);e.data("id")!=l&&(e.prop("checked",!1),e.parents("tr").css("background-color",""))}))})),n.each((function(){var t=$(this),n=t.data("id");for(var i in e.labels[n]=t.data("label"),e.selected)n!=i||t.prop("checked",!0).trigger("change");t.trigger("change")}))}))},resetSelected:function(){var e=this.getKeys();for(var t in this.selected={},e)this.selected[e[t]]={id:e[t],label:this.labels[e[t]]}},getCheckbox:function(){return this.$dialog.find('.checkbox-grid-column input[type="checkbox"]')},getSelectedRows:function(){var e=[],t=[];for(var n in this.selected)this.selected[n]&&(t.push(n),e.push(this.selected[n]));return[e,t]},render:function(e){var t=this.options,n=$(t.container),i=n.find(".default-text"),l=n.find(".option");return e&&e.length?(i.addClass("d-none"),l.removeClass("d-none"),t.multiple?function(e,t,n){var i=[],l=$(n.container),o=l.find(".default-text"),a=l.find(".option");l.hasClass("select2")||l.addClass("select2 select2-container select2-container--default select2-container--below");for(var c in l.removeClass("form-control"),e)i.push('<li class="select2-selection__choice" >\n    '.concat(e[c].label,' <span data-id="').concat(e[c].id,'" class="select2-selection__choice__remove remove " role="presentation"> ×</span>\n</li>'));i.unshift('<span class="select2-selection__clear remove-all">×</span>'),i='<span class="select2-selection select2-selection--multiple">\n <ul class="select2-selection__rendered">'.concat(i.join(""),"</ul>\n </span>");var s=$(i);function r(){a.html(""),o.removeClass("d-none"),a.addClass("d-none"),l.addClass("form-control"),t.setKeys([])}a.html(s),s.find(".remove").on("click",(function(){var e=$(this);t.deleteKey(e.data("id")),e.parent().remove(),t.getKeys().length||r()})),s.find(".remove-all").on("click",r)}(e,this,t):function(e,t,n){var i=$(n.container),l=i.find(".default-text"),o=i.find(".option"),a=$("<div class='pull-right ' style='font-weight:bold;cursor:pointer'>×</div>");o.text(e[0].label),o.append(a),a.on("click",(function(){t.setKeys([]),l.removeClass("d-none"),o.addClass("d-none")}))}(e,this,t)):(i.removeClass("d-none"),l.addClass("d-none"),void(t.multiple&&n.addClass("form-control")))},setKeys:function(e){this.$input.val(e.length?e.join(","):"").trigger("change")},deleteKey:function(e){var t=this.getKeys(),n=[];for(var i in t)t[i]!=e&&n.push(t[i]);this.setKeys(n)},getKeys:function(){var e=this.$input.val();return e?String(e).split(","):[]}},Zx.grid.SelectTable=function(e){return new t(e)}}(window)}});
//# sourceMappingURL=select-table.js.map