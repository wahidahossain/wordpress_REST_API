<?php
//with hazmat, regulated & appointment type : required ======================= 1
$data = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
           
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
                'hazmat'=> [
                    'phone'=> $h_phone,
                    'erapReference'=> $h_erapReference,
                    'number'=> $h_number,
                    'shippingName'=> $h_shippingName,
                    'primaryClass'=> $h_primaryClass,
                    'subsidiaryClass'=> $h_subsidiaryClass,
                    'toxicByInhalation'=> $h_toxicByInhalation,
                    'packingGroup'=> $h_packingGroup,
                    'hazmatType'=> $h_hazmatType,
                ]            
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
		        'value'=> $surcharges_value
            ]
        ],        
     'appointment'=> 
        [
                'type'=>'Required',
                'phone'=> $app_phone
        ],
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType,            
    ];
//with hazmat, regulated & appointment type : scheduled ======================= 2
    $data_schedule = 
    [   
        'division'=> $division,
        'category'=> $category,
        'paymentType'=> $paymentType,
        'billingAccount'=> $billing_account,
        'note'=> $note,
            'sender'=> [
               
             'addressLine1'=> $sender_addressLine1,
             'city'=> $sender_city,
             'provinceCode'=> $sender_province,
             'postalCode'=> $sender_postalCode,
             'countryCode'=> $sender_countryCode,
             'customerName'=> $sender_customerName,
             'contact'=>[            
                    'fullName'=> $sender_fullName,
                    'language'=>  'EN',
                    'email'=> $sender_email,
                    'department'=> $sender_department,
                    'telephone'=> $sender_telephone,
                ]
            ],
            'consignee'=> [       
             'addressLine1'=> $consignee_addressLine1,
             'city'=> $consignee_city,
             'provinceCode'=> $consignee_province,
             'postalCode'=> $consignee_postalCode,
             'countryCode'=> $consignee_countryCode,
             'customerName'=> $consignee_customerName,
             'contact'=> [                                
                 'fullName'=> $consignee_fullName,
                 'language'=>  'EN',
                 'email'=> $consignee_email,
                 'department'=> $consignee_department,
                 'telephone'=> $consignee_telephone,
                ]
            ],
            'unitOfMeasurement'=> $unitOfMeasurement,         
            'parcels'=> [
                [               
                    'parcelType'=> $parcelType,
                    'quantity'=> $quantity,
                    'weight'=> $weight,
                    'length'=> $length,
                    'depth'=> $depth,
                    'width'=> $width,
                    'hazmat'=> [
                        'phone'=> $h_phone,
                        'erapReference'=> $h_erapReference,
                        'number'=> $h_number,
                        'shippingName'=> $h_shippingName,
                        'primaryClass'=> $h_primaryClass,
                        'subsidiaryClass'=> $h_subsidiaryClass,
                        'toxicByInhalation'=> $h_toxicByInhalation,
                        'packingGroup'=> $h_packingGroup,
                        'hazmatType'=> $h_hazmatType,
                    ]            
                ]
            ],
            'surcharges'=> [
                [
                    'type'=> $surcharges_type,
                    'value'=> $surcharges_value
                ]
            ],        
         'appointment'=> 
            [
                    'type'=>'Scheduled',
                    'date'=> $date,
                    'time'=> $time
            ],
            'createDate'=> $createDate,
            'deliveryType'=> $deliveryType,            
        ];

//Freight Account ==================================Non regulated + required ===== 3
$data_hazmat_nonregulated_required = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                            
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [
               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
                'hazmat'=> [
                    'description'=> $h_description,                        
                    'hazmatType'=> $h_hazmatType,
                ]   
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
                'value'=> $surcharges_value
            ]
        ],          
     'appointment'=> 
        [
                'type'=>'Required',
                'phone'=> $app_phone
        ],
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType,       
    
    ];


    //Freight Account ==================================Non regulated + schedule ===== 4
$data_hazmat_nonregulated_schedule = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                            
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [
               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
                'hazmat'=> [
                    'description'=> $h_description,                        
                    'hazmatType'=> $h_hazmatType,
                ]   
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
                'value'=> $surcharges_value
            ]
        ],          
     'appointment'=> 
        [
            'type'=>'Scheduled',
            'date'=> $date,
            'time'=> $time
        ],
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType,       
    
    ];

