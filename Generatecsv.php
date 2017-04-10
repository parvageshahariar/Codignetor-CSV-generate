<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generatecsv extends CI_Controller {
	public function __construct() 
    {
        parent::__construct();
        if(!$this->session->userdata("userdata")) {
        redirect(base_url());
            // do something
        }
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
    }
    public function generate_csv(){
        $filename="report.csv";
        $this->select('*') // select desired parameter
        $query = $this->db->get();  
        $delimiter = ",";
        $newline = "\r\n";
        $data= $this->dbutil->csv_from_result($query, $delimiter, $newline);
        force_download($filename, @$data);
        
    }
}
