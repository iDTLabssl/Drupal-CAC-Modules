<?php  
/**  
 * @file  
 * Contains Drupal\cac_message\Form\CacxMessageForm.  
 */  
namespace Drupal\cac_message\Form;  
use Drupal\Core\Form\ConfigFormBase;  
use Drupal\Core\Form\FormStateInterface; 
use Drupal\Core\Routing\RouteProviderInterface;

class CacMessageForm extends ConfigFormBase {  
/**  
   * {@inheritdoc}  
   */  
  protected function getEditableConfigNames() {  
    return [  
      'cac_message.adminsettings',  
    ];  
  }  

  /**  
   * {@inheritdoc}  
   */  
  public function getFormId() {  
    return 'cac_message_form';  
  }


  /**  
   * {@inheritdoc}  
   */  
	  public function buildForm(array $form, FormStateInterface $form_state) {  
	    $config = $this->config('cac_message.adminsettings');  
		$form['welcome_message'] = [
			'#type' => 'text_format',
			'#title' => $this->t('Welcome message'),
			'#description' => $this->t('Display message to users'),
			'#default_value' => $config->get('welcome_message')['value'],
			'#required' => TRUE,
			'#attributes' => array(
				'class' => array('field_info'),
				'rows' => '5',
				'cols' => '200',		  	
			),
			'#wysiwyg' => TRUE,	   	
		];
	   
	    $form['message_path'] = [  
			'#type' => 'textarea',  
			'#title' => $this->t('Welcome message display path'),  
			'#description' => $this->t('Welcome message display to specific path. Please add url start with slash and one url per line.<br/>No wildcard (*) supported.'),  
			'#default_value' => $config->get('message_path'), 
			'#required' => TRUE,
			'#attributes' => array(
				'rows' => '5',
				'cols' => '200',		  	
			),
	    ];  

    	/*Load all drupal roles*/

	 	$roles = array_map(array('\Drupal\Component\Utility\Html', 'escape'), user_role_names(FALSE));

		$form['user_roles'] = array(
			'#type' => 'checkboxes',
			'#title' => $this->t('Roles'),
			'#default_value' =>  $config->get('user_roles'),
			'#options' => $roles,
			'#required' => TRUE
		);
		$form['display_message_type'] = array(
			'#type' => 'radios',
			'#title' => $this->t('Select Display Message Type'),
			'#default_value' =>  $config->get('display_message_type'),
			'#options' =>  [
			    'status' 	=> $this->t('Status'),
			    'warning' 	=> $this->t('Warning'),
			    'error' 	=> $this->t('Error')
			],
			'#required' => TRUE
		);
	    return parent::buildForm($form, $form_state);  
	  } 

	    /**
   * {@inheritdoc}
   */
  	public function validateForm(array &$form, FormStateInterface $form_state) {
  		/*check path is exit in route table*/
		$alias_array = explode("\n", $form_state->getValue('message_path'));

	    foreach ($alias_array as $key => $alias) {
	    	$alias = rtrim(trim($alias), " \\/");
	    	$is_exists = \Drupal::service('path.validator')->isValid($alias);

		    if (!$is_exists) {
		       $form_state->setErrorByName('message_path', $this->t( $alias .' Path not found. Please enter valid path.'));	      
	        }
	        if ($alias && $alias[0] !== '/') {
		       	$form_state->setErrorByName('message_path', $this->t( $alias . ' alias needs to start with a slash.'));    		
			} 
		}
	}


		/**  
		* {@inheritdoc}  
		*/ 
	public function submitForm(array &$form, FormStateInterface $form_state) {  
		parent::submitForm($form, $form_state);  
		$this->config('cac_message.adminsettings')  
		  ->set('welcome_message', $form_state->getValue('welcome_message'))  
  		  ->set('message_path', $form_state->getValue('message_path'))  
  		  ->set('user_roles', $form_state->getValue('user_roles'))  
  		  ->set('display_message_type', $form_state->getValue('display_message_type'))  
		->save();  
	}  
}  
