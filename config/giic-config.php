<?php
// GIIC CONFIG FILE
// ----------------

$appRoot = dirname(__FILE__) . '/../../../..';

// define table list (eg. you don't need MANY_MANY tables)
$tables = array(
    'p3_media'             => 'p3Media',
    'p3_media_translation' => 'p3MediaTranslation'
);

// define CRUDs
$cruds = $tables;

// init actions
$actions = array();

// generate slim CRUDs into application
foreach ($cruds AS $crud) {
    $actions[] = array(
        "codeModel" => "FullCrudCode",
        "generator" => 'vendor.phundament.gii-template-collection.fullCrud.FullCrudGenerator',
        "templates" => array(
            'slim' => $appRoot . '/vendor/phundament/gii-template-collection/fullCrud/templates/slim',
        ),
        "model"     => array(
            "model"                  => "vendor.phundament.p3Media.models." . ucfirst($crud),
            "controller"             => 'p3media/' . $crud,
            'messageCatalog'         => 'p3MediaModule.model',
            'messageCatalogStandard' => 'P3MediaModule.crud',
            'providers'              => array(
                'vendor.phundament.gii-template-collection.fullCrud.providers.GtcPartialViewProvider',
                'vendor.schmunk42.giic.examples.PhFieldProvider'
            ),
            "template"               => "slim",
            'formEnctype'            => 'multipart/form-data'
        )
    );
}


return array(
    "actions" => $actions
);