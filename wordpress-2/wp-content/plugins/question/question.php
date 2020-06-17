<?php 
 /*
 Plugin Name: question
 Plugin URI: http://monPlugin.com/
 Description: Ce plugin va révolutionner le monde.
 Version: 1.0.0
 Author: BatMan
 Author URI: http://monPlugin.com/
 License: GPL3
 Text Domain: monPlugin
 */
//require_once( __DIR__ . '\\Satisfaction.php');

class Satisfaction{
    public function __construct(){
      add_action('admin_menu',array('Satisfaction','declareAdmin'));
    }
    public static function declareAdmin(){
      add_menu_page('Configuration du questionnaire', 'Questionnaire', 'manage_options', 'question', array('Satisfaction', 'menuHtml'));
      add_submenu_page('question','Réinitialisation du questionnaire','Réinitialisation','manage_options','reinit',array('Satisfaction','menuHtmlInit'));
    }
    public static function menuHtml(){
      echo '<h1>'.get_admin_page_title().'</h1>';
      echo '<p>Page du plugin Questionnaire !!!</p>';
      echo self::resume();
    }
    public static function menuHtmlInit(){
        global $wpdb;
        echo '<h1>Réinitialisation</h1>';
        echo '<p>Cliquer sur le bouton suivant pour réinitialiser le questionnaire</p>';
        echo "<form method='POST' action='#'>
        <input type='submit' name='reinit'>
        </form>
        ";
        if(isset($_POST['reinit'])){
          $query = 'TRUNCATE TABLE '.$wpdb->prefix.'reponse_question';
          $wpdb->query($query);
          echo "réinitialisation !!!"; 
        }
    }
    public static function install(){
        self::install_db();
    }
    public static function uninstall(){
        self::uninstall_db();
    }
    public static function desactivate(){
    
    }

    static public function install_db(){
        global $wpdb;
        $wpdb->query("CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."reponse_question (id int(11) AUTO_INCREMENT PRIMARY KEY, reponse tinyint(1), idUser int(11));");
    }

    static public function uninstall_db(){
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS ".$wpdb->prefix."reponse_question;"); 
      
    }

    public static function resume(){
      global $wpdb;
      $query = "SELECT * FROM ".$wpdb->prefix."reponse_question";
      $resultats = $wpdb->get_results($query) ;
      $oui = 0;
      $non = 0;
      foreach($resultats as $rep){
        if($rep->reponse==1)
          $oui++;
        else
          $non++;
        }
      return "Oui : $oui, Non : $non";
     }
}
new Satisfaction();
register_activation_hook(__FILE__,array('Satisfaction','install')); 
register_deactivation_hook(__FILE__,array('Satisfaction','desactivate'));
register_uninstall_hook(__FILE__,array('Satisfaction','uninstall'));



//require_once(__DIR__ . '\\afficheQuestion.php');

class afficheQuestion extends WP_Widget{
  public function __construct()
  {
    parent::__construct('idAfficheQuestion', 'Affiche Question', array('description', 'Un formulaire pour répondre'), array());
 
  }

  public function widget($args, $ins){
    echo "
    <form action='' method='post'>
      <p class='formQuestion'>Aimez-vous ce site ?</p>
      <div class='formLabel'>
      <input type='checkbox' name='oui' id='oui' /> 
      <label for='oui' name='oui'>Oui</label>
       <input type='checkbox' name='non' id='non' /> 
       <label for='non' name='non'>Non</label>
     <input type='submit'/>
      </div>
    </form>";
  }
}

function declarerWidget(){
    register_widget('afficheQuestion');
}

add_action('widgets_init','declarerWidget');

global $wpdb;

$table =$wpdb->prefix.'reponse_question';
$idUser = get_current_user_id();
if(isset($_POST['oui'])){
  $wpdb->insert( $table, array('idUser'=>$idUser,'reponse'=>1));
}
if(isset($_POST['non'])){
  $wpdb->insert( $table, array('idUser'=>$idUser,'reponse'=>0));
}