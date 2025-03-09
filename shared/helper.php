<?php

// if session is not started: start it
if (session_status() === PHP_SESSION_NONE) // PHP_SESSION_NONE is an inbuilt constant
{
    session_start(); // we start session in helper.php because it's the first file included in index.php
}


/**
 * Method Dump and Die
 * @param $data
 */
// dump and die = function to debug data to know if we passed correct data or not
function dd($data) // pass this data as a parameter
{
    // to know which data we're receiving from the front end or not
    echo '<pre>';
    print_r($data); // show the data we passed as a parameter
    echo '</pre>';
    exit();
}

/**
 * Method to redirect to the given URL
 * @param $url
 */
function redirect($module, $action)
{
    // header is a predefined php function
    // BASE_URL is a constant I configured in config.php file
    header("Location: " . BASE_URL . 'module=' . $module . '&action=' . $action);
    exit();
}

/**
 * Method to trim array
 * @param $array
 * @return mixed
 */
function trimArray($array) // used when saving a new record, ex. student record
{
    // before saving data in db we loop through the data introduced by the user and we trim it by omitting the spaces
    foreach ($array as $key => $value) {
        $array[$key] = is_array($value) ? trimArray($value) : trim($value);
    }
    return $array;
}

/**
 * Method to get Dummy Class list
 * @return array[]
 */

function getDummyClassList() // used before I created a full db, now that I created it I'm not using it anymore
{
    return [ // return array of id and class name
        [
            'id' => 1,
            'class_name' => 'Class 1'
        ],
        [
            'id' => 2,
            'class_name' => 'Class 2'
        ],
        [
            'id' => 3,
            'class_name' => 'Class 3'
        ],
        [
            'id' => 4,
            'class_name' => 'Class 4'
        ],
        [
            'id' => 5,
            'class_name' => 'Class 5'
        ],
        [
            'id' => 6,
            'class_name' => 'Class 6'
        ],
        [
            'id' => 7,
            'class_name' => 'Class 7'
        ],
        [
            'id' => 8,
            'class_name' => 'Class 8'
        ],
        [
            'id' => 9,
            'class_name' => 'Class 9'
        ],
        [
            'id' => 10,
            'class_name' => 'Class 10'
        ],
        [
            'id' => 11,
            'class_name' => 'Class 11'
        ],
        [
            'id' => 12,
            'class_name' => 'Class 12'
        ],
    ];
}

/**
 * Method to get dummy roll no's
 * @return string
 */
function getDummyRollNo() // return roll number for every student
{
    return 'STU' . rand(000000, 999999);
}
