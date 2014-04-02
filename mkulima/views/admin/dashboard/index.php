<header class="page-header">
	<h1>Administrator Panel</h1>

</header>
<div class="container">

	<ul class="nav nav-tabs nav-justified">
	  <li class="active"><a href="#">Users</a></li>
	  <li><a href="<?php echo base_url('admin/dashboard/authors');?>">Authors</a></li>
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
		            <th>First Name</th>
		            <th>Last Name</th>
		            <th>Email</th>
		            <th>Username</th>
		            <th>Created</th>
		            <th>Status</th>
		            <th>Actions</th>
		          </tr>
		        </thead>
		        <tbody>
		        <?php if(!empty($users))foreach($users as $user):?>
		          <?php if($user->active):?>  
		          <tr class="success">
		          	<td><img class="img-rounded" src="<?php echo IMG.'account_pics/'.$user->gravator;?>" alt="Avatar"  width="48" height="45" ></td>
		            <td><?php echo $user->first_name;?></td>
		            <td><?php echo $user->last_name;?></td>
		            <td><?php echo $user->email;?></td>
		            <td><?php echo $user->username;?></td>
		            <td><?php echo $this->timing($user->created_on);?></td>
		            <td>Active</td>
		            <td>
		            	<a id="edit" href="<?php echo base_url('admin/dashboard/activate/'.$user->id);?>"><i title="edit" id="edit" data-toggle="tooltip" data-placement="top" class="glyphicon glyphicon-edit"></i></a>
		            	<a href="<?php echo base_url('admin/dashboard/delete_user/'.$user->id);?>"><i title="delete" class="glyphicon glyphicon-remove-circle"></i><a>

		            	<a href="<?php echo base_url('admin/dashboard/block/'.$user->id);?>"><i title="block" class="glyphicon glyphicon-minus-sign"></i></a>
		            </td>
		           
		          </tr>
		          <?php else:?>
		          <tr class="warning">
		          	<td><img class="img-rounded" src="<?php echo IMG.'account_pics/'.$user->gravator;?>" alt="Avatar"  width="48" height="45" ></td>
		            <td><?php echo $user->first_name;?></td>
		            <td><?php echo $user->last_name;?></td>
		            <td><?php echo $user->email;?></td>
		            <td><?php echo $user->username;?></td>
		            <td><?php echo $this->timing($user->created_on);?></td>
		            <td>Not active</td>
		            <td>
		            	<a id="activate" href="<?php echo base_url('admin/dashboard/activate/'.$user->id);?>"><i title="activate" class="glyphicon glyphicon-ok-circle"></i></a>
		            	<i title="delete" class="glyphicon glyphicon-remove-circle"></i>
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