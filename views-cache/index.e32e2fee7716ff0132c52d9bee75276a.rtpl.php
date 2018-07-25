<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<div class="row my-5">
		<div class="col-12">
			<div class="w-100 mb-5">
				<div class="input-group mb-3">
					<input type="search" class="form-control" data-js="search">
				</div>
				<span data-js="load" style="position: fixed;"></span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">First</th>
						<th scope="col">Last</th>
						<th scope="col">Handle</th>
					</tr>
				</thead>
				<tbody data-js="table">
				</tbody>
			</table>

		</div>
	</div>
</div>

<script type="text/javascript" src="/vendor/structure/res/js/script.js"></script>