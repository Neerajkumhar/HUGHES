/**
 * Hughes SF — premium single-page interactions.
 * Slow, restrained and sophisticated. Respects prefers-reduced-motion.
 */
(function () {
	'use strict';

	var motionOK = window.matchMedia('(prefers-reduced-motion: reduce)');

	/* ------------------------------------------------------------------
	 * 1. Sticky header state
	 * ---------------------------------------------------------------- */
	var header = document.getElementById('site-header');

	function onScrollHeader() {
		if (!header) return;
		var y = window.scrollY || window.pageYOffset;
		header.classList.toggle('is-scrolled', y > 40);
	}

	window.addEventListener('scroll', onScrollHeader, { passive: true });
	onScrollHeader();

	/* ------------------------------------------------------------------
	 * 2. Mobile menu
	 * ---------------------------------------------------------------- */
	var toggle = document.querySelector('[data-nav-toggle]');
	var menu = document.querySelector('[data-mobile-menu]');

	function setMenu(open) {
		if (!menu || !toggle) return;
		menu.classList.toggle('is-open', open);
		toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		menu.setAttribute('aria-hidden', open ? 'false' : 'true');
		header.classList.toggle('is-menu-open', open);
		document.body.style.overflow = open ? 'hidden' : '';
	}

	if (toggle) {
		toggle.addEventListener('click', function () {
			setMenu(toggle.getAttribute('aria-expanded') !== 'true');
		});
	}

	// Close the mobile menu when a link is chosen.
	if (menu) {
		menu.addEventListener('click', function (e) {
			if (e.target.closest('a')) setMenu(false);
		});
	}

	// Close on Escape.
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape') setMenu(false);
	});

	/* ------------------------------------------------------------------
	 * 3. Reveal on scroll (IntersectionObserver)
	 * ---------------------------------------------------------------- */
	var reveals = document.querySelectorAll('.reveal');

	if ('IntersectionObserver' in window && !motionOK.matches) {
		var revealObserver = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					revealObserver.unobserve(entry.target);
				}
			});
		}, {
			threshold: 0.12,
			rootMargin: '0px 0px -6% 0px'
		});

		reveals.forEach(function (el) { revealObserver.observe(el); });
	} else {
		// No IO or reduced motion: show everything immediately.
		reveals.forEach(function (el) { el.classList.add('is-visible'); });
	}

	/* ------------------------------------------------------------------
	 * 4. Capability hover preview (desktop, pointer devices only)
	 * ---------------------------------------------------------------- */
	var stage = document.querySelector('.capabilities__stage');
	var preview = document.querySelector('[data-capabilities-preview]');
	var previewImg = document.querySelector('[data-capabilities-preview-img]');
	var previewLabel = document.querySelector('[data-capabilities-preview-label]');
	var caps = document.querySelectorAll('.capability');
	var canPreview = window.matchMedia('(hover: hover) and (pointer: fine)');

	if (stage && preview && canPreview.matches) {
		var px = 0, py = 0, cx = 0, cy = 0, active = false, raf = null;

		function render() {
			cx += (px - cx) * 0.16;
			cy += (py - cy) * 0.16;
			preview.style.left = cx + 'px';
			preview.style.top = cy + 'px';
			raf = null;
		}

		function movePreview(x, y) {
			px = x;
			py = y;
			if (!raf) raf = requestAnimationFrame(render);
		}

		caps.forEach(function (cap) {
			cap.addEventListener('pointerenter', function () {
				active = true;
				previewImg.src = cap.dataset.img;
				previewImg.alt = cap.dataset.label || '';
				previewLabel.textContent = cap.dataset.label || '';
				preview.classList.add('is-active');
			});
			cap.addEventListener('pointermove', function (e) {
				if (active) movePreview(e.clientX, e.clientY);
			});
		});

		stage.addEventListener('pointerleave', function () {
			active = false;
			preview.classList.remove('is-active');
			previewImg.src = '';
		});
	}

	/* ------------------------------------------------------------------
	 * 5. Timeline progress line
	 * ---------------------------------------------------------------- */
	var timeline = document.querySelector('.timeline');

	function tickTimeline() {
		if (!timeline) return;
		var rect = timeline.getBoundingClientRect();
		var vh = window.innerHeight || document.documentElement.clientHeight;
		var total = rect.height + vh * 0.5;
		var passed = vh * 0.75 - rect.top;
		var p = Math.min(100, Math.max(0, (passed / total) * 100));
		timeline.style.setProperty('--progress', p.toFixed(1) + '%');
	}

	if (timeline) {
		window.addEventListener('scroll', tickTimeline, { passive: true });
		window.addEventListener('resize', tickTimeline);
		tickTimeline();
	}

	/* ------------------------------------------------------------------
	 * 6. Subtle hero parallax
	 * ---------------------------------------------------------------- */
	var heroMedia = document.querySelector('.hero__media');
	if (heroMedia && !motionOK.matches) {
		var heroRaf = false;

		function onParallax() {
			if (heroRaf) return;
			heroRaf = true;
			requestAnimationFrame(function () {
				var y = window.scrollY || window.pageYOffset;
				if (y < window.innerHeight) {
					heroMedia.style.transform = 'translateY(' + y * 0.16 + 'px)';
				}
				heroRaf = false;
			});
		}

		window.addEventListener('scroll', onParallax, { passive: true });
	}

	/* ------------------------------------------------------------------
	 * 7. Active navigation link highlighting
	 * ---------------------------------------------------------------- */
	var navLinks = document.querySelectorAll('.site-nav__link, .site-footer__nav .site-nav__link');
	var sections = ['work', 'capabilities', 'about', 'process', 'contact']
		.map(function (id) { return document.getElementById(id); })
		.filter(Boolean);

	var navObserver = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (!entry.isIntersecting) return;
			var id = entry.target.id;
			navLinks.forEach(function (link) {
				var active = link.getAttribute('href') === '#' + id;
				link.classList.toggle('is-active', active);
			});
		});
	}, { rootMargin: '-40% 0px -55% 0px' });

	sections.forEach(function (s) { navObserver.observe(s); });
})();