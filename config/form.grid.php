<?php
/**
 * Created to work with bootstrap 3 css
 * Also with bootstrap form validator js
 *
 */
return [
    // customized default templates
    'inputContainer' => '<div class="form-group row has-feedback input {{type}}{{required}}">{{before}}{{content}}{{after}}<div class="help-block with-errors"></div></div>',
    'inputContainerError' => '<div class="input {{type}}{{required}} has-error">{{content}}{{error}}</div>',
    'formGroup' => '{{label}}<div class="col-sm-9">{{input}}{{error}}{{help}}</div>',
    'checkboxFormGroup' => '<div class="row"><div class="col-sm-3"></div><div class="col-sm-9">{{label}}{{help}}{{error}}</div></div>',
    'label' => '<label class="form-control-label col-sm-3" {{attrs}}>{{text}}</label>',
    'error' => '<div class="help-block with-errors">{{content}}</div>',
    'errorList' => '<ul class="list-unstyled">{{content}}</ul>',
    'submitContainer' => '<div class="col-sm-3"></div><div class="col-sm-9">{{content}}</div>',
    'button' => '<div class="form-group row"><div class="col-sm-3"></div><div class="col-sm-9"><button{{attrs}}>{{text}}</button></div></div>'
];