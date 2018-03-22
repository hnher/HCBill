<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>账单添加</title>
	<script  src="/js/jquery-1.11.1.min.js"></script>
	<script  src="/js/layer/layer.js"></script>
<link rel="stylesheet" type="text/css" href="/css/demo.css">
<style>
*{padding:0;margin:0;}
.content {
	margin:50px auto 0;
	width:300px;
	min-height: 500px;
}

.form-group {
	width:100%;
	float:left;
	margin:5px 0;
}

label{
	margin-bottom:10px;
	float:left;			
}

.field-input, select{
	width:calc(100% - 20px);
	float:left;
	padding:10px;
	font-family:inherit;
}		
</style>

<!--必要样式-->
<link rel="stylesheet" href="/css/pickout.css">

</head>
<body>
<div class="container">
	<div class="content">		
		<form action="{{ url('store') }}" method="post">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
				<div class="form-group">
					<label for="city">项目名:</label>
					<select id="city" name="project_Id" class="city pickout" placeholder="选择项目">
						@foreach($projects as $project)
						<option data-icon="&spades;" value="{{ $project->id }}">{{ $project->project_name ? $project->project_name : '暂无' }}</option>
						@endforeach
					</select>
				</div>

				{{ csrf_field() }}
			<div class="form-group">
				<label for="name">品名:</label>
				<input type="text" name="name" id="name" class="field-input">
			</div>
				<div class="form-group">
					<label for="name">数量:</label>
					<input type="text" name="amount" id="name" class="field-input">
				</div>
				<div class="form-group">
					<label for="state">经手人:</label>
					<select id="state" name="handle_Id" class="state pickout" placeholder="选择经手人" >
						@foreach($handles as $handle)
							<option value="{{ $handle->id }}">{{ $handle->handle_name ? $handle->handle_name : '暂无' }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="name">运价:</label>
					<input type="text" name="price" value="{{ old('price') }}" id="name" class="field-input">
				</div>
				<div class="form-group">
					<label for="name">现金支出:</label>
					<input type="text" name="cash_disburse" value="{{ old('cash_disburse') }}" id="cash_disburse" class="field-input">
				</div>

				<div class="form-group">
				<label for="name2">现金回收:</label>
				<input type="text" name="cash_recover" value="{{ old('cash_recover') }}" id="cash_recover" class="field-input">
			</div>
				<div class="form-group">
					<label for="name2">油卡支出:</label>
					<input type="text" name="oil_disburse" value="{{ old('oil_disburse') }}" id="cash_recover" class="field-input">
				</div>
				<div class="form-group">
					<label for="name2">油卡回收:</label>
					<input type="text" name="oil_recover" value="{{ old('oil_recover') }}" id="cash_recover" class="field-input">
				</div>

				<div class="form-group">
					<label for="name2">备注:</label>
					<input type="text" name="note" value="{{ old('note') }}" id="cash_recover" class="field-input">
				</div>
				<tr>
					<td colspan="2" align="center"><input type="submit" class="adbak goback" value="添加"></td>
				</tr>
		</form>
	</div>
</div>
{{--添加删除成功弹出框--}}
@if(Session::has('status'))
	<script>
        layer.msg("{{Session::get('status')['msg']}}");
	</script>
	{{--layer.msg('玩命提示中');--}}
@endif
<script src="/js/pickout.js"></script>
<script>

	// Preparar o select
	//pickout.to('.pickout');
	pickout.to({
		el:'.city',
		theme: 'dark', 
		search: true
	});

	pickout.to({
		el:'.state',
		theme: 'clean',
	});

	// Caso o valor já venha do servidor, já atribui a seleção automaticamente
	pickout.updated('.city');
	
</script>

</body>
</html>