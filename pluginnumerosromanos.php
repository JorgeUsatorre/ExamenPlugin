<?php
/**
 * @package JorgeUsatorre Numeros
 * @version 0.0.1
 */
/*
Plugin Name: JorgeUsatorre Numeros
Plugin URI: http://wordpress.org/plugins/jorgeusatorre-words/
Description: This plugin is a test for the WordPress plugin development course.
Author: JorgeUsatorre
Version: 0.0.1
*/

// Función que se ejecuta al cargar el plugin
function iniciarplugin() {
    create_table();
    insert_data();
}

// Función que crea la tabla en la base de datos
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

// Función que inserta datos en la tabla
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
    );

    foreach ($data as $row) {
        // Se busca si el número ya existe en la base de datos
        $existing_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE arabic_number = %d", $row['numero']));

        // Si existe, se actualiza; si no, se inserta
        if ($existing_row) {
            $wpdb->update($table_name, array('numeroromano' => $row['numeroromano']), array('id' => $existing_row->id));
        } else {
            $wpdb->insert($table_name, $row);
        }
    }
}

// Función que realiza el reemplazo en el contenido y título
function jorgeusatorre_numerosromanos_typo_fix($content) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'numerosromanos';
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    foreach ($results as $row) {
        $content = str_replace($row->numero, $row->numeroromano, $content);
    }

    return $content;
}

// Se ejecuta al cargar los plugins
add_action('plugins_loaded', 'iniciarplugin');

// Aplica el filtro al contenido
add_filter('the_content', 'jorgeusatorre_numerosromanos_typo_fix');

// Aplica el filtro al título
add_filter('the_title', 'jorgeusatorre_numerosromanos_typo_fix');
