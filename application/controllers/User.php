<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("My_model");
		date_default_timezone_set('Asia/Kolkata');
	}

	public function nav()
	{
		$data['base_info']=$this->My_model->select('company_det');
		$data['category']=$this->My_model->select('category');

		$this->load->view('user/nav',$data);
	}
	public function footer()
	{
		$this->load->view('user/footer');
	}
	public function index()
	{
		$this->nav();
		$data['home_image']=$this->My_model->select("home_image");
		$data['category']=$this->My_model->select("category");
		$data['trending_products']=$this->db->query("SELECT * FROM product ORDER BY product_id DESC LIMIT 2")->result_array();
		$this->load->view('user/index',$data);
		$this->footer();
	}
	public function about()
	{
		echo "About";
		// $this->load->view('welcome_message');
	}

	public function product_details_by_ajax()
	{
		echo json_encode($this->My_model->select_where("product",$_POST));
	}
	public function product_details()
	{
		$this->nav();
		$data['product_det']=$this->My_model->select_where("product",['product_id'=>$_GET['product_id']]);
		$data['product_cat']=$this->My_model->select_where("category",['category_id'=>$data['product_det'][0]['category_id']]);
		$data['product_subcat']=$this->My_model->select_where("subcategory",['subcategory_id'=>$data['product_det'][0]['subcategory_id']]);
		$data['related_product']=$this->db->query("SELECT * FROM product WHERE category_id='".$data['product_det'][0]['category_id']."' LIMIT 4")->result_array();
		$this->load->view("user/product_details",$data);
		$this->footer();
	}

	public function product_list()
	{
		// print_r($_GET);
		$data['products']=$this->My_model->select_where("product",['category_id'=>$_GET['cat_id']]);
		$data['subcategories']=$this->My_model->select_where("subcategory",['category_id'=>$_GET['cat_id']]);
		$data['categories']=$this->My_model->select('category');
		$this->nav();
		$this->load->view('user/product_list',$data);
		$this->footer();
	}
	public function login()
	{
		$this->nav();
		$this->load->view('user/login');
		$this->footer();
	}
	public function register_user()
	{
		// $this->My_model->create_table("user_tbl",$_POST);
		$this->My_model->insert("user_tbl",$_POST);
		// $this->login_user();
		redirect(base_url()."user/login");
	}
	public function login_user()
	{
		$cond=['usermobile'=>$_POST['usermobile'],'userpassword'=>$_POST['userpassword']];
		$data=$this->My_model->select_where("user_tbl",$cond);
		if(isset($data[0]))
		{
			// print_r($data);
			$_SESSION['user_tbl_id']=$data[0]['user_tbl_id'];
			// echo "Login Success";
			redirect(base_url()."user/index");
		}
		else
		{
			$this->session->set_flashdata("failed","Login Failed");
			echo "<script>history.back();</script>";
			// echo "Login Failed";
		}
	}
	public function logout()
	{
		session_destroy();
		redirect(base_url().'user/index');
	}
	public function add_product_in_cart()
	{
		if(isset($_SESSION['user_tbl_id']))
		{
			$data['product_id']=$_GET['product_id'];
			$data['user_tbl_id']=$_SESSION['user_tbl_id'];
			$cart=$this->My_model->select_where("user_cart",$data);
			if(!isset($cart[0]))
			{
				$data['qty']=1;
				// $this->My_model->create_table('user_cart',$data);
				$this->My_model->insert('user_cart',$data);
			}
			echo "<script>window.history.back()</script>";
		}
		else
		{
			$this->session->set_flashdata("failed","Login Required... To Add Product in Cart");
			redirect(base_url().'user/login');
		}
	}
	public function cart()
	{
		if(isset($_SESSION['user_tbl_id']))
		{
			$this->nav();
			$data['cart_products']=$this->db->query("SELECT * FROM user_cart,product WHERE user_cart.product_id=product.product_id AND user_cart.user_tbl_id='".$_SESSION['user_tbl_id']."'")->result_array();
			$this->load->view('user/cart',$data);
			$this->footer();
		}
		else
		{
			$this->session->set_flashdata("failed","Login Required... To View to Cart");
			redirect(base_url().'user/login');
		}
	}
	public function remove_product_from_cart()
	{
		print_r($_GET);
		print_r($_SESSION);
		$this->My_model->delete("user_cart",['user_cart_id'=>$_GET['cart_id'],'user_tbl_id'=>$_SESSION['user_tbl_id']]);
		echo "<script>window.history.back()</script>";

	}
	public function change_cart_qty()
	{
		$cart_det=$this->My_model->select_where('user_cart',['user_cart_id'=>$_POST['user_cart_id']])[0];

		if($_POST['type']=='DEC')
		{
			if($cart_det['qty']>1)
			{
				$this->My_model->update("user_cart",['user_cart_id'=>$_POST['user_cart_id']],['qty'=>$cart_det['qty']-1]);
			}
		}
		else
		{
			$this->My_model->update("user_cart",['user_cart_id'=>$_POST['user_cart_id']],['qty'=>$cart_det['qty']+1]);
		}
		$cart_new_det=$this->My_model->select_where('user_cart',['user_cart_id'=>$_POST['user_cart_id']])[0];
		echo json_encode($cart_new_det);

	}
	public function checkout()
	{
		$data["products"]=$this->db->query("SELECT * FROM user_cart,product WHERE user_cart.product_id=product.product_id AND user_cart.user_tbl_id='".$_SESSION['user_tbl_id']."'")->result_array();

		$data['user_det']=$this->My_model->select_where("user_tbl",["user_tbl_id"=>$_SESSION['user_tbl_id']])[0];

		$this->nav();
		$this->load->view("user/checkout",$data);
		$this->footer();
	}
	public function place_order()
	{
		echo "<pre>";
		$products=$this->db->query("SELECT * FROM user_cart,product WHERE user_cart.product_id=product.product_id AND user_cart.user_tbl_id='".$_SESSION['user_tbl_id']."'")->result_array();
		$ttl=0;
		$ttl_qty=0;
		foreach ($products as $row)
		{
        	$ttl=$ttl+($row['qty']*$row['product_price']);
        	$ttl_qty+=$row['qty'];
		}
		$_POST['user_tbl_id']=$_SESSION['user_tbl_id'];
		$_POST['ttl_qty']=$ttl_qty;
		$_POST['order_ttl']=$ttl;
		$_POST['order_date']=date('Y-m-d');
		$_POST['order_time']=date('h:ia');
		$_POST['order_status']="pending";
		// $id=$this->My_model->create_table("order_tbl",$_POST);
		$id=$this->My_model->insert("order_tbl",$_POST);
		
		$order_det['order_tbl_id']=$id;
		foreach($products as $row)
		{
			$order_det['product_id']=$row['product_id'];
			$order_det['user_tbl_id']=$row['user_tbl_id'];
			$order_det['qty']=$row['qty'];
			$order_det['product_name']=$row['product_name'];
			$order_det['product_price']=$row['product_price'];
			$order_det['product_company']=$row['product_company'];
			$order_det['product_color']=$row['product_color'];
			$order_det['product_rating']=$row['product_rating'];
			$order_det['product_description']=$row['product_description'];
			$order_det['product_image']=$row['product_image'];
			
			print_r($order_det);

			$this->My_model->insert("order_det_tbl",$order_det);
		}
		$this->My_model->delete("user_cart",['user_tbl_id'=>$_SESSION['user_tbl_id']]);
		redirect(base_url()."user/order_bill/".$id);

	}
	public function order_bill($order_id)
	{

		$order['bill']=$this->My_model->select_where("order_tbl",['order_tbl_id'=>$order_id]);
		$order_det=$this->My_model->select_where("order_det_tbl",['order_tbl_id'=>$order_id]);


		$this->load->view("user/order_bill",$order);


		echo "<pre>";
		print_r($order);
		// echo "<hr>";
		// print_r($order_det);

	}
}












