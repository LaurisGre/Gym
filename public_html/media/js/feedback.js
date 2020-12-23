'use strict';

const endpoints = {
    get: '/api/feedback/get',
    create: '/api/feedback/create',
};

/**
 * This defines how JS code selects elements by ID
 */
const selectors = {
    table: 'feedback-table',
    forms: {
        create: 'feedback-form',
    },
}

/**
 * Executes API request
 * @param {type} url Endpoint URL
 * @param {type} formData instance of FormData
 * @param {type} success Success callback
 * @param {type} fail Fail callback
 * @returns {undefined}
 */
function api(url, formData, success, fail) {
    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => response.json())
        .then(obj => {
            if (obj.status === 'success') {
                success(obj.data);
            } else {
                fail(obj.errors);
            }
        })
        .catch(e => {
            if (e.toString() == 'SyntaxError: Unexpected token < in JSON at position 0') {
                fail(['Problem is with your API controller, did not return JSON! Check Chrome->Network->XHR->Response']);
            } else {
                fail([e.toString()]);
            }
        });
}

/**
 * Table n stuff
 */
const table = {
    getElement: function () {
        return document.getElementById(selectors.table);
    },
    init: function () {
        if (this.getElement()) {
            this.data.load();

            return true;
        }
        return false;
    },
    data: {
        load: function () {
            console.log('Orders Table: Fetching data...');
            api(endpoints.get, null, this.success, this.fail);
        },
        success: function (data) {
            Object.keys(data).forEach(index => {
                table.row.append(data[index]);
            });
        },
        fail: function (errors) {
            console.log(errors);
        }
    },
    row: {
        create: function (data) {
            let row = document.createElement('tr');

            if (data.id === null) {
                throw Error('Cannot create row no ID given...');
            }

            row.setAttribute('data-id', data.id);
            row.className = 'data-row';

            Object.keys(data).forEach(data_id => {
                let td = document.createElement('td');
                td.innerHTML = data[data_id];
                td.className = data_id;
                row.append(td);
            })

            return row;
        },
        append: function (data) {
            console.log('Adding row', data);
            table.getElement().append(this.create(data));
        },
    },
};

const forms = {
    create: {
        init: function () {
            if (this.getElement()) {
                this.getElement().addEventListener('submit', this.onSubmitListener);

                return true;
            }

            return false;
        },
        getElement: function () {
            return document.getElementById(selectors.forms.create);
        },
        onSubmitListener: function (e) {
            e.preventDefault();
            let formData = new FormData(e.target);
            formData.append('action', 'create');
            api(endpoints.create, formData, forms.create.success, forms.create.fail);
        },
        success: function (data) {
            const element = forms.create.getElement();
            console.log(data);

            table.row.append(data);
            forms.ui.errors.hide(element);
            forms.ui.clear(element);
            forms.ui.flash.class(element, 'success');
        },
        fail: function (errors) {
            forms.ui.errors.show(forms.create.getElement(), errors);
        },
    },
    ui: {
        init: function () {
            // Function has to exist
            // since we're calling init() for
            // all elements withing forms object
            return true;
        },
        /**
         * Fills form fields with data
         * Each data index corelates with input name attribute
         *
         * @param {Element} form
         * @param {Object} data
         */
        fill: function (form, data) {
            console.log('Filling form fields with:', data);
            form.setAttribute('data-id', data.id);

            Object.keys(data).forEach(data_id => {
                if (form[data_id]) {
                    const input = form.querySelector('input[name="' + data_id + '"]');
                    if (input) {
                        input.value = data[data_id];
                    } else {
                        console.log('Could not fill field ' + data_id + 'because it wasn`t found in form');
                    }
                }
            });
        },
        clear: function (form) {
            let fields = form.querySelectorAll('[name]')
            fields.forEach(field => {
                field.value = '';
            });
        },
        flash: {
            class: function (element, class_name) {
                const prev = element.className;

                element.className += class_name;
                setTimeout(function () {
                    element.className = prev;
                }, 1000);
            }
        },
        /**
         * Form-error related functionality
         */
        errors: {
            /**
             * Shows errors in form
             * Each error index correlates with input name attribute
             *
             * @param {Element} form
             * @param {Object} errors
             */
            show: function (form, errors) {
                this.hide(form);

                console.log('Form errors received', errors);

                Object.keys(errors).forEach(function (error_id) {
                    const field = form.querySelector('input[name="' + error_id + '"]');
                    if (field) {
                        const span = document.createElement("span");
                        span.className = 'field-error';
                        span.innerHTML = errors[error_id];
                        field.parentNode.append(span);

                        console.log('Form error in field: ' + error_id + ':' + errors[error_id]);
                    }
                });
            },
            /**
             * Hides (destroys) all errors in form
             * @param {type} form
             */
            hide: function (form) {
                const errors = form.querySelectorAll('.field-error');
                if (errors) {
                    errors.forEach(node => {
                        node.remove();
                    });
                }
            }
        }
    }

}

/**
 * Core page functionality
 */
const app = {
    init: function () {
        Object.keys(forms).forEach(formId => {
            let success = forms[formId].init();
            console.log('Initializing form "' + formId + '": ' + (success ? 'SUCCESS' : 'FAIL'));
        });

        console.log('Initializing table...');
        let success = table.init();
        console.log('Table: Initialization: ' + (success ? 'PASS' : 'FAIL'));
    }
};

// Launch App
app.init();