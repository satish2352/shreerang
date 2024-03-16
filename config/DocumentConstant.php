<?php

namespace App\Constants;

return [

    // 'ORGANIZATION_ADD'	         => "/all_web_data/images/organization/",
    // 'ORGANIZATION_DELETE'	         => '/all_web_data/images/organization/',
    // 'ORGANIZATION_VIEW'	         => env("FILE_VIEW").'/all_web_data/images/organization/',

    // 'EMPLOYEES_ADD'	         => "/all_web_data/images/employees/",
    // 'EMPLOYEES_DELETE'	         => '/all_web_data/images/employees/',
    // 'EMPLOYEES_VIEW'	         => env("FILE_VIEW").'/all_web_data/images/employees/',

    // 'EMPLOYEES_HR_ADD'	         => "/all_web_data/images/hr/",
    // 'EMPLOYEES_HR_DELETE'	         => '/all_web_data/images/hr/',
    // 'EMPLOYEES_HR_VIEW'	         => env("FILE_VIEW").'/all_web_data/images/hr/',

    'DESIGNS_ADD'	         => "/all_web_data/images/designs/",
    'DESIGNS_DELETE'	         => '/all_web_data/images/designs/',
    'DESIGNS_VIEW'	         => env("FILE_VIEW").'/all_web_data/images/designs/',


    // 'DB_BACKUP'	 => "/all_web_data/DBBackup//",

    'ROLE_ID' => [
        'SUPER'             => 111,
        'HIGHER_AUTHORITY'  => 1,
        'PURCHASE'          => 2,
        'DESIGNER'          => 3,
        'PRODUCTION'        => 4,
        'SECURITY'          => 5,
        'QUALITY'           => 6,
        'STORE'             => 7,
        'FINANCE'           => 8,
        'HR'                => 9,
    ],
    
    'HIGHER_AUTHORITY' => [
        'NEW_REQUIREMENTS'                            => 1111,
        'NEW_REQUIREMENTS_SENT_TO_DESIGN_DEPARTMENT'  => 1112,
        'NEW_REQUIREMENTS_SENT_TO_PRODUCTION_DEPARTMENT'  => 1113,
        'NEW_REQUIREMENTS_STARTED_WORKING_BY_PRODUCTION_DEPARTMENT'  => 1114,
        'NEW_REQUIREMENTS_FROM_PROD_TO_DESIGN_DEPT_FOR_REVISED'   => 1115,
        'NEW_REQUIREMENTS_DESIGN_RECIVED_FROM_PRODUCTION_DEPT_REVISED'  => 1116,
        'LIST_PO_TO_BE_APPROVE_FROM_PURCHASE'         => 1126,
        'APPROVED_PO_FROM_PURCHASE'               => 1127,
        'NOT_APPROVED_PO_FROM_PURCHASE'           => 1128,
        // 'LIST_PO_TO_BE_APPROVE_NEW_MATERIAL'          => 111,
        // 'APPROVED_PO_NEW_MATERIAL'                    => 111,
        // 'NOT_APPROVED_PO_NEW_MATERIAL'                => 1,
        // 'LIST_DESIGN_TO_BE_APPROVE_NEW_FROM_DESIGN'   => 111,
        // 'APPROVED_DESIGN_NEW_FROM_DESIGN'             => 111,
        // 'NOT_APPROVED_DESIGN_NEW_FROM_DESIGN'         => 1,
        'LIST_INVOICE_TO_BE_APPROVE_FINANCE'             => 1139,
        'APPROVED_INVOICE_FINANCE'                       => 1140,
        'NOT_APPROVED_INVOICE_FINANCE'                   => 1141,
        'ACTUAL_WORK_COMPLETED_FROM_PRODUCTION_DEPARTMENT'   => 1121,
    ],

    'PUCHASE_DEPARTMENT' => [
        // 'LIST_PO_RECEIVED_NEW'                              => 222,
       
        // 'PO_RECEIVED_NEW_MATERIAL'                          => 111,
        // 'PO_RECEIVED_NEW_MATERIAL_VENDOR_ADDED'             => 111,
        // 'PO_NEW_MATERIAL_SENT_TO_HIGHER_AUTH_FOR_APPROVAL'  => 111,
        // 'PO_NEW_MATERIAL_SENT_TO_VENDOR'                    => 111,
        // 'PO_SENT_TO_DESIGN_DEPT'                            => 1,

        'LIST_REQUEST_NOTE_RECIEVED_FROM_STORE_DEPT_FOR_PURCHASE'         => 1123,
        'REQUEST_NOTE_RECIEVED_FROM_STORE_DEPT_FOR_PURCHASE_VENDOR_FINAL' => 1125,
        'PO_NEW_SENT_TO_HIGHER_AUTH_FOR_APPROVAL'                => 1126,

        'LIST_APPROVED_PO_FROM_HIGHER_AUTHORITY'                 => 1127,
        'LIST_APPROVED_PO_FROM_HIGHER_AUTHORITY_SENT_TO_VENDOR'  => 1129,
        'LIST_NOT_APPROVED_PO_FROM_HIGHER_AUTHORITY'             => 1128,
        'NOT_APPROVED_PO_AGAIN_SENT_FOR_APPROVAL_TO_HIGHER_AUTHORITY' => 1143,
      
    ],

    'DESIGN_DEPARTMENT' => [
        'LIST_NEW_REQUIREMENTS_RECEIVED_FOR_DESIGN'              => 1111,
        'NEW_REQUIREMENTS_DESIGN_DEPARTMENT_STARTED_DESIGN'      => 1112,
        // 'PO_RECEIVED_FOR_DESIGN'              => 111,
        // 'PO_RECEIVED_SENT_FOR_APPROVAL'       => 111,
        'DESIGN_SENT_TO_PROD_DEPT_FIRST_TIME' => 1113,
        'LIST_DESIGN_RECIEVED_FROM_PROD_DEPT_FOR_REVISED'    => 1115,
        'DESIGN_SENT_TO_PROD_DEPT_REVISED'    => 1116,
        'ACCEPTED_DESIGN_BY_PRODUCTION'           => 1114,
      
    ],

    'PRODUCTION_DEPARTMENT' => [
        'LIST_DESIGN_RECEIVED_FOR_PRODUCTION'           => 1113,
        'ACCEPTED_DESIGN_RECEIVED_FOR_PRODUCTION'           => 1114,
        'DESIGN_SENT_TO_DESIGN_DEPT_FOR_REVISED'   => 1115,
        'LIST_DESIGN_RECIVED_FROM_PRODUCTION_DEPT_REVISED'   => 1116,
        'BOM_SENT_TO_STORE_DEPT_FOR_CHECKING'   => 1117,
        'LIST_BOM_RECIVED_FROM_STORE_DEPT_FOR_PRODUCTION'   => 1118,
        'LIST_BOM_PART_MATERIAL_RECIVED_FROM_STORE_DEPT_FOR_PRODUCTION'   => 1119,
        'ACTUAL_WORK_STATED_FOR_PRODUCTION_ACCORDING_TO_DESIGN'   => 1120,
        'ACTUAL_WORK_COMPLETED_FROM_PRODUCTION_ACCORDING_TO_DESIGN'   => 1121,
      
    ],

    'SECURIY_DEPARTMENT' => [
        'LIST_PO_TO_BE_CHECKED'                  => 1129,
        'PO_CHECKED'                             => 1130,
        'GATE_PASS_GENRATED'                     => 1131,
        'PO_SENT_TO_QUALITY_DEPARTMENT'         => 1132,
      
    ],

    'QUALITY_DEPARTMENT' => [
        'LIST_PO_RECEIVED_FROM_SECURITY' => 1132,
        'PO_CHECKED'                     => 1133,
        'PO_CHECKED_OK_GRN_GENRATED_SENT_TO_STORE' => 1134,
        'PO_CHECKED_NOT_OK+RETURN_TO_VENDOR'       => 1144,
      
    ],
    
    'STORE_DEPARTMENT' => [
        'LIST_BOM_RECIVED_TO_STORE_DEPT_FOR_CHECKING'   => 1117,
        'LIST_BOM_PART_MATERIAL_SENT_TO_PROD_DEPT_FOR_PRODUCTION'          => 1118,
        'LIST_BOM_ALL_MATERIAL_SENT_TO_PROD_DEPT_FOR_PRODUCTION'           => 1119,
        'LIST_PART_MATERIAL_REQUEST_NOTE_SENT_TO_PROD_DEPT_FOR_PURCHASE'   => 1122,
        
        'LIST_PO_RECEIVED_FROM_QUALITY_DEPARTMENT'              => 1134,
        'STORE_RECIEPT_GENRATED'                                => 1135,
        'STORE_RECIEPT_GENRATED_SENT_TO_FINANCE'                => 1136,
      
    ],

    'FINANCE_DEPARTMENT' => [
        'LIST_STORE_RECIEPT_AND_GRN_RECEIVED_FROM_STORE_DEAPRTMENT' => 1136,
        'STORE_RECIEPT_AND_GRN_AGINST_PO_INVOICE_GENRATED'          => 1137,
        'INVOICE_SENT_FOR_BILL_APPROVAL_TO_HIGHER_AUTHORITY'        => 1138,
        'INVOICE_APPROVED_FROM_HIGHER_AUTHORITY'                    => 1140,
        'INVOICE_NOT_APPROVED_FROM_HIGHER_AUTHORITY'                => 1141,
        'INVOICE_PAID_AGAINST_PO'                                   => 1142
      
    ],
];