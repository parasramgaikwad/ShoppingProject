<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("My_model");
	}
	public function uploadImage($imagename)
	{
		if ($_FILES[$imagename]['name']!="")
		{
			// print_r($_FILES[$imagename]);
			$filename=time().$_FILES[$imagename]['name'];
			move_uploaded_file($_FILES[$imagename]['tmp_name'],'uploads/'.$filename);
			$_POST[$imagename]=$filename;
			return $filename;
		}
		else
		{
			return "";
		}
	}

	public function nav()
	{
		$this->load->view('admin/nav');
	}
	public function footer()
	{
		$this->load->view('admin/footer');
	}
	public function index()
	{
		$this->nav();
		$this->load->view('admin/index');
		$this->footer();
	}

	public function ov($pagename,$data="")
	{
		$this->nav();
		$this->load->view('admin/'.$pagename,$data);
		$this->footer();
	}
	public function category()
	{
		$data['category_list']=$this->My_model->select("category");
		$this->ov("category",$data);
	}
	public function save_category()
	{
		$this->uploadImage("category_image");
		// print_r($_POST);
		// $this->My_model->create_table("category",$_POST);
		$this->My_model->insert("category",$_POST);
		redirect(base_url().'admin/category');
	}
	public function edit_category($id)
	{
		$data['category_det']=$this->My_model->select_where("category",["category_id"=>$id]);
		$this->ov("edit_category",$data);
	}
	public function save_updated_category()
	{
		$this->uploadImage("category_image");
		// print_r($_POST);
		$cond=['category_id'=>$_POST['category_id']];
		$this->My_model->update("category",$cond,$_POST);
		redirect(base_url().'admin/category');
	}


	public function subcategory()
	{
		$data['category']=$this->My_model->select("category");
		$data['subcategory']=$this->My_model->select("subcategory");
		$data['subcategory']=$this->db->query("SELECT * FROM category,subcategory WHERE category.category_id=subcategory.category_id")->result_array();
		$this->ov("subcategory",$data);
	}
	public function save_subcategory()
	{
		$this->uploadImage("subcategory_image");
		echo "<pre>";
		print_r($_POST);
		// print_r($_FILES);
		// $this->My_model->create_table("subcategory",$_POST);
		$this->My_model->insert("subcategory",$_POST);
		redirect(base_url().'admin/subcategory');

	}
	public function edit_subcategory($subcategory_id)
	{
		$data['category']=$this->My_model->select("category");
		$data['subcategory_det']=$this->My_model->select_where("subcategory",['subcategory_id'=>$subcategory_id]);
		$this->ov("edit_subcategory",$data);
	}
	public function save_updated_subcategory()
	{
		$this->uploadImage("subcategory_image");
		$cond=['subcategory_id'=>$_POST['subcategory_id']];
		$this->My_model->update("subcategory",$cond,$_POST);
		redirect(base_url().'admin/subcategory');

	}


	public function add_product()
	{
		$data['category']=$this->My_model->select("category");
		$this->ov("add_product",$data);
	}
	public function getsubcategory_by_ajax()
	{
		$data=$this->My_model->select_where("subcategory",['category_id'=>$_POST['category_id']]);
		echo json_encode($data);
	}
	public function save_product()
	{
		$images=[];
		for($i=0;$i<count($_FILES['product_image']['name']);$i++)
		{
			// print_r($_FILES['product_image']['name'][$i]);
			// echo "<br>";
			// print_r($_FILES['product_image']['tmp_name'][$i]);
			// echo "<br><br>";
			$img_name=time().$_FILES['product_image']['name'][$i];
			move_uploaded_file($_FILES['product_image']['tmp_name'][$i],'uploads/'.$img_name);
			$images[]=$img_name;
		}
		$_POST['product_image']=implode(" || ",$images);
		// $this->My_model->create_table("product",$_POST);
		$this->My_model->insert("product",$_POST);
		redirect(base_url()."admin/add_product");
	}
	public function product_list()
	{
		// $data['product']=$this->My_model->select("product");
		$data['product']=$this->db->query("SELECT * FROM category, product, subcategory WHERE category.category_id=product.category_id AND product.subcategory_id=subcategory.subcategory_id")->result_array();

		// print_r($data);
		$this->ov("product_list",$data);
	}
	public function edit_product($product_id)
	{
		$data['product']=$this->My_model->select_where("product",['product_id'=>$product_id]);

		$data['category']=$this->My_model->select("category");

		$data['subcategory']=$this->My_model->select_where("subcategory",['category_id'=>$data['product'][0]['category_id']]);

		$this->ov("edit_product",$data);
	}
	public function deleted_product_image($product_id,$img_key)
	{
		$product=$this->My_model->select_where("product",['product_id'=>$product_id]);
		$imgs=explode("||", $product[0]['product_image']);
		unset($imgs[$img_key]);
		$images=implode("||",$imgs);
		$this->My_model->update("product",['product_id'=>$product_id],['product_image'=>$images]);
		redirect(base_url()."admin/edit_product/".$product_id);
		// print_r($imgs);	
	}
	public function save_update_product()
	{
		$product=$this->My_model->select_where("product",['product_id'=>$_POST['product_id']]);
		$images=explode("||", $product[0]['product_image']);
		for($i=0;$i<count($_FILES['product_image']['name']);$i++)
		{
			if($_FILES['product_image']['name'][$i])
			{
				$img_name=time().$_FILES['product_image']['name'][$i];
				move_uploaded_file($_FILES['product_image']['tmp_name'][$i],'uploads/'.$img_name);
				$images[]=$img_name;
			}
		}
		
		$_POST['product_image']=implode(" || ",$images);

		$this->My_model->update("product",['product_id'=>$_POST['product_id']],$_POST);
		redirect(base_url()."admin/product_list");
	}

			// client side work

	public function basic_info()
	{
		$data['company_det']=$this->My_model->select("company_det");
		// print_r($data);
		$this->ov("basic_info",$data);
	}
	public function save_basic_information()
	{
		$this->uploadImage("company_logo");
		// echo "<pre>";
		print_r($_POST);
		print_r($_FILES);
		// $this->My_model->create_table("company_det",$_POST);
		// $this->My_model->insert("company_det",$_POST);
		$this->My_model->update("company_det",['company_det_id'=>1],$_POST);
		redirect(base_url()."admin/basic_info");
	}
	public function home_image()
	{
		$data['home_image_det']=$this->My_model->select("home_image");
		$this->ov("home_image",$data);
	}
	public function save_home_image()
	{
		$this->uploadImage('home_image_img');
		// print_r($_POST);
		// print_r($_FILES);
		// $this->My_model->create_table("home_image",$_POST);
		// $this->My_model->insert("home_image",$_POST);
		$this->My_model->update("home_image",['home_image_id'=>1],$_POST);
		redirect(base_url()."admin/home_image");
	}

	public function pending_orders()
	{
		$data['orders']=$this->My_model->select_where("order_tbl",['order_status'=>'pending']);
		$this->ov("pending_orders",$data);
	}
	public function dispatch_order($order_tbl_id)
	{
		$data['order_status']='dispatch';
		$data['dispatche_date']=date('Y-m-d');
		$this->My_model->update("order_tbl",['order_tbl_id'=>$order_tbl_id],$data);
		redirect(base_url()."admin/pending_orders");
	}
	public function dispatched_orders()
	{
		$data['orders']=$this->My_model->select_where("order_tbl",['order_status'=>'dispatch']);
		$this->ov("dispatched_orders",$data);
	}
	public function delivered_order($order_tbl_id)
	{
		$data['order_status']='delivered';
		$data['delivered_date']=date('Y-m-d');
		$this->My_model->update("order_tbl",['order_tbl_id'=>$order_tbl_id],$data);
		redirect(base_url()."admin/dispatched_orders");
	}
	public function delivered_orders()
	{
		$data['orders']=$this->My_model->select_where("order_tbl",['order_status'=>'delivered']);
		$this->ov("delivered_orders",$data);
	}
	public function view_order($order_tbl_id)
	{
		$data['order']=$this->My_model->select_where("order_tbl",['order_tbl_id'=>$order_tbl_id]);
		$data['order_products']=$this->My_model->select_where("order_det_tbl",['order_tbl_id'=>$order_tbl_id]);
		$data['user_det']=$this->My_model->select_where("user_tbl",['user_tbl_id'=>$data['order'][0]['user_tbl_id']]);
		$this->ov("view_order",$data);

	}

	


}
