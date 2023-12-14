<?php
/**
 * @package JorgeUsatorre Words
 * @version 0.0.1
 */
/*
Plugin Name: JorgeUsatorre Words
Plugin URI: http://wordpress.org/plugins/jorgeusatorre-words/
Description: This plugin is a test for the WordPress plugin development course.
Author: JorgeUsatorre
Version: 0.0.1
*/

function iniciarplugin() {
    create_table();
    insert_data();
}

function create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'numerosromanos';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        numero int(11) NOT NULL,
        numeroromano varchar(255) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function insert_data() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'numerosromanos';
    $data = array(
        array('numero' => 1, 'numeroromano' => 'I'),
        array('numero' => 2, 'numeroromano' => 'II'),
        array('numero' => 3, 'numeroromano' => 'III'),
        array('numero' => 4, 'numeroromano' => 'IV'),
        array('numero' => 5, 'numeroromano' => 'V'),
        array('numero' => 6, 'numeroromano' => 'VI'),
        array('numero' => 7, 'numeroromano' => 'VII'),
        array('numero' => 8, 'numeroromano' => 'VIII'),
        array('numero' => 9, 'numeroromano' => 'IX'),
        array('numero' => 10, 'roman_numeral' => 'X')

    );

    foreach ($data as $row) {
        $existing_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE arabic_number = %d", $row['numero']));

        if ($existing_row) {
            $wpdb->update($table_name, array('numeroromano' => $row['numeroromano']), array('id' => $existing_row->id));
        } else {
            $wpdb->insert($table_name, $row);
        }
    }
}

function jorgeusatorre_numerosromanos_typo_fix($content) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'numerosromanos';
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    foreach ($results as $row) {
        $content = str_replace($row->numero, $row->numeroromano, $content);
    }

    return $content;
}

add_action('plugins_loaded', 'iniciarplugin');
add_filter('the_content', 'roman_numerals_typo_fix');
add_filter('the_title', 'roman_numerals_title_fix');
