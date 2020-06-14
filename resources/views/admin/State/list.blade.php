@extends('admin/layouts/app')
@section('main-content')
<div class="row">
	  <div class="col-12">
		<div class="card">
		  <div class="card-header">
		  <h4>State SCED Data</h4>
		  <div class="card-header-action"><a class="btn btn-outline-primary" href="{{ route('state.upload') }}">State SCED Upload Data</a>
		  	<a class="btn btn-outline-primary" href="javascript:void(0);" onclick="showAllColumnsForStateListOnPopUp()"><i class="fas fa-cog"></i></a>
		</div>
		</div>
		  <div class="card-body state-list">
			<div class="table-responsive">
			  <table class="table table-striped" id="table-1" style="width:280%">
				<thead>
				  <tr>
				  	<th class="text-center">#</th>
				  	@foreach($tablecolumnHeader as $tablecolumnHeaders)
				  	<th data-toggle="tooltip" data-placement="top" data-original-title="<?php echo ucwords(str_replace('_',' ',$tablecolumnHeaders->name)); ?>" ><?php  echo Illuminate\Support\Str::limit(ucwords(str_replace('_',' ',$tablecolumnHeaders->name)), 15); ?></th>
						<!-- <th style="font-size:10px;"> {{ strtoupper(str_replace('_',' ',$tablecolumnHeaders->name)) }} </th> -->
					 @endforeach
					 	<th class="text-center">Action</th>
				  </tr>
				</thead>
			   <tbody>	    
			<?php 
			 if($statescedData){
			 	$i=1;
				foreach($statescedData as $statescedDatas){
				//$feeldData=json_decode($statescedDatas->state_field); 
				?>
					<tr>
						<td><?php  echo $i; ?></td>
					<?php 
					foreach($tablecolumnHeader as $tablecolumnHeaders){
						$name = $tablecolumnHeaders->name;
				    ?>
						<td data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $statescedDatas->$name; ?>" ><?php  echo Illuminate\Support\Str::limit($statescedDatas->$name, 20); ?></td>
					<?php }  ?>

					<td><a class="btn btn-primary" href="{{ route('state.mapping', ['id' => $statescedDatas->id]) }}">Map </a></td>
				 </tr>
				<?php 
				 $i++;
			} }else { ?>

				<tr>
					<td colspan="10">
						<center style="font-size: 18px;color: red;font-weight: bold;">Data not founds.</center>
					</td>
				</tr>
			<?php } ?>
		
		</tbody>
	  </table>
	</div>
  </div>
</div>
</div>
</div>
<!-- Modal with form -->
@endsection