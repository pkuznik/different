/**
 * Description of Element
 * @version 0.1
 * @author Piotr Kuźnik <piotr.damian.kuznik@gmail.com>
 * @license https://www.gnu.org/copyleft/gpl.html GNU
 * @copyright
 */
 
 abstract class Element {
    
    /**
     * @var string Nazwa identyfikujca
     */
    proctected $name = null;
    
    /*
     * @param $name Identfikator html 
    public function __construct($name){
        if ( is_string($name) == false || empty($name) ){
            trigger_error( "In construct " . __CLASS__ . "  you must set $name and his cannot be empty." );
        }    
        $this->name = $name;
    }
    
    /**
     * Zwraca html danego elementu
    public function toHtml(){
        return '';
    }
 }
