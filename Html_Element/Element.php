/**
 * Description of Element
 *
 * Create new class rewrite @method toHtml
 *
 * @version 0.1
 * @author Piotr Kuźnik <piotr.damian.kuznik@gmail.com>
 * @license https://www.gnu.org/copyleft/gpl.html GNU
 */
 
 abstract class Element {
    
    /**
     * @var string Nazwa identyfikujca
     */
    protected $name = null;
    
    /**
     * @var string css class
     */
    public $class = null;
    
    /**
     * @var string css code
    public $css = null;
    
    /**
     * @var string attribute title
     */
    public $title = null;
    
   	/**
     * @var string widht element
     */
    public $width = null;
    
    /**
     * @var string height element
     */
    public $height = null;
    
    /**
     * @event Click mouse
     * @var string
     */
    public $click = null;
    
    /**
     * @event Double Click mouse
     * @var JavaScript code
     */
    public $dbclick = null;
    
    /**
     * @event ContextMenu
     * @var JavaScript code
     */
    public $contextmenu = null;
    
    /**
     * @event Hover mouse
     * @var JavaScript code
     */
    public $mouseover = null;
    
    /**
     * @event MouseDown mouse
     * @var JavaScript code
     */
    public $mousedown = null;
    
    /**
     * @event load element
     * @var JavaScript code
     */
    public $load = null;
    
    /**
     * @event submit element
     * @var JavaScript code
     */
    public $submit = null;
    
    /**
     * @event change element
     * @var JavaScript code
     */
    public $change = null;
    
    /**
     * @event key press
     * @var JavaScript code
     */
    public $keypress = null;
    
    /**
     * @event key down
     * @var JavaScript code
     */
    public $keydown = null;
    
    /*
     * @param $name Identfikator html 
     */
    public function __construct($name){
        if ( is_string($name) == false || empty($name) ){
            trigger_error( "In construct " . __CLASS__ . "  you must set $name and his cannot be empty." );
        }    
        $this->name = $name;
    }
    
    /**
     * @return string Html code
     */
    public function toHtml(){
        return '';
    }
    
    /**
     * Create attribution object html 
     *
     * @param $attr string|null Value attribution
     * @param $name string name attribution
     */
    protected function createAttribution($attr, $name){
    	if ( is_null($attr) ){
    		return '';
    	}else{
    		return $name . '="' . $attr . '" ';
    	}
    }
    
    protected function getAttributions(){
    	$html = '';
    	$html .= $this->getAttribute($this->class, 'class');
    	
    	$css = '';
    	if (  is_null($this->css) false ){
    		$css = $this->css;
    	}
    	if (  is_null($this->height) false ){
    		$css .= ' height: ' $this->height;
    	}
    	if (  is_null($this->weight) false ){
    		$css .= ' weight: ' $this->weight;
    	}
    	$html .= $css;
    	
        $html .= $this->getAttribute($this->title, 'title');
        $html .= $this->getAttribute($this->change, 'onchange');
        $html .= $this->getAttribute($this->click, 'onclick');
        $html .= $this->getAttribute($this->contextmenu, 'oncontextmenu');
        $html .= $this->getAttribute($this->dbclick, 'ondblclick');
        $html .= $this->getAttribute($this->keydown, 'onkeydown');
        $html .= $this->getAttribute($this->keypress, 'onkeypress');
        $html .= $this->getAttribute($this->load, 'onload');
        $html .= $this->getAttribute($this->mousedown, 'onmousedown');
        $html .= $this->getAttribute($this->mouseover, 'onmouseover');
        $html .= $this->getAttribute($this->submit, 'onsubmit');
    }
 }
