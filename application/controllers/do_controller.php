<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class do_controller extends CI_Controller {

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
	public function addDo(){

		$dbc = mysqli_connect('localhost', 'root', '', 'do_me');
		// $categoryInput = $_GET["categoryInput"]; 
		// $titleInput = $_GET["titleInput"];
		// $dateInput = $_GET["dateInput"];
		// $contentInput = $_GET["contentInput"];
		$categoryInput = $this->input->post("categoryInput"); 
		$titleInput =  $this->input->post("titleInput");
		$dateInput =  $this->input->post("dateInput");
		$contentInput =  $this->input->post("contentInput");

		$query = "INSERT INTO `do_me`.`note` (`title`, `content`, `category_id`, `date`) VALUES ('$titleInput', '$contentInput', '$categoryInput', '$dateInput');";
		mysqli_query($dbc, $query);


		//check if status needs to be updated

		mysqli_close($dbc);

		$home_url = 'http://' . $_SERVER['HTTP_HOST'];
  	header('Location: ' . $home_url);
	}
}
