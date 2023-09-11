<br>
<div class="container-fluid">
	<div class="row" >
		<div class="col-md-12 text-center mb-0" style="text-align:center; ">
			<h1 class="mb-0">Billing Slip</h1>
		</div>
		<div class="col-md-6 pr-3 pl-3 text-center" style="line-height:0; font-size: 20px;">
			<div class="pr-3 pl-3" >
				<h3>Name of Customer : <b><?=$bill[0]['fullname']?>,</b></h3>
				
				<p>Customer Mobile : <b><?=$bill[0]['phone']?>,</b></p>
				
				<p>Customer Email : <b><?=$bill[0]['email']?>,</b></p>
				<p>Customer Address : <b><?=$bill[0]['address_line1']?> <?=$bill[0]['address_line2']?>,</b></p>
				<p>City : <b><?=$bill[0]['city']?>,</b></p>
				<p>State : <b><?=$bill[0]['state']?></b></p>
				<p>Date : <b><?=$bill[0]['order_date']?></b></p>
			</div>
		</div>

<div class="col-md-12 " >
	<h1>Total Amount : &#8377; <?=number_format($bill[0]['order_ttl'])?></h1>
	
	<a href="<?=base_url()?>user/index" class="mt-0">
	<button class="btn btn-success btn-lg pt-0">Done</button>
	</a>
</div>
		
		
	</div>

</div>