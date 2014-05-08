<?php $this->load->view("_header");?>
<div id="main-header" class="page-header">
	<ul class="breadcrumb">
		<li>
	    	<i class="icon-home"></i><?php getHeader();?>
	        <span class="divider">&raquo;</span>
	    </li>
		<li>
	    	<a href="<?php echo site_url("money/receipt");?>">ข้อมูลใบเสร็จ</a>
			<span class="divider">&raquo;</span>
	    </li>
		<li>
	    	<a href="#">นำเข้าข้อมูลใบเสร็จรับเงิน</a>
	    </li>
	</ul>
	
	<h1 id="main-heading">
		บัญชี <span>นำเข้า ข้อมูลใบเสร็จรับเงิน</span>
	</h1>
</div>

<div id="main-content">

	<div class="row-fluid">
		<div class="span12">
			
			<?php echo savecomplete();?>
			<div class="widget">
			    <div class="widget-header">
			    	<span class="title">นำเข้าข้อมูล ใบเสร็จรับเงิน</span>
			    </div>
			     
			    <div class="widget-content form-container">
				    <?php echo form_open_multipart("",array("id"=>"frm","class"=>"form-horizontal"));?>
					    <div class="control-group">
					    	<label class="control-label">File : (*.xls)</label>
						    <div class="controls">
						    	<input type="file" name="excel" size="20">
						    </div>
					    </div>
					    <div class="form-actions">
					    	<input type="submit" name="commit" value="Submit" class="btn btn-primary">
					    </div>
				    <?php echo form_close();?>
					
					<div class='html'>
					</div>
					<!--
					<table width="700" class='table' border="1" align="center" cellpadding="0" cellspacing="0">
					<?
					for ($i = 1; $i <= $q->sheets[0]['numRows']; $i++) {
							?>
							<tr>
							<?
							for ($j = 1; $j <= $q->sheets[0]['numCols']; $j++) {
									echo "<td>";
									echo "\"".$q->sheets[0]['cells'][$i][$j]."\",";

									$field = "field".$i.$j;
									
									?>
									<input name="field<?=$i.$j;?>" type="hidden" value="<?=$q->sheets[0]['cells'][$i][$j];?>">
									<?
									echo "</td>";
							}
							?>
							</tr>
							<?

					}
					?>
					</table>
					-->

			    </div>
			</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view("_footer");?>
<script>
function clone(){
	$(".box").children().clone().appendTo(".loan").addClass("box2");
}
function del(obj){
	var del = $("a.del").size();
	if(del>1){
		$(obj).parent().remove();
	}
}
</script>