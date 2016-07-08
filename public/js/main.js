require.config({//第一块，配置
    baseUrl: '/public/js',
    paths: {
        jquery: './jquery/jquery-2.1.1',
        avalon: "./avalon/avalon.shim",//必须修改源码，禁用自带加载器，或直接删提AMD加载器模块
        text: './require/text',
        domReady: './require/domReady',
        css: './require/css.js'
    },
    priority: ['text', 'css'],
    shim: {
        jquery: {
            exports: "jQuery"
        },
        avalon: {
            exports: "avalon.shim"
        }
    }
});

require(['avalon', "domReady!"], function() {


});
