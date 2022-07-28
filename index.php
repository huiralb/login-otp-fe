<!doctype html>
<html lang="en">

<head>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/login.css' ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
</head>

<body>
	<div id="login-app" v-cloak>
		<div class="kuncie-hero min-h-screen bg-base-200">
			<div class="kuncie-hero-content flex-col lg:flex-row">
				<div class="text-center lg:text-left">
					<h1 class="text-5xl font-bold">Login now!</h1>
					<p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
						exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
				</div>
				<div class="kuncie-card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
					<div class="kuncie-card-body">
						<form @submit.prevent="login">
							<div class="kuncie-form-control">
								<input type="text" v-model="phone" placeholder="cth: 08123456789" class="kuncie-input kuncie-input-bordered rounded-full" />
							</div>
							<div class="kuncie-form-control mt-6">
								<button type="submit" class="kuncie-btn kuncie-btn-primary rounded-full">Lanjut</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Step 2 OTP -->
		<!-- <input type="checkbox" id="my-modal-5" class="kuncie-modal-toggle" /> -->
		<div class="kuncie-modal" :class="{'kuncie-modal-open': modal.otp}">
			<div class="kuncie-modal-box w-full sm:w-4/5 lg:w-3/5 max-w-5xl rounded-md p-4 pb-9 relative">
				<button class="kuncie-btn kuncie-btn-link text-left text-dark-berry absolute left-4 top-4" @click="modal.otp = false">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
					</svg>

				</button>

				<div class="w-9/12 mx-auto">
					<div class="mb-5 flex justify-center">
						<img src="<?php echo get_template_directory_uri() . '/img/logo.png' ?>" />
					</div>
					<div class="text-center">
						<h3 class="font-bold text-2xl">Masukkan kode verifikasi kamu</h3>
						<p class="text-dark-berry">Kami telah mengirimkan ke {{ phone }}</p>
					</div>

					<div class="min-h-[250px] flex flex-column items-center justify-center">
						<div v-if="loading">
							<img src="<?php echo get_template_directory_uri() . '/img/loader.svg' ?>" class="w-[56px]" />
						</div>
						<div v-else>
							<v-otp-input
								ref="otpInput1"
								:input-classes="{'kuncie-otp-input': true,  'has-error': false}"
								separator=""
								class="mt-20 mb-14 flex flex-row justify-center"
								:num-inputs="6"
								:should-auto-focus="true"
								input-type="tel"
								@on-change="handleOnChange"
								@on-complete="handleOnComplete"
							></v-otp-input>
							<p class="text-dark-berry text-center">Tidak menerima kode SMS?</p>
							<p class="text-gray-400 mb-5 text-center">Minta kode baru dalam waktu 00:{{ countdownTimer }}</p>
						</div>
					</div>

					<div class="text-gray-500 text-center py-4">
						Dengan melanjutkan, kamu menyetujui<br/>
						<strong>Syarat &amp; ketentuan</strong> dan <strong>kebijakan privasi</strong> Kuncie
					</div>
				</div>
			</div>
		</div>
	</div>

    <script src="<?php echo get_template_directory_uri() . '/js/vue.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/js/single-otp-input.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/js/otp-input.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/js/script.js' ?>"></script>
</body>

</html>