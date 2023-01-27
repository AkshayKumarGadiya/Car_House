<?php

class MyFlashController extends CI_Controller {

  /**
    * Manage __construct
    *
    * @return Response
   */
   public function __construct() { 
      parent::__construct(); 
      $this->load->library("session");
   }

	/**
    * Get All Data from this method.
    *
    * @return Response
   */
	public function success()
	{
      $this->session->set_flashdata('success', 'User Updated successfully');
      return $this->load->view('myPages');
	}

  /**
    * Get All Data from this method.
    *
    * @return Response
   */
  public function error()
  {
      $this->session->set_flashdata('error', 'Something is wrong.');
      return $this->load->view('myPages');
  }

  /**
    * Get All Data from this method.
    *
    * @return Response
   */
  public function warning()
  {
      $this->session->set_flashdata('warning', 'Something is wrong.');
      return $this->load->view('myPages');
  }

  /**
    * Get All Data from this method.
    *
    * @return Response
   */
  public function info()
  {
      $this->session->set_flashdata('info', 'User listed bellow');
      return $this->load->view('myPages');
  }

}

