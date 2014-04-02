<header class="page-header">
	<h1>Administrator Panel</h1>

</header>
<div class="container">

	<ul class="nav nav-tabs nav-justified">
	  <li><a href="<?php echo base_url('admin/dashboard');?>">Users</a></li>
	  <li class="active"><a href="#">Authors</a></li>
	  <li><a href="#">Groups</a></li>
	  <li><a href="#">Messages</a></li>
	  <li><a href="#">Reports</a></li>
	</ul>
</div>

<div class="container" id="#users">
	<div class="page-header">
		<table class="table table-responsive">
		        <thead>
		          <tr class="active">
		            <th>Gravator</th>
		            <th>Username</th>
		            <th>Category</th>
		            <th>Specialization</th>
		            <th>Work Place</th>
		            <th>Experiance</th>
		            <th>Status</th>
		            <th>Actions</th>
		          </tr>
		        </thead>
		       
		        <tbody>
		        <?php if(!empty($authors)) foreach($authors as $author):?>
		          <?php if($author->activate):?>  
		          <tr class="success">
		          	<td><img class="img-rounded" src="<?php echo IMG.'account_pics/'.$this->gravator($author->username);?>" alt="Avatar"  width="48" height="45" ></td>
		            <td><?php echo $author->username;?></td>
		            <td><?php echo $this->show_category($author->category_id);?></td>
		            <td><?php echo $author->specialization;?></td>
		            <td><?php echo $author->working_place;?></td>
		            <td><?php echo $author->experience;?></td>
		            
		            <td>Aproved
		            	
		            </td>
		            <td>
		            	<a id="edit" href="<?php echo base_url('admin/dashboard/activate/'.$author->id);?>"><i title="edit" id="edit" data-toggle="tooltip" data-placement="top" class="glyphicon glyphicon-edit"></i></a>
		            	<a href="<?php echo base_url('admin/dashboard/delete_author/'.$author->id);?>"><i title="delete" class="glyphicon glyphicon-remove-circle"></i><a>

		            	<a href="<?php echo base_url('admin/dashboard/block_author/'.$author->id);?>"><i title="block" class="glyphicon glyphicon-minus-sign"></i></a>
		            </td>
		           
		          </tr>
		          <?php else:?>
		          <tr class="warning">
		          	<tr class="warning">
		          	<td><img class="img-rounded" src="<?php echo IMG.'account_pics/'.$this->gravator($author->username);?>" alt="Avatar"  width="48" height="45" ></td>
		            <td><?php echo $author->username;?></td>
		            <td><?php echo $this->show_category($author->category_id);?></td>
		            <td><?php echo $author->specialization;?></td>
		            <td><?php echo $author->working_place;?></td>
		            <td><?php echo $author->experience;?></td>
		            <td>Not Approved</td>
		            <td>
		            	<a id="activate" href="<?php echo base_url('admin/dashboard/approve_author/'.$author->id);?>"><i title="activate" class="glyphicon glyphicon-ok-circle"></i></a>
		            	<a href="<?php echo base_url('admin/dashboard/delete_author/'.$author->id);?>"><i title="delete" class="glyphicon glyphicon-remove-circle"></i></a>
		            </td>
		          </tr>
		          <?endif;?>
		         <?php endforeach;?>
		        </tbody>
		        <?php echo $this->controller->pagination->create_links();?>
		      </table>

	
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#activate').on('click',function(e){
			//e.preventDefault();
			var urla=$(this).attr('href')
			$.ajax({
				url:urla,
				type:'POST',
				success:function(data){
					$('html').html(data);
				}
			})
		})
	});
</script>