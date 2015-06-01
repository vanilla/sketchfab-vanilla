<?php if (!defined('APPLICATION')) exit();

// Define the plugin:
$PluginInfo['Sketchfab'] = array(
   'Description' => 'Provides a button to embed a model easily. Depends on the Advanced Editor plugin.',
   'Version' => '1.0',
   'RequiredApplications' => array('Vanilla' => '>=2.2'),
   'RequiredTheme' => FALSE, 
   'RequiredPlugins' => array('editor' => '>=1.7'),
   'HasLocale' => FALSE,
   'SettingsPermission' => 'Garden.AdminUser.Only',
   'Author' => "Sketchfab",
   'AuthorEmail' => 'arthur@sketchfab.com',
   'AuthorUrl' => 'https://sketchfab.com'
);

class SketchfabPlugin extends Gdn_Plugin {

 /**
  * Plugin constructor
  *
  * This fires once per page load, during execution of bootstrap.php. It is a decent place to perform
  * one-time-per-page setup of the plugin object. Be careful not to put anything too strenuous in here
  * as it runs every page load and could slow down your forum.
  */
  public function __construct() {
    
  }
 
 /**
  * Base_Render_Before Event Hook
  *
  * This is a common hook that fires for all controllers (Base), on the Render method (Render), just 
  * before execution of that method (Before). It is a good place to put UI stuff like CSS and Javascript 
  * inclusions. Note that all the Controller logic has already been run at this point.
  *
  * @param $Sender Sending controller instance
  */
  public function Base_Render_Before($Sender) {
    $Sender->AddCssFile($this->GetResource('design/sketchfab.css', FALSE, FALSE));
    $Sender->AddJsFile($this->GetResource('js/sketchfab.js', FALSE, FALSE));
  }
  /**
   * Custom hook, emitted by the Advanced Editor plugin. This makes the Advanced Editor a dependency of this plugin.
   */
  public function EditorPlugin_InitEditorToolbar_Handler($Sender, $args) {
    echo '<span id="embed-sketchfab-plugin-button" class="editor-action icon editor-action-sketchfab">S</span>';
  }
   
}
