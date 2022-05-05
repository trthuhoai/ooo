<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stamp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<nav id="sidebar">
		<a href="/" class="navbar-brand"><img src="/assets/img/logo.svg"></a>
		<div class="sidebar-header">
			<a href="/flow" class="btn btn-orange btn-block">利用開始の流れ</a>
			<a href="/receive" class="btn btn-orange btn-block">締結書類の確認方法</a>
		</div>

		<ul class="list-unstyled components">
<!--
			<li class="active">
				<a href="/operation">
					<span class="sub-cat-ja">操作方法</span>
					<span class="sub-cat-en">Operation</span>
				</a>
			</li>
-->
			<li>
				<a href="/機能紹介">
					<span class="sub-cat-ja">機能紹介</span>
					<span class="sub-cat-en">Function</span>
				</a>
			</li>
			<li>
				<a href="/法律">
					<span class="sub-cat-ja">法律</span>
					<span class="sub-cat-en">Legal</span>
				</a>
			</li>
			<li>
				<a href="/セキュリティ">
					<span class="sub-cat-ja">セキュリティ</span>
					<span class="sub-cat-en">Security</span>
				</a>
			</li>
			<li>
				<a href="/機能改修">
					<span class="sub-cat-ja">機能改修</span>
					<span class="sub-cat-en">Change Log</span>
				</a>
			</li>
			<li>
				<a href="/よくある質問">
					<span class="sub-cat-ja">よくある質問</span>
					<span class="sub-cat-en">Faq</span>
				</a>
			</li>
			<li>
				<a href="/導入事例">
					<span class="sub-cat-ja">導入事例</span>
					<span class="sub-cat-en">Case</span>
				</a>
			</li>
		</ul>
	</nav>
	<div id="content">
		<header id="header">
			<nav class="navbar navbar-expand-lg">
				<div class="container-fluid p-0">
					<a href="/" class="navbar-brand d-block d-sm-none"><img src="/assets/img/logo.svg"></a>
					<form role="search" method="get" class="form-inline" action="<?php echo home_url() ?>">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id=""><i class="material-icons">search</i></span>
							</div>
							<input type="search" class="form-control" value="" name="s" id="s" placeholder="回答を検索">
						</div>
					</form>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto">
							<li class="nav-item">
								<a href="https://stamp.ooo/login" target="_blank" class=" btn btn-link">ログイン</a>
							</li>
							<li class="nav-item">
								<a href="https://stamp.ooo/inquiry" target="_blank" class=" btn btn-orange">お問い合わせ</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="row">
				<div class="col-sm-12">
					<?php custom_breadcrumb(); ?>
				</div>
			</div>
		</header>

