<?php

function my_pmprorh_init( ) {
    // Don't break if Register Helper is not loaded.
    if( ! function_exists ( 'pmprorh_add_registration_field' ) ) {
        return false;
    }

    //define the fields
    $fields = array();


    $fields[] = new PMProRH_Field(
		'current-handicap',
		'select',
		array(
            'label' => 'Current Handicap',
			'options' => array(
				'+5' => '+5',
				'+4' => '+4',
                '+3' => '+3',
                '+2' => '+2',
                '+1' => '+1',
				'0'	=> '0',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
				'7' => '7',
				'8' => '8',
				'9' => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30',
				'31' => '31',
				'32' => '32',
				'33' => '33',
				'34' => '34',
				'35' => '35',
				'36' => '36',
            ),
            'profile' => true

		)
	);


    $fields[] = new PMProRH_Field (
        'age',
        'text',
        array(
            'label' => 'Age',
            'profile' => true,
    ));

    $fields[] = new PMProRH_Field(
		'gender',
		'select',
		array(
			'options' => array(
				'male'	=> 'Male',
				'female'=> 'Female',
            ),
            'profile' => true

		)
	);

    $fields[] = new PMProRH_Field(
		'play-competitively',
		'radio',
		array(
            'label' => 'Do you play competitively?',
			'options' => array(
				'yes'	=> 'Yes',
				'no' => 'No',
            ),
            'profile' => true

		)
	);

    $fields[] = new PMProRH_Field (
        'competed-tournaments',
        'text',
        array(
            'label' => 'What tournaments have you competed in?',
            'profile' => true,
    ));

    $fields[] = new PMProRH_Field (
        'training-frequency',
        'text',
        array(
            'label' => 'How many days per week do you train?',
            'profile' => true,
    ));

    $fields[] = new PMProRH_Field (
        'city',
        'text',
        array(
            'label' => 'City',
            'profile' => true,
    ));

    $fields[] = new PMProRH_Field (
        'state-province',
        'text',
        array(
            'label' => 'State/Province',
            'profile' => true,
    ));

    $fields[] = new PMProRH_Field(
		'country',
		'select',
		array(
			'options' => array(
				'select-country'	=> '-- Select Country --',
				'australia'	=> 'Australia',
				'austria'=> 'Austria',
                'bahamas'=> 'Bahamas',
				'bangladesh'=> 'Bangladesh',
				'barbados'=> 'Barbados',
				'belarus'=> 'Belarus',
				'Belgium'=> 'Belgium',
				'brazil'=> 'Brazil',
				'canada'=> 'Canada',
				'china'=> 'China',
				'dominican-republic'=> 'Dominican Republic',
				'el-salvador'=> 'El Salvador',
				'finland'=> 'Finland',
				'france'=> 'France',
				'germany'=> 'Germany',
				'greece'=> 'Greece',
				'honduras'=> 'Honduras',
				'hungary'=> 'Hungary',
				'iceland'=> 'Iceland',
				'india'=> 'India',
				'iran'=> 'Iran',
                'iraq'=> 'Iraq',
				'ireland '=> 'Ireland',
				'israel'	=> 'Israel',
				'italy'	=> 'Italy',
				'jamaica'	=> 'Jamaica',
				'japan'	=> 'Japan',
				'jordan'	=> 'Jordan',
				'kazakhstan'	=> 'Kazakhstan',
				'latvia'	=> 'Latvia',
				'luxembourg'	=> 'Luxembourg',
				'malaysia'	=> 'Malaysia',
				'mexico'	=> 'Mexico',
				'netherlands'	=> 'Netherlands',
				'new-zealand'	=> 'New Zealand',
				'nicaragua'	=> 'Nicaragua',
				'niger'	=> 'Niger',
				'nigeria'	=> 'Nigeria',
				'norway'	=> 'Norway',
				'pakistan'	=> 'Pakistan',
				'paraguay'	=> 'Paraguay',
				'peru'	=> 'Peru',
				'philippines'	=> 'Philippines',
				'Poland'	=> 'Poland',
				'portugal'	=> 'Portugal',
				'russian'	=> 'Russia',
				'samoa'	=> 'Samoa',
				'saudi-arabia'	=> 'Saudi Arabia',
				'singapore'	=> 'Singapore',
				'south-africa'	=> 'South Africa',
                'south-korea' => 'South Korea',
				'spain'	=> 'Spain',
				'sweden'	=> 'Sweden',
                'switzerland'	=> 'Switzerland',
                'syria'	=> 'Syria',
				'taiwan'	=> 'Taiwan',
				'thailand'	=> 'Thailand',
				'turkey'	=> 'Turkey',
				'ukraine'	=> 'Ukraine',
				'united-arab-emirates'	=> 'United Arab Emirates',
				'united-kingdom'	=> 'United Kingdom',
				'united-states'	=> 'United States',
				'Venezuela'	=> 'Venezuela',
				'vietnam'	=> 'Vietnam',
                'other' => 'Other'
            ),
            'profile' => true

		)
	);
        //  $fields[4]->attr['options']['other'];


    $fields[] = new PMProRH_Field (
        'other-country',
        'text',
        array(
            'label' => 'Other Country (if unlisted)',
            'profile' => true,
    ));

	$fields[] = new PMProRH_Field(
		'golf-facility-access',
		'radio',
		array(
			'label' => '<h2 class="section-title medium">Golf Facility Access</h2>',
			'options' => array(
				'indoor'	=> 'Indoor (i.e., hitting, chipping, putting)',
				'outdoor-without-bunker'=> 'Outdoor Without Bunker (i.e., hitting, chipping, putting)',
				'outdoor-with-bunker'=> 'Outdoor with Bunker (i.e., hitting, chipping, putting, bunker)',
			),
			'profile' => true

		)
	);

		
	$fields[] = new PMProRH_Field(
		'fitness-access',
		'radio',
		array(
			'label' => '<h2 class="section-title medium">Fitness Facility Access</h2>',
			'options' => array(
				'gym-workouts'	=> 'Gym Workouts w/ Equipment (e.g., barbell, dumbbells, bench, bands)',
				'home-workouts'=> 'Home Workouts w/ Equipment (e.g., dumbbells, bench/box, bands)',
				'mobility-core'=> 'Mobility & Core (i.e., no equipment)',
			),
			'profile' => true

		)
	);

    $fields[] = new PMProRH_Field(
		'driver',
		'select',
		array(
			'options' => array(
				'0'		=>	'0',
				'10'	=>	'10',
				'20'	=>	'20',
				'30'	=>	'30',
				'40'	=>	'40',
				'50'	=>	'50',
				'60'	=>	'60',
				'70'	=>	'70',
				'80'	=>	'80',
				'90'	=>	'90',
				'100'	=>	'100',
				'110'	=>	'110',
				'120'	=>	'120',
				'130'	=>	'130',
				'140'	=>	'140',
				'150'	=>	'150',
				'160'	=>	'160',
				'170'	=>	'170',
				'180'	=>	'180',
				'190'	=>	'190',
				'200'	=>	'200',
				'210'	=>	'210',
				'220'	=>	'220',
				'230'	=>	'230',
				'240'	=>	'240',
				'250'	=>	'250',
				'260'	=>	'260',
				'270'	=>	'270',
				'280'	=>	'280',
				'290'	=>	'290',
				'300'	=>	'300',
				'310'	=>	'310',
				'320'	=>	'320',
				'330'	=>	'330',
				'330+'	=>	'330+',
            ),
            'profile' => true

		)
	);

    $fields[] = new PMProRH_Field(
		'6-iron',
		'select',
		array(
            'label' => '6 Iron',
			'options' => array(
				'0'		=>	'0',
				'10'	=>	'10',
				'20'	=>	'20',
				'30'	=>	'30',
				'40'	=>	'40',
				'50'	=>	'50',
				'60'	=>	'60',
				'70'	=>	'70',
				'80'	=>	'80',
				'90'	=>	'90',
				'100'	=>	'100',
				'110'	=>	'110',
				'120'	=>	'120',
				'130'	=>	'130',
				'140'	=>	'140',
				'150'	=>	'150',
				'160'	=>	'160',
				'170'	=>	'170',
				'180'	=>	'180',
				'190'	=>	'190',
				'200'	=>	'200',
				'200+'	=>	'200+',
            ),
            'profile' => true

		)
	);

    $fields[] = new PMProRH_Field(
		'pitching-wedge',
		'select',
		array(
            'label' => 'Pitching Wedge',
			'options' => array(
				'0'		=>	'0',
				'5'		=>	'5',
				'10'	=>	'10',
				'15'	=>	'15',
				'20'	=>	'20',
				'25'	=>	'25',
				'30'	=>	'30',
				'35'	=>	'35',
				'40'	=>	'40',
				'45'	=>	'45',
				'50'	=>	'50',
				'55'	=>	'55',
				'60'	=>	'60',
				'65'	=>	'65',
				'70'	=>	'70',
				'75'	=>	'75',
				'80'	=>	'80',
				'85'	=>	'85',
				'90'	=>	'90',
				'95'	=>	'95',
				'100'	=>	'100',
				'105'	=>	'105',
				'110'	=>	'110',
				'115'	=>	'115',
				'120'	=>	'120',
				'125'	=>	'125',
				'130'	=>	'130',
				'135'	=>	'135',
				'140'	=>	'140',
				'145'	=>	'145',
				'150'	=>	'150',
				'150+'	=>	'150+',
            ),
            'profile' => true

		)
	);

    $fields[] = new PMProRH_Field(
		'goals',
		'textarea',
		array(
			'label'		=> 'Goals',
			'profile'	=> 	true
		)
	);

    $fields[] = new PMProRH_Field(
		'personal-assessment',
		'textarea',
		array(
			'label'		=> 'Personal Assessment of Golf Game',
			'profile'	=> 	true
		)
	);

    // Add the fields into a new checkout_boxes are of the checkout page.
    foreach ( $fields as $field ) {
        pmprorh_add_registration_field(
            'checkout_boxes', // location on checkout page
            $field            // PMProRH_Field object
        );
    }
}

add_action( 'init', 'my_pmprorh_init' );