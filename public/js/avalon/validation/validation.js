﻿define([], function () {
    function showError(el, data) {
        var next = el.nextSibling
        if (!(next && next.className === "error-tip")) {
            next = document.createElement("div")
            next.className = "error-tip"
            el.parentNode.appendChild(next)
        }
        next.innerHTML = data.getMessage()
    };

    function removeError(el) {
        var next = el.nextSibling
        while (next) {
            if (next.className === "error-tip") {
                el.parentNode.removeChild(next)
                break
            }
            next = next.nextSibling
        }
        //var next = el.nextSibling.nextSibling;
        //if (next && next.className === "error-tip") {
        //    el.parentNode.removeChild(next)
        //}
    };

    var getValidationTpl = function () {
        return {
            onInit: function (v) {
                validationVM = v
            },
            onReset: function (e, data) {
                data.valueResetor && data.valueResetor()
                avalon(this).removeClass("error success")
                removeError(this)
            },
            onError: function (reasons) {
                reasons.forEach(function (reason) {
                    avalon(this).removeClass("success").addClass("error")
                    showError(this, reason)
                }, this)
            },
            onSuccess: function () {
                avalon(this).removeClass("error").addClass("success")
                removeError(this)
            },
            onValidateAll: function (reasons) {
                reasons.forEach(function (reason) {
                    avalon(reason.element).removeClass("success").addClass("error")
                    showError(reason.element, reason)
                })
                if (reasons.length === 0) {
                    avalon.log("全部验证成功！")
                }
            }
        };  
    };

    return {
        getValidationTpl: getValidationTpl
    };
});