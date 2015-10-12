/**
 * Description of Input
 *
 * Create new class rewrite @method toHtml
 *
 * @version 0.1
 * @author Piotr Kuźnik <piotr.damian.kuznik@gmail.com>
 * @license https://www.gnu.org/copyleft/gpl.html GNU
 */
 
 class  Input extends Element {
  
  /**
   * @var string Default value input
   */
  public $value = null;
  
  /**
   * @var string  attribute type than input
   */
  proctected $type = null;
  
  /**
   * @var string  attribute name send in POST|GET form
   */
  proctected $post = null;
  
  /**
   * @param $name string Identified object
   * @param $type string type imput
   */
  public function __construct($name, $type, $post){
    parent::__construct($name);
    if ( is_string ($type) == false || empty($type)  ){
        trigger_error(__CLASS__ . '::__construct must set $type.'):
    }
  }
  
  /**
   * @return string HTML
   */
  public function toHtml(){
    $html = '<input id="' . $this->name . '" type=" . $this->type . '";
    
    $hmtl .= $this->createAttribution($this->post, 'name');
    $html .= $this->createAttribution($this->value, 'value');
    
    $html .= $this->getAttribution();
    
    $html .= '/>';
    return $html;
  }
 }
