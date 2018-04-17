<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>账单添加</title>
	<link rel="stylesheet" href="/home/css/exchange.css">
	<script  src="/js/jquery-1.11.1.min.js"></script>
	<script  src="/js/layer/layer.js"></script>
<link rel="stylesheet" type="text/css" href="/css/demo.css">
<style>
*{
	padding:0;
	margin:0;
	box-sizing: border-box;
	}
html{
	font-size:62.5%;
	background: #fafafa;
	}
.content {
	width:100%;
	padding: 0;
}
.form-group {
	width:100%;
	padding: 0 1rem;
	display: flex;
	flex-direction: row;
	align-items: center;
	background: #fff;
    padding-top: .8rem;
}
.form-group label{
	line-height: 4.2rem;
	font-size: 1.4rem;
	width: 10rem;
	text-align: right;
	border-bottom: 1px solid #aaa;
	color: #999;
	margin-right: .4rem;
}

.field-input ,.field-select{
	width:100%;
	padding:0 1rem;
	font-family:inherit;
	line-height: 4.2rem;
	height: 4.2rem;
	border: 0;
	font-size: 1.4rem;
	border-bottom: 1px solid #eee;
	outline:none;
	}
.field-input:focus{
	border-bottom: 1px solid #f60;
	}
.field-select{
	display: flex;
	flex-direction: row;
	}
.form-group select{
	border: 0;
	background: none;
	outline:none;
	width: 100%;
	}
.chang_button{
	padding: 2rem 1rem;
	background: #fff;
	}
.chang_button input[type=submit]{
	width: 100%;
	height: 4.2rem;
	background: #4CA0FF;
	border: 0;
	font-size: 1.6rem;
	color: #fff;
	border-radius: .4rem;
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
					<div class="field-select">
						<select name="project_Id" class="city pickout">
							@foreach($projects as $project)
							<option data-icon="&spades;" value="{{ $project->id }}">{{ $project->project_name ? $project->project_name : '暂无' }}</option>
							@endforeach
						</select>
					</div>
				</div>

				{{ csrf_field() }}
			<div class="form-group">
				<label for="name">品名:</label>
				<input type="text" name="name"  value="{{ old('name') }}" id="name" class="field-input" placeholder="请填写品名">
			</div>
				<div class="form-group">
					<label for="name">数量:</label>
					<input type="text" name="amount" value="{{ old('amount') }}" id="name"  class="field-input" placeholder="请填写数量">
				</div>
				<div class="form-group">
					<label for="state">经手人:</label>
					<div class="field-select">
						<select name="handle_Id" class="state pickout" >
							@foreach($handles as $handle)
								<option value="{{ $handle->id }}">{{ $handle->handle_name ? $handle->handle_name : '暂无' }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="name">运价:</label>
					<input type="text" name="price" value="{{ old('price') }}" id="name" class="field-input" placeholder="请填写运价">
				</div>
				<div class="form-group">
					<label for="name">现金支出:</label>
					<input type="text" name="cash_disburse" value="{{ old('cash_disburse') }}" id="cash_disburse" class="field-input" placeholder="请填写现金支出">
				</div>

				<div class="form-group">
				<label for="name2">现金回收:</label>
				<input type="text" name="cash_recover" value="{{ old('cash_recover') }}" id="cash_recover" class="field-input" placeholder="请填写现金回收">
			</div>
				<div class="form-group">
					<label for="name2">油卡支出:</label>
					<input type="text" name="oil_disburse" value="{{ old('oil_disburse') }}" id="cash_recover" class="field-input" placeholder="请填写油卡支出">
				</div>
				<div class="form-group">
					<label for="name2">油卡回收:</label>
					<input type="text" name="oil_recover" value="{{ old('oil_recover') }}" id="cash_recover" class="field-input" placeholder="请填写油卡回收">
				</div>

				<div class="form-group">
					<label for="name2">备注:</label>
					<input type="text" name="note" value="{{ old('note') }}" id="cash_recover" class="field-input" placeholder="请填写备注">
				</div>
				<div class="change_box" href="">
					<div class="chang_button">
						<input type="submit" value="添加">
						{{--<a href="go_exchange.html">兑换</a>--}}
					</div>
				</div>
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


</body>
</html>