<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="robots" content="index, follow" />

	<!-- Read and update content attributes accordingly  -->

	<meta name="description" content="Welcome to my portfolio website. I am a front-end web developer and I specialize in creating user-friendly, responsive and accessible websites. Explore my projects, open-source work and contact me for any inquiries or collaborations." />

	<!-- Google / Search Engine Tags -->
	<meta itemprop="name" content="Bernard Andrean Sianturi's Portfolio">
	<meta itemprop="description" content="Welcome to my portfolio website. I am a fullstack web developer and I specialize in creating user-friendly, responsive and accessible websites. Explore my projects, open-source work and contact me for any inquiries or collaborations.">

	<!-- Reference screenshot of updated site's header in place of content -->
	<meta itemprop="image" content="assets/images/sharing-card.png">

	<!-- Facebook Meta Tags -->
	<meta property="og:url" content="">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Bernard Andrean Sianturi's Portfolio">
	<meta property="og:description" content="Welcome to my portfolio website. I am a fullstack web developer and I specialize in creating user-friendly, responsive and accessible websites. Explore my projects, open-source work and contact me for any inquiries or collaborations.">

	<!-- Reference screenshot of updated site's header in content -->
	<meta property="og:image" content="<?= base_url('assets/') ?>images/sharing-card.png">

	<!-- Twitter Meta Tags -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="Bernard Andrean Sianturi's Portfolio">
	<meta name="twitter:description" content="Welcome to my portfolio website. I am a fullstack web developer and I specialize in creating user-friendly, responsive and accessible websites. Explore my projects, open-source work and contact me for any inquiries or collaborations.">

	<!-- Reference screenshot of updated site's header in content -->
	<meta name="twitter:image" content="<?= base_url('assets/') ?>images/sharing-card.png">


	<!-- Update favicon href attribute with image of yourself -->
	<link rel="icon" type="image/png" href="<?= base_url('assets/') ?>images/favicon.ico">

	<!-- Preloading fonts for better performance -->

	<link rel="preload" href="<?= base_url('assets/') ?>fonts/Mona-Sans.woff2" as="font" type="font/woff2" crossorigin />

	<link rel="stylesheet" href="<?= base_url('assets/') ?>style.css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>preloader.css" />
	<script src="<?= base_url('assets/') ?>script.js" defer></script>
	<script src="https://kit.fontawesome.com/ade1e4701d.js" crossorigin="anonymous"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

	<!-- Your name here -->
	<title>Bernard Andrean S</title>
</head>

