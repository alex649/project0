<?php
 
class Homepage {
 
    public function index()
    {
        $this->load->view('../views/templates/header', array('title' => 'Three Aces Pizza'));
        $this->load->view('../views/index');
        $this->load->view('../views/templates/footer');
    }
 
    public function lectures()
    {
        $this->load->view('../views/templates/header', array('title' => 'Pizzas'));
        $this->load->view('../views/homepage/pizzas');
        $this->load->view('../views/templates/footer');
    }
 
    public function lecture($n)
    {
        $this->load->view('../views/templates/header', array('title' => 'Lecture ' . $n));
        $this->load->view('../views/homepage/lecture', array('n' => $n));
        $this->load->view('../views/templates/footer');
    }
}
 
?>