//Frieght =======================+ without hazmat + appointment/required +==================== 5
$data_without_hazmat_required = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                            
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [
               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
		        'value'=> $surcharges_value
            ]
        ],
        'appointment'=> 
        [
                'type'=>'Required',
                'phone'=> $app_phone
        ],
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType,       
    
    ];

//Frieght =======================+ without hazmat + appointment/schedule +==================== 6
$data_without_hazmat_schedule = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                            
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [
               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
		        'value'=> $surcharges_value
            ]
        ],
        'appointment'=> 
        [
            'type'=>'Scheduled',
            'date'=> $date,
            'time'=> $time
        ],
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType,       
    
    ];

//Frieght =======================+ without hazmat + appointment/schedule +==================== 7
$data_nonregulated_hazmat_none = 
    [   
        'division'=> $division,
        'category'=> $category,
        'paymentType'=> $paymentType,
        'billingAccount'=> $billing_account,
        'note'=> $note,
            'sender'=> [
               
             'addressLine1'=> $sender_addressLine1,
             'city'=> $sender_city,
             'provinceCode'=> $sender_province,
             'postalCode'=> $sender_postalCode,
             'countryCode'=> $sender_countryCode,
             'customerName'=> $sender_customerName,
             'contact'=>[            
                    'fullName'=> $sender_fullName,
                    'language'=>  'EN',
                    'email'=> $sender_email,
                    'department'=> $sender_department,
                    'telephone'=> $sender_telephone,
                ]
            ],
            'consignee'=> [       
             'addressLine1'=> $consignee_addressLine1,
             'city'=> $consignee_city,
             'provinceCode'=> $consignee_province,
             'postalCode'=> $consignee_postalCode,
             'countryCode'=> $consignee_countryCode,
             'customerName'=> $consignee_customerName,
             'contact'=> [                                
                 'fullName'=> $consignee_fullName,
                 'language'=>  'EN',
                 'email'=> $consignee_email,
                 'department'=> $consignee_department,
                 'telephone'=> $consignee_telephone,
                ]
            ],
            'unitOfMeasurement'=> $unitOfMeasurement,         
            'parcels'=> [
                [               
                    'parcelType'=> $parcelType,
                    'quantity'=> $quantity,
                    'weight'=> $weight,
                    'length'=> $length,
                    'depth'=> $depth,
                    'width'=> $width,
                    'hazmat'=> [
                        'phone'=> $h_phone,
                        'erapReference'=> $h_erapReference,
                        'number'=> $h_number,
                        'shippingName'=> $h_shippingName,
                        'primaryClass'=> $h_primaryClass,
                        'subsidiaryClass'=> $h_subsidiaryClass,
                        'toxicByInhalation'=> $h_toxicByInhalation,
                        'packingGroup'=> $h_packingGroup,
                        'hazmatType'=> $h_hazmatType,
                    ]            
                ]
            ],
            'surcharges'=> [
                [
                    'type'=> $surcharges_type,
                    'value'=> $surcharges_value
                ]
            ],       
            'createDate'=> $createDate,
            'deliveryType'=> $deliveryType,            
        ];

//Freight Account ==================================Non regulated + none ===== 8
$data_hazmat_nonregulated_none = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                            
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [
               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
                'hazmat'=> [
                    'description'=> $h_description,                        
                    'hazmatType'=> $h_hazmatType,
                ]   
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
                'value'=> $surcharges_value
            ]
        ],
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType,       
    
    ];

//Frieght =======================+ without hazmat + appointment/none +==================== 9
$data_without_hazmat_none = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                            
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [
               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
		        'value'=> $surcharges_value
            ]
        ],        
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType,       
    
    ];

//Frieght ====================================================
    $data_hazmat_regulated = 
    [   
        'division'=> $division,
        'category'=> $category,
        'paymentType'=> $paymentType,
        'billingAccount'=> $billing_account,
        'note'=> $note,
            'sender'=> [
             'addressLine1'=> $sender_addressLine1,
             'city'=> $sender_city,
             'provinceCode'=> $sender_province,
             'postalCode'=> $sender_postalCode,
             'countryCode'=> $sender_countryCode,
             'customerName'=> $sender_customerName,
             'contact'=>[            
                    'fullName'=> $sender_fullName,
                    'language'=>  'EN',
                    'email'=> $sender_email,
                    'department'=> $sender_department,
                    'telephone'=> $sender_telephone,
                ]
            ],
            'consignee'=> [       
             'addressLine1'=> $consignee_addressLine1,
             'city'=> $consignee_city,
             'provinceCode'=> $consignee_province,
             'postalCode'=> $consignee_postalCode,
             'countryCode'=> $consignee_countryCode,
             'customerName'=> $consignee_customerName,
             'contact'=> [                                            
                 'fullName'=> $consignee_fullName,
                 'language'=>  'EN',
                 'email'=> $consignee_email,
                 'department'=> $consignee_department,
                 'telephone'=> $consignee_telephone,
                ]
            ],
            'unitOfMeasurement'=> $unitOfMeasurement,         
            'parcels'=> [
                [
                   
                    'parcelType'=> $parcelType,
                    'quantity'=> $quantity,
                    'weight'=> $weight,
                    'length'=> $length,
                    'depth'=> $depth,
                    'width'=> $width,
                    'hazmat'=> [
                        'phone'=> $h_phone,
                        'erapReference'=> $h_erapReference,
                        'number'=> $h_number,
                        'shippingName'=> $h_shippingName,
                        'primaryClass'=> $h_primaryClass,
                        'subsidiaryClass'=> $h_subsidiaryClass,
                        'toxicByInhalation'=> $h_toxicByInhalation,
                        'packingGroup'=> $h_packingGroup,
                        'hazmatType'=> $h_hazmatType,
                    ]   
                ]
            ],
            'surcharges'=> [
                [
                    'type'=> $surcharges_type,
                    'value'=> $surcharges_value
                ]
            ],
            'appointment'=> 
            [
                'type'=>'Required',
                'phone'=> $app_phone
            ],
            'createDate'=> $createDate,
            'deliveryType'=> $deliveryType,       
        
        ];


        //Parcel =====================without_hazmat===================
$data_without_hazmat_parcel = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                            
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [
               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
		        'value'=> $surcharges_value
            ]
        ],
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType, 
        'references'=> [
            [
             'type'=> $references_type,
             'code'=> $references_code,
            ]
        ]       
    
    ];
//Parcel account==================hazmat_nonregulated=========================
        $data_hazmat_nonregulated_parcel = 
    [   
        'division'=> $division,
        'category'=> $category,
        'paymentType'=> $paymentType,
        'billingAccount'=> $billing_account,
        'note'=> $note,
            'sender'=> [
             'addressLine1'=> $sender_addressLine1,
             'city'=> $sender_city,
             'provinceCode'=> $sender_province,
             'postalCode'=> $sender_postalCode,
             'countryCode'=> $sender_countryCode,
             'customerName'=> $sender_customerName,
             'contact'=>[            
                    'fullName'=> $sender_fullName,
                    'language'=>  'EN',
                    'email'=> $sender_email,
                    'department'=> $sender_department,
                    'telephone'=> $sender_telephone,
                ]
            ],
            'consignee'=> [       
             'addressLine1'=> $consignee_addressLine1,
             'city'=> $consignee_city,
             'provinceCode'=> $consignee_province,
             'postalCode'=> $consignee_postalCode,
             'countryCode'=> $consignee_countryCode,
             'customerName'=> $consignee_customerName,
             'contact'=> [                                            
                 'fullName'=> $consignee_fullName,
                 'language'=>  'EN',
                 'email'=> $consignee_email,
                 'department'=> $consignee_department,
                 'telephone'=> $consignee_telephone,
                ]
            ],
            'unitOfMeasurement'=> $unitOfMeasurement,         
            'parcels'=> [
                [
                   
                    'parcelType'=> $parcelType,
                    'quantity'=> $quantity,
                    'weight'=> $weight,
                    'length'=> $length,
                    'depth'=> $depth,
                    'width'=> $width,
                    'hazmat'=> [
                        'description'=> $h_description,                        
                        'hazmatType'=> $h_hazmatType,
                    ]   
                ]
            ],
            'surcharges'=> [
                [
                    'type'=> $surcharges_type,
                    'value'=> $surcharges_value
                ]
            ],
            'createDate'=> $createDate,
            'deliveryType'=> $deliveryType,
        'references'=> [
            [
             'type'=> $references_type,
             'code'=> $references_code,
            ]
        ]       
        
        ];

?>