<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}
	public function add_user()
	{
		
		if ($this->input->server('REQUEST_METHOD') == 'POST'){

			$postdata = file_get_contents("php://input");
			$request = json_decode($postdata);
			$email = $request->email;
			$name = $request->name;
			$address = $request->address;
			try {

				if(file_exists(getcwd()."/db.txt")){
					$data = file(getcwd()."/db.txt");
					print_r($data);
					$line = $data[count($data)-2];
					$line_arr = explode('|', $line);
					$i = ($line_arr[0]!='')? $line_arr[0]+1 : 1;
				}
				else{
					$i =1;
				}
				$txt = $i."|".$name."|".$email."|".$address."\n";
	 			$myfile = file_put_contents('db.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
	 			print_r($myfile);
	 		}
	 		catch(Exception $e) {
           	 echo $e->getMessage();
        	}


		}
		else{
			//$this->response(null, 405);
			return;
		}
	}
}
