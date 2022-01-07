<ol class="bg-info text-light breadcrumb mb-4">
<li class="breadcrumb-item">Admin</li>
<?php if($pagename=='admin'){$pagenames='';}else{$pagenames='/'.$pagename;}?>
<li class="breadcrumb-item"><a class="text-white" href="<?php echo base_url().'admin'.$pagenames;?>"><?php echo $title;  ?></a></li>
</ol>