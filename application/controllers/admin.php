<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	// <editor-fold defaultstate="collapsed" desc="dashboard & login">
	public function index()
	{
		$this->dashboard();
	}

	public function dashboard()
	{
		// checks if it's admin
		if($this->model_user->is_admin($this->input->cookie('duta_shop')))
		{
			// get data from database

			/*
			$data['total_order'] = $this->model_reports->get_count_order();
			$data['total_user'] = $this->model_reports->get_count_user();
			$data['total_item'] = $this->model_reports->get_count_item();
			$data['income_day'] = $this->model_reports->get_transaction_today();
			$this->barang_model->setDataOrderHariIni();
			$data['allDataOrder'] = $this->barang_model->getTodayOrder();
			*/

			// set page title
			$data['title'] = "Dashboard";

			// set username from cookie
			$data['username'] = $this->input->cookie('duta_shop');

			// loads views
			$this->load->view('includes/header', $data);
			$this->load->view('includes/navbar');
			$this->load->view('dashboard', $data);
			$this->load->view('includes/footer');
		}
		else
		{
			// no it's not admin, go back to login page
			$this->login();
		}
	}

	public function login()
	{
		// clear cookies automatically if you enters login page
		delete_cookie('duta_shop');

		// set page's title
		$data['title'] = "Login";

		// empty the error message
		$data['message'] = "";

		// take user's input from form
		$data['username'] = $this->input->post('username', TRUE);
		$data['password'] = $this->input->post('password', TRUE);
		$data['rememberMe'] = $this->input->post('rememberMe', TRUE);

		// if button LOGIN is pressed
		if($this->input->post('login', TRUE))
		{
			// cek kesesuaian username dan password
			$result        = $this->model_user->get_all_admin();

			$adaDiDatabase = 0;
			for($i = 0; $i < count($result); $i++)
			{
				// if username found
				if($data['username'] == $result[$i]['user_username'])
				{
					// if password is correct
					if($data['password'] == $result[$i]['user_password']) $adaDiDatabase = 1;
					else $data['message'] = "<div class='alert bg-danger' role='alert'><svg class='glyph stroked cancel'><use xlink:href='#stroked-cancel'></use>
						</svg>Incorrect password</div>";

					break;
				}
				else $data['message'] = "<div class='alert bg-danger' role='alert'><svg class='glyph stroked cancel'><use xlink:href='#stroked-cancel'></use>
					</svg>Matching username not found</div>";
			}

			if($adaDiDatabase)
			{
				if((int) $data['rememberMe'] == 1)
				{
					// set cookies
					$cookie = array('name'  => 'duta_shop','value' => $data['username'],'expire'=> 60 * 60 * 24 ); // expire in a day
					set_cookie($cookie);
				}
				else
				{
					// set session -- pake metode cookie, tapi expire nya diset jadi 0
					$cookie = array('name'  => 'duta_shop','value' => $data['username'],'expire'=> 0 ); // expire when browser closed
					set_cookie($cookie);
				}

				// go to home page
				$info['title'] = "Dashboard"; // set page title
				$info['username'] = $data['username']; // set username

				// get data from database
				/*
				$info['total_order'] = $this->model_reports->get_count_order(); // get total_order data from database
				$info['total_user'] = $this->model_reports->get_count_user(); // get total_user data from database
				$info['total_item'] = $this->model_reports->get_count_item(); // get total_item data from database
				$info['income_day'] = $this->model_reports->get_transaction_today(); // get income_day data from database

				$this->barang_model->setDataOrderHariIni();
				$info['allDataOrder'] = $this->barang_model->getTodayOrder();
				*/

				// load views
				$this->load->view('includes/header', $info);
				$this->load->view('includes/navbar', $info);
				$this->load->view('dashboard', $info);
				$this->load->view('includes/footer');
			}
			else
			{
				// not found in database
				$this->load->view('includes/header', $data);
				$this->load->view('login', $data);
				$this->load->view('includes/footer');
			}
		}
		else
		{
			// page loads for the first time
			$this->load->view('includes/header', $data);
			$this->load->view('login', $data);
			$this->load->view('includes/footer');
		}
	}
	// </editor-fold>

	// <editor-fold defaultstate="collapsed" desc="user">
	public function masterUser()
	{
		// checks if it's admin
		if($this->model_user->is_admin($this->input->cookie('duta_shop')))
		{
			// get information from form view
			$data['new_username'] = $this->input->post('new_username');
			$data['new_password'] = $this->input->post('new_password');
			$data['new_role'] = $this->input->post('new_role');
				
			// insert button on click
			if($this->input->post('insert'))
			{
				$this->model_user->insert_admin($data['new_username'], $data['new_password'], $data['new_role']);
				
				// set page title
				$data['title'] = "Master User";

				// set username from cookie
				$data['username'] = $this->input->cookie('duta_shop');

				// get information from database
				$data['tabelUser'] = $this->model_user->get_all_admin();

				// loads views
				$this->load->view('includes/header', $data);
				$this->load->view('includes/navbar', $data);
				$this->load->view('masters/master_user', $data);
				
			} 
			
			// update button on click -> go to update_user page
			else if ($this->input->post('update_user')){
				$this->updateUser($this->input->post('username'));
			} 
			
			// delete button on click
			else if($this->input->post('delete'))
			{
				$result = $this->model_user->delete_admin($this->input->post('username'));
				
				// set page title
				$data['title'] = "Master User";

				// set username from cookie
				$data['username'] = $this->input->cookie('duta_shop');

				// get information from database
				$data['tabelUser'] = $this->model_user->get_all_admin();

				// loads views
				$this->load->view('includes/header', $data);
				$this->load->view('includes/navbar', $data);
				$this->load->view('masters/master_user', $data);
			} 
			
			// load page as usual
			else {
				// set page title
				$data['title'] = "Master User";

				// set username from cookie
				$data['username'] = $this->input->cookie('duta_shop');

				// get information from database
				$data['tabelUser'] = $this->model_user->get_all_admin();

				// loads views
				$this->load->view('includes/header', $data);
				$this->load->view('includes/navbar', $data);
				$this->load->view('masters/master_user', $data);
			}
		}
		else
		{
			// no it's not admin, go back to login page
			$this->login();
		}
	}
	
	public function updateUser($username = NULL){
		// checks if it's admin
		if ($this->model_user->is_admin($this->input->cookie('duta_shop'))){
			
			// button save on click
			if ($this->input->post('save')){
				
				// get input from view
				$data['new_username'] = $this->input->post('new_username');
				$data['new_password'] = $this->input->post('new_password');
				$data['new_role'] = $this->input->post('new_role');
				
				// update the user information
				if ($this->model_user->update_admin($data['new_username'], $data['new_password'], $data['new_role'])){
					$this->masterUser();
				}
			}
			
			// load page as usual
			else {
				// get input from view
				$username = $this->input->post('username');
				
				$fromDB = $this->model_user->get_admin($username);
				
				// pass the data into view
				$data['new_username'] = $fromDB[0]['user_username'];
				$data['new_password'] = $fromDB[0]['user_password'];
				$data['new_role'] = $fromDB[0]['user_role'];
				
				// set page title
				$data['title'] = "Update User Information";
				
				// set username from cookie
				$data['username'] = $this->input->cookie('duta_shop');
				
				$this->load->view('includes/header', $data);
				$this->load->view('includes/navbar');
				$this->load->view('edit/edit_user', $data);
				$this->load->view('includes/footer');
			}
		} 
		else { // no it's not admin, go back to login page
			$this->login();
		}
	}
	// </editor-fold>

	// <editor-fold defaultstate="collapsed" desc="supplier">
    public function masterSupplier() {
        // checks if it's admin
        if ($this->model_user->is_admin($this->input->cookie('duta_shop'))) {
            
            // get information from form view
            $data['id'] = $this->input->post('id');
            $data['nama'] = $this->input->post('nama');
            $data['alamat'] = $this->input->post('alamat');
            $data['kota'] = $this->input->post('kota');
            $data['telp1'] = $this->input->post('telp1');
            $data['telp2'] = $this->input->post('telp2');

            // insert button on click
            if ($this->input->post('insert')) {
                
                // insert to database
                $this->model_supplier->insert_supplier($data['nama'], $data['alamat'], $data['kota'],
                        $data['telp1'], $data['telp2']);

                // set page title
                $data['title'] = "Master Supplier";

                // set username from cookie
                $data['username'] = $this->input->cookie('duta_shop');

                // get information from database
                $data['tabel'] = $this->model_supplier->get_all_supplier();
                $data['dropdown_kota'] = $this->model_supplier->get_all_town();

                // loads views
                $this->load->view('includes/header', $data);
                $this->load->view('includes/navbar', $data);
                $this->load->view('masters/master_supplier', $data);
            }

            // update button on click -> go to update_user page
            else if ($this->input->post('update_supplier')) {
                $this->updateSupplier($this->input->post('id'));
            }

            // delete button on click
            else if ($this->input->post('delete')) {
            	
                // update status on database
                $this->model_supplier->delete_supplier($this->input->post('id'));

                // set page title
                $data['title'] = "Master Supplier";

                // set username from cookie
                $data['username'] = $this->input->cookie('duta_shop');

                // get information from database
                $data['tabel'] = $this->model_supplier->get_all_supplier();
                $data['dropdown_kota'] = $this->model_supplier->get_all_town();

                // loads views
                $this->load->view('includes/header', $data);
                $this->load->view('includes/navbar', $data);
                $this->load->view('masters/master_supplier', $data);
            }

            // load page as usual
            else {
                // set page title
                $data['title'] = "Master Supplier";

                // set username from cookie
                $data['username'] = $this->input->cookie('duta_shop');

                // get information from database
                $data['tabel'] = $this->model_supplier->get_all_supplier();
                $data['dropdown_kota'] = $this->model_supplier->get_all_town();

                // loads views
                $this->load->view('includes/header', $data);
                $this->load->view('includes/navbar', $data);
                $this->load->view('masters/master_supplier', $data);
            }
        } else {
            // no it's not admin, go back to login page
            $this->login();
        }
    }

    public function updateSupplier($id = NULL) {
        // checks if it's admin
        if ($this->model_user->is_admin($this->input->cookie('duta_shop'))) {

            // button save on click
            if ($this->input->post('save')) {

                // get input from view
                $data['id'] = $this->input->post('id');
                $data['nama'] = $this->input->post('nama');
                $data['alamat'] = $this->input->post('alamat');
                $data['kota'] = $this->input->post('kota');
                $data['telp1'] = $this->input->post('telp1');
                $data['telp2'] = $this->input->post('telp2');
                $data['status'] = $this->input->post('status');

                // update the supplier information
                if ($this->model_supplier->update_supplier($data['id'], $data['nama'], 
                        $data['alamat'], $data['kota'], $data['telp1'], $data['telp2'], $data['status'])){
                    
                    $this->masterSupplier();
                } 
                
                // reload update page
                else {
					// get input from view
	                $id = $this->input->post('id');

					// get data from database
					$data['dropdown_kota'] = $this->model_supplier->get_all_town();
	                $fromDB = $this->model_supplier->get_supplier($id);
	                
	                // pass the data into view
	                $data['id'] = $fromDB[0]['supplier_id'];
	                $data['nama'] = $fromDB[0]['supplier_nama'];
	                $data['alamat'] = $fromDB[0]['supplier_alamat'];
	                $data['kota'] = $fromDB[0]['supplier_kota'];
	                $data['telp1'] = $fromDB[0]['supplier_telp1'];
	                $data['telp2'] = $fromDB[0]['supplier_telp2'];
	                $data['status'] = $fromDB[0]['supplier_status'];
	                
	                // set page title
	                $data['title'] = "Update Supplier Information";

	                // set username from cookie
	                $data['username'] = $this->input->cookie('duta_shop');

	                $this->load->view('includes/header', $data);
	                $this->load->view('includes/navbar');
	                $this->load->view('edit/edit_supplier', $data);
	                $this->load->view('includes/footer');
				}
            } 
            
            // load page as usual
            else {
                // get input from view
                $id = $this->input->post('id');

				// get data from database
				$data['dropdown_kota'] = $this->model_supplier->get_all_town();
                $fromDB = $this->model_supplier->get_supplier($id);
                
                // pass the data into view
                $data['id'] = $fromDB[0]['supplier_id'];
                $data['nama'] = $fromDB[0]['supplier_nama'];
                $data['alamat'] = $fromDB[0]['supplier_alamat'];
                $data['kota'] = $fromDB[0]['supplier_kota'];
                $data['telp1'] = $fromDB[0]['supplier_telp1'];
                $data['telp2'] = $fromDB[0]['supplier_telp2'];
                $data['status'] = $fromDB[0]['supplier_status'];
                
                // set page title
                $data['title'] = "Update Supplier Information";

                // set username from cookie
                $data['username'] = $this->input->cookie('duta_shop');

                $this->load->view('includes/header', $data);
                $this->load->view('includes/navbar');
                $this->load->view('edit/edit_supplier', $data);
                $this->load->view('includes/footer');
            }
        } else { // no it's not admin, go back to login page
            $this->login();
        }
    }
    // </editor-fold>

	public function masterBarang()
	{
		// checks if it's admin
		if($this->model_user->is_admin($this->input->cookie('duta_shop')))
		{
			// set page title
			$data['title'] = "Master Barang";

			// set username from cookie
			$data['username'] = $this->input->cookie('duta_shop');

			$data['allDataBarang'] = $this->barang_model->getAllDataBarang();

			// loads views
			$this->load->view('includes/header', $data);
			$this->load->view('includes/navbar', $data);
			$this->load->view('barang_view', $data);
			$this->load->view('includes/footer_empty');
		}
		else
		{
			// no it's not admin, go back to login page
			$this->login();
		}
	}
}
