/*
 Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
 Version: 2.1.0
 Author: Sean Ngu
 Website: http://www.seantheme.com/color-admin-v2.1/admin/html/
 */
var handleBootstrapWizardsValidation = function () {
    "use strict";
    $("#wizard").bwizard({
        backBtnText: '上一步',
        nextBtnText: '下一步',
        validating: function (e, t) {
            if (t.index == 0) {
                if (false === $('form[name="form-wizard"]').parsley().validate("wizard-step-1")) {
                    return false;
                }
            } else if (t.index == 1) {
                if (false === $('form[name="form-wizard"]').parsley().validate("wizard-step-2")) {
                    return false;
                }
            } else if (t.index == 2) {
                if (false === $('form[name="form-wizard"]').parsley().validate("wizard-step-3")) {
                    return false;
                }
            }
        }
    })
};
var FormWizardValidation = function () {
    "use strict";
    return {
        init: function () {
            handleBootstrapWizardsValidation();
        }
    };
}();