<body>

	<div id="preloader">
		<div id="container" class="container-preloader">
			<div class="animation-preloader">
				<svg width='74' height='96' viewbox='0 0 37 48' fill='none' xmlns='http://www.w3.org/2000/svg'>
					<path d='M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z' stroke="#fff" stroke-width='2'></path>
					<path d='M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34' stroke='#fff' stroke-width='2'></path>
					<path id="teabag" fill='#fff' fill-rule='evenodd' clip-rule='evenodd' d='M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z'>
					</path>
					<path id="steamL" d='M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' stroke='#fff'>
					</path>
					<path id="steamR" d='M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13' stroke='#fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
					</path>
				</svg>
			</div>
			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
		</div>
	</div>
	<script>
		const theme = localStorage.getItem("theme") || "dark";
		document.body.classList.add(theme);
	</script>

	<header class="header">

		<div class="menu-btn-container">
			<div class="container">
				<button type="button" class="menu-btn">
					<i class="fa-solid fa-bars"></i>
				</button>
			</div>
		</div>

		<nav class="nav hidden">
			<ol class="nav-items">
				<li class="nav-item"><a href="#">Home</a></li>
				<li class="nav-item"><a href="#work">My Work</a></li>
				<!-- <li class="nav-item"><a href="#blog">See Blog</a></li> -->
				<li class="nav-item"><a href="#skills">My Skills</a></li>
				<li class="nav-item">
					<a href="#contact" data-focused="last-focused">Contact</a>
				</li>
			</ol>
		</nav>

		<div class="container">
			<div class="header-textbox">
				<!-- Replace with your name and job title -->
				<h1 class="h1">
					Hi, I'm Bernard Andrean Sianturi<br />
				</h1>
				<h4>
					Fullstack Web Developer
				</h4>

				<div class="header-btns">
					<a href="#contact" class="btn btn-cta">Hire me</a>
					<a href="#work" class="btn btn-secondary">See my work</a>
				</div>
			</div>
		</div>
	</header>

	<main>
		<section class="work">
			<div class="container">
				<h2 class="h2" id="work">Selected Work</h2>
				<?php foreach ($portfolio->result() as $row) { ?>
					<div class="work-boxes">
						<div class="work-box">
							<div class="work-textbox">
								<!-- Add your project title here -->
								<h3 class="h3"><?= $row->title; ?></h3>
								<!-- Add small description of your project  -->
								<p class="work-text">
									<?= $row->description; ?>
								</p>
								<!-- Add technologies you used to build the project -->
								<ol class="work-technologies">
									<!-- <li>React</li>
									<li>Gatsby</li>
									<li>SCSS</li>
									<li>MDX</li> -->
									<?php foreach (explode(';', $row->tools) as $tool) { ?>
										<li><?= $tool; ?></li>
									<?php } ?>
								</ol>

								<div class="work-links">
									<!-- Add url of project in href attribute -->
									<a href="<?= $row->link; ?>" target="_blank" rel="noopener" class="link">Explore this project</a>

									<!-- Add link to project source code in href attribute if applicable otherwise feel free to delete or comment the markup -->
									<a href="<?= $row->link; ?>" target="_blank" rel="noopener" title="Source code">
										<img src="<?= base_url('assets/') ?>images/social-links/github.svg" alt="GitHub" loading="lazy" />
									</a>
								</div>
							</div>

							<!-- Update img src and alt attribute  -->

							<picture class="work-img">
								<img loading="lazy" src="<?= base_url('assets/images/portfolio-thumbnail/' . $row->thumbnail) ?>" alt="<?= $row->title; ?>" />
							</picture>
						</div>

					</div>
				<?php } ?>
			</div>
		</section>

		<!-- Update skills-img src, alt  and title attributes I have added some other logos in assets/images/skill for your convenience feel free to pick one if required  -->

		<section class="skills">
			<div class="container">
				<h2 class="h2" id="skills">My Toolkit</h2>
				<div class="skills-imgs">
					<?php foreach ($skills->result() as $row) { ?>
						<img src="<?= base_url('assets/images/skills-thumbnail/' . $row->image) ?>" alt="<?= $row->name; ?>" class="skills-img" loading="lazy" title="<?= $row->name; ?>">
					<?php } ?>
					</figure>
				</div>
			</div>
		</section>

		<section class="contact">
			<div class="container">
				<h2 class="h2" id="contact">Send Message</h2>
				<div class="contact-content">
					<form action="#" class="contact-form" netlify>
						<div class="form-field">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" required />
						</div>
						<div class="form-field">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" required inputmode="email" />
						</div>
						<div class="form-field">
							<label for="message">How can I help you?</label>
							<textarea name="message" id="message" required></textarea>
						</div>
						<button type="submit" class="btn btn-cta">Send</button>
					</form>
				</div>
			</div>
		</section>
	</main>

	<footer class="footer">
		<div class="container">
			<div class="footer-content">
				<!-- Update href and src attributes -->
				<nav>
					<ol class="footer-links">
						<li class="footer-link">
							<a title="GitHub" href="https://github.com/bersianturi" target="_blank" rel="noopener"><img loading="lazy" src="assets/images/social-links/github.svg" alt="GitHub" /></a>
						</li>
						<li class="footer-link">
							<a title="Instagram" href="https://instagram.com/bersianturi_" target="_blank" rel="noopener"><img loading="lazy" src="assets/images/social-links/instagram.svg" alt="Instagram" /></a>
						</li>
						<li class="footer-link">
							<a title="Linkedin" href="https://www.linkedin.com/in/bersianturi/" target="_blank" rel="noopener"><img loading="lazy" src="assets/images/social-links/linkedin.svg" alt="Linkedin" /></a>
						</li>
					</ol>
				</nav>
				<p class="footer-text"><a href="<?= base_url('admin') ?>" id="link-admin">
						&copy;</a>
					<script type="text/javascript">
						var year = new Date();
						document.write(year.getFullYear());
					</script> - Made with ❤️ by <a target="_blank" rel="noopener" href="https://github.com/bersianturi">Bernard Andrean S.</a>
				</p>
				<label class="theme-switch" for="theme-switch">
					<span>Dark Theme</span>
					<input type="checkbox" id="theme-switch" role="switch" />
				</label>
			</div>
		</div>
	</footer>
	<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				$('#container').addClass('loaded');
				// Once the container has finished, the scroll appears
				if ($('#container').hasClass('loaded')) {
					// It is so that once the container is gone, the entire preloader section is deleted
					$('#preloader').delay(700).queue(function() {
						$(this).remove();
					});
				}
			}, 3000);
		});
	</script>
</body>

</html>