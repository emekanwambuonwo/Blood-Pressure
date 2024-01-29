class Emeka {
    public $name;
    public $job;
    public $address;

    public function __construct($name, $job, $address) {
        $this->name = $name;
        $this->job = $job;
        $this->address = $address;
    } 
}

$person = new Emeka('Emeka', 'Software Engineer', 'Plot B Ailegun Lagos');
echo '<pre>';
var_dump($person);
echo '</pre>';