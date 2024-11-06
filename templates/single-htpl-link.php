<?php
	$prefix      = '_htpl_';
	$description = get_post_meta( get_the_id(), $prefix . 'description', true );

	// favicon
	$favicon_url    = get_site_icon_url();
	$custom_favicon = htpl_get_option( 'favicon' );
	$favicon_url    = ( isset( $custom_favicon['url'] ) && $custom_favicon['url'] ) ? $custom_favicon['url'] : $favicon_url;
?>

<!doctype html>
<!-- HTML Tag For Default -->
<html lang="en-us">

<head>
	<meta charset="utf-8">
	<title><?php echo esc_html( get_the_title() ); ?></title>
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
	
	<?php if ( $description ) : ?>
		<meta name="description" content="<?php echo esc_attr( $description ); ?>">
	<?php else : ?>
		<meta name="description" content="<?php echo esc_attr__( 'Preview For - ', 'htpl-generator' ) . get_the_title(); ?>">
	<?php endif; ?>

	<meta name="robots" content="noindex, nofollow" />

	<link rel="canonical" href="<?php echo esc_url( get_permalink() ); ?>">

	<?php if ( $favicon_url ) : ?>
	<link rel="icon" type="image/png" href="<?php echo esc_url( $favicon_url ); ?>">
	<?php endif; ?>


	<!-- Style for Default Start -->
	<style>
		:root {
			--bs-blue: #0d6efd;
			--bs-indigo: #6610f2;
			--bs-purple: #6f42c1;
			--bs-pink: #d63384;
			--bs-red: #dc3545;
			--bs-orange: #fd7e14;
			--bs-yellow: #ffc107;
			--bs-green: #198754;
			--bs-teal: #20c997;
			--bs-cyan: #0dcaf0;
			--bs-white: #fff;
			--bs-gray: #6c757d;
			--bs-gray-dark: #343a40;
			--bs-primary: #146cf5;
			--bs-secondary: #6cb930;
			--bs-success: #198754;
			--bs-info: #0dcaf0;
			--bs-warning: #ffc107;
			--bs-danger: #dc3545;
			--bs-light: #f8f9fa;
			--bs-dark: #212529;
			--bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
			--bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
			--bs-gradient: linear-gradient(180deg, hsla(0, 0%, 100%, .15), hsla(0, 0%, 100%, 0))
		}

		*,
		:after,
		:before {
			box-sizing: border-box
		}

		@media (prefers-reduced-motion:no-preference) {
			:root {
				scroll-behavior: smooth
			}
		}

		body {
			margin: 0;
			font-family: var(--bs-font-sans-serif);
			font-size: 1rem;
			font-weight: 400;
			line-height: 1.75;
			color: #384a5f;
			background-color: #fff;
			-webkit-text-size-adjust: 100%;
			-webkit-tap-highlight-color: rgba(0, 0, 0, 0)
		}

		.h4,
		.h5,
		h4,
		h5 {
			margin-top: 0;
			margin-bottom: .5rem;
			font-weight: 500;
			line-height: 1.2;
			color: #024
		}

		.h4,
		h4 {
			font-size: calc(1.275rem + .3vw)
		}

		@media (min-width:1200px) {

			.h4,
			h4 {
				font-size: 1.5rem
			}
		}

		.h5,
		h5 {
			font-size: 1.25rem
		}

		p {
			margin-top: 0
		}

		address,
		p {
			margin-bottom: 1rem
		}

		address {
			font-style: normal;
			line-height: inherit
		}

		ul {
			padding-left: 2rem
		}

		dl,
		ul {
			margin-top: 0;
			margin-bottom: 1rem
		}

		ul ul {
			margin-bottom: 0
		}

		b {
			font-weight: bolder
		}

		a {
			color: #146cf5;
			text-decoration: underline
		}

		a:hover {
			color: #1056c4
		}

		a:not([href]):not([class]),
		a:not([href]):not([class]):hover {
			color: inherit;
			text-decoration: none
		}

		img,
		svg {
			vertical-align: middle
		}

		label {
			display: inline-block
		}

		button {
			border-radius: 0
		}

		button:focus:not(:focus-visible) {
			outline: 0
		}

		button,
		input {
			margin: 0;
			font-family: inherit;
			font-size: inherit;
			line-height: inherit
		}

		button {
			text-transform: none
		}

		[role=button] {
			cursor: pointer
		}

		[list]::-webkit-calendar-picker-indicator {
			display: none
		}

		[type=button],
		[type=submit],
		button {
			-webkit-appearance: button
		}

		[type=button]:not(:disabled),
		[type=submit]:not(:disabled),
		button:not(:disabled) {
			cursor: pointer
		}

		[type=search] {
			outline-offset: -2px;
			-webkit-appearance: textfield
		}

		iframe {
			border: 0
		}

		[hidden] {
			display: none !important
		}

		.container {
			width: 100%;
			padding-right: var(--bs-gutter-x, 15px);
			padding-left: var(--bs-gutter-x, 15px);
			margin-right: auto;
			margin-left: auto
		}

		@media (min-width:576px) {
			.container {
				max-width: 540px
			}
		}

		@media (min-width:768px) {
			.container {
				max-width: 720px
			}
		}

		@media (min-width:992px) {
			.container {
				max-width: 960px
			}
		}

		@media (min-width:1200px) {
			.container {
				max-width: 1140px
			}
		}

		@media (min-width:1400px) {
			.container {
				max-width: 1320px
			}
		}

		.row {
			--bs-gutter-x: 30px;
			--bs-gutter-y: 0;
			display: flex;
			flex-wrap: wrap;
			margin-top: calc(var(--bs-gutter-y) * -1);
			margin-right: calc(var(--bs-gutter-x) / -2);
			margin-left: calc(var(--bs-gutter-x) / -2)
		}

		.row>* {
			flex-shrink: 0;
			width: 100%;
			max-width: 100%;
			padding-right: calc(var(--bs-gutter-x) / 2);
			padding-left: calc(var(--bs-gutter-x) / 2);
			margin-top: var(--bs-gutter-y)
		}

		.col {
			flex: 1 0 0%
		}

		.row-cols-1>* {
			flex: 0 0 auto;
			width: 100%
		}

		.col-auto {
			flex: 0 0 auto;
			width: auto
		}

		@media (min-width:576px) {
			.row-cols-sm-2>* {
				flex: 0 0 auto;
				width: 50%
			}
		}

		@media (min-width:1200px) {

			.col-xl-3,
			.row-cols-xl-4>* {
				flex: 0 0 auto;
				width: 25%
			}

			.col-xl-6 {
				flex: 0 0 auto;
				width: 50%
			}
		}

		.btn {
			display: inline-block;
			font-weight: 400;
			line-height: 1.75;
			color: #384a5f;
			text-align: center;
			text-decoration: none;
			vertical-align: middle;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-color: transparent;
			border: 1px solid transparent;
			padding: .375rem .75rem;
			font-size: 1rem;
			border-radius: .25rem;
			transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
		}

		@media (prefers-reduced-motion:reduce) {
			.btn {
				transition: none
			}
		}

		.btn:hover {
			color: #384a5f
		}

		.btn:focus {
			outline: 0;
			box-shadow: 0 0 0 .25rem rgba(20, 108, 245, .25)
		}

		.btn.disabled,
		.btn:disabled {
			pointer-events: none;
			opacity: .65
		}

		.btn-secondary {
			color: #000;
			background-color: #6cb930;
			border-color: #6cb930
		}

		.btn-secondary:focus,
		.btn-secondary:hover {
			color: #000;
			background-color: #82c44f;
			border-color: #7bc045
		}

		.btn-secondary:focus {
			box-shadow: 0 0 0 .25rem rgba(92, 157, 41, .5)
		}

		.btn-secondary.active,
		.btn-secondary:active {
			color: #000;
			background-color: #89c759;
			border-color: #7bc045
		}

		.btn-secondary.active:focus,
		.btn-secondary:active:focus {
			box-shadow: 0 0 0 .25rem rgba(92, 157, 41, .5)
		}

		.btn-secondary.disabled,
		.btn-secondary:disabled {
			color: #000;
			background-color: #6cb930;
			border-color: #6cb930
		}

		.nav {
			flex-wrap: wrap;
			padding-left: 0;
			margin-bottom: 0;
			list-style: none
		}

		.card,
		.nav {
			display: flex
		}

		.card {
			position: relative;
			flex-direction: column;
			min-width: 0;
			word-wrap: break-word;
			background-color: #fff;
			background-clip: border-box;
			border: 1px solid rgba(0, 0, 0, .125);
			border-radius: .25rem
		}

		.d-flex {
			display: flex !important
		}

		.d-none {
			display: none !important
		}

		.border {
			border: 1px solid #dee2e6 !important
		}

		.flex-column {
			flex-direction: column !important
		}

		.flex-wrap {
			flex-wrap: wrap !important
		}

		.justify-content-end {
			justify-content: flex-end !important
		}

		.justify-content-center {
			justify-content: center !important
		}

		.align-items-center {
			align-items: center !important
		}

		.mt-4 {
			margin-top: 1.5rem !important
		}

		.mb-3 {
			margin-bottom: 1rem !important
		}

		.mb-n3 {
			margin-bottom: -1rem !important
		}

		.visible {
			visibility: visible !important
		}

		@media (min-width:576px) {
			.d-sm-block {
				display: block !important
			}
		}

		@media (min-width:768px) {
			.d-md-block {
				display: block !important
			}

			.d-md-none {
				display: none !important
			}

			.justify-content-md-between {
				justify-content: space-between !important
			}
		}

		@media (min-width:1200px) {
			.d-xl-block {
				display: block !important
			}

			.d-xl-flex {
				display: flex !important
			}

			.d-xl-none {
				display: none !important
			}
		}

		body {
			overflow: hidden;
			min-height: 100vh;
			padding-top: 70px
		}

		.preview-topbar {
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			width: 100%;
			padding: 15px 30px;
			background-color: #fff;
			box-shadow: 0 5px 10px rgba(0, 0, 0, .05)
		}

		@media only screen and (max-width:767px) {
			.preview-topbar {
				padding: 15px 20px
			}
		}

		.back-btn {
			font-weight: 700;
			line-height: 20px;
			display: flex;
			align-items: center;
			padding: 10px 0;
			text-decoration: none;
			color: #024
		}

		.back-btn svg {
			width: auto;
			height: 20px;
			margin-right: 6px
		}

		.back-btn:hover {
			color: #146cf5
		}

		.buy-btn {
			font-size: 14px;
			font-weight: 600;
			margin-left: auto;
			padding: 6px 20px;
			border-radius: 4px
		}

		.buy-btn,
		.buy-btn:hover {
			color: #fff
		}

		@media only screen and (max-width:575px) {
			.buy-btn {
				margin-right: 0
			}
		}

		#preview-frame {
			display: block;
			width: 100%;
			height: calc(100vh - 70px);
			margin: auto;
			transition: all .3s ease 0s
		}

		#preview-frame.mobile {
			max-width: 391px;
			max-height: 667px
		}


/* Button styling */
.btn {
	display: flex;
	align-items: center;
	font-size: 16px;
	color: #fff;
	background-color: #2a1445;
	padding: 7px 10px;
	border: none;
	border-radius: 24px;
	text-decoration: none;
	transition: background-color 0.3s ease;
 
	font-weight: 400;
	line-height: 1.75; 
	text-align: center;
	text-decoration: none;
	vertical-align: middle;
	cursor: pointer;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none; 
	border: 1px solid transparent;
	padding: .375rem .75rem;
	font-size: 1rem;
	border-radius: 24px;
	transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
}

.btn:hover {
	background-color: #3b205b;
}

/* Icon circle styling */
.icon-circle {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	background-color: #f3ff2d;
	border-radius: 50%;
	width: 32px; /* Adjust size as needed */
	height: 32px;
	margin: 0 10px;
}

/* SVG styling */
.icon-circle svg {
	width: 20px; /* Control SVG size */
	height: 20px;
	fill: #2a1445; /* SVG fill color */
}


/* Adjustments for alignment */
.back-btn {
	color: #F8FCFC;
	padding-right: 30px;
}
.back-btn:hover {
	color: #F8FCFC;
}

.back-btn .icon-circle {
	margin-right: 10px;
	margin-left: 0;
}

.buy-btn .icon-circle {
	margin-left: 10px;
	margin-right: 0;
}

.buy-btn .icon-circle {
	margin-left: 10px;
}
.buy-btn {
	padding-left: 30px;
}

	</style>
	<!-- Style for Default End -->
</head>
<body>
	<?php
		$iframe_url         = get_post_meta( get_the_id(), $prefix . 'iframe_url', true );
		$buynow_button_text = get_post_meta( get_the_id(), $prefix . 'buynow_button_text', true );
		$buynow_button_text = $buynow_button_text ? $buynow_button_text : esc_html__( 'Buy Now', 'htpl-generator' );
		$buynow_button_url  = get_post_meta( get_the_id(), $prefix . 'buynow_button_url', true );
		$back_button_text   = get_post_meta( get_the_id(), $prefix . 'back_button_text', true );
		$back_button_text   = $back_button_text ? $back_button_text : get_the_title();
		$back_button_link   = get_post_meta( get_the_id(), $prefix . 'back_button_link', true );
	?>
	<!-- Preview Top Bar Start -->

	<div class="preview-topbar">
		<a href="<?php echo ( $back_button_link ? esc_url( $back_button_link ) : '../' ); ?>" class="btn back-btn">
			<span class="icon-circle">
				   <!-- Left Arrow with Line SVG -->
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
						<path d="M15 4l-8 8 8 8M7 12H24" stroke="#2a1445" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				
			</span>
			<?php echo esc_html( $back_button_text ); ?>
		</a>
		<a href="<?php echo esc_url( $buynow_button_url ); ?>" class="btn buy-btn">
			<?php echo esc_html( $buynow_button_text ); ?>
			<span class="icon-circle">
				<!-- Right Arrow SVG -->
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
				<path d="M9 4l8 8-8 8M0 12H17" stroke="#2a1445" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
				
			</span>
		</a>
	</div>

	<!-- Preview Top Bar End -->

	<?php if ( $iframe_url ) : ?>

		<!-- iframe for Default Start -->
		<iframe width="300" height="300" id="preview-frame" src="<?php echo esc_url( $iframe_url ); ?>"></iframe>
		<!-- iframe for Default End -->

	<?php endif; ?>

</body>
</html>
