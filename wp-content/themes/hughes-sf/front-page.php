<?php
/**
 * Front page — the full Hughes SF single-page experience.
 *
 * @package Hughes_SF
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hughes_sf_contact = hughes_sf_contact();
$hughes_sf_img     = 'hughes_sf_asset';

/**
 * Capabilities — verified against the Hughes SF / Hughes & Co. services
 * and Insight HM offerings. Each maps to a real project/detail photograph.
 *
 * @return array
 */
function hughes_sf_capabilities() {
	return array(
		array( 'Custom Home Construction', 'atherton-3.webp' ),
		array( 'Residential Renovation', 'sf-11.webp' ),
		array( 'High-End Remodeling', 'project-3867-kitchen.jpg' ),
		array( 'Interior Construction', 'project-3867-interior.jpg' ),
		array( 'Custom Millwork', 'detail-1.webp' ),
		array( 'Kitchens & Bathrooms', 'belgrave-2.webp' ),
		array( 'Architectural Details', 'detail-4.webp' ),
		array( 'Project Management', 'belgrave-1.webp' ),
		array( 'Finishing & Craftsmanship', 'detail-6.webp' ),
		array( 'Home Care & Maintenance', 'chroma-5.jpg' ),
	);
}

get_header();
?>

<main id="main" class="site-main">

	<?php
	/* =========================================================================
	 * HERO
	 * ===================================================================== */
	?>
	<section class="hero" id="hero">
		<div class="hero__media">
			<img
				class="hero__img"
				src="<?php echo esc_url( hughes_sf_asset( 'img/hero.jpg' ) ); ?>"
				alt="Hughes SF custom home exterior in San Francisco"
				width="2400"
				height="1602"
				fetchpriority="high"
			>
		</div>
		<div class="hero__veil" aria-hidden="true"></div>

		<div class="hero__content">
			<p class="hero__wordmark reveal reveal--line">HUGHES SF</p>
			<h1 class="hero__title">
				<span class="hero__line reveal reveal--line">CUSTOM HOMES.</span>
				<span class="hero__line reveal reveal--line">BUILT WITH INTENTION.</span>
			</h1>
			<p class="hero__sub reveal reveal--fade">
				<?php esc_html_e( 'Thoughtfully built residential spaces where architecture, craftsmanship and everyday living come together.', 'hughes-sf' ); ?>
			</p>
			<a class="hero__cta reveal reveal--fade" href="#work">
				<?php esc_html_e( 'EXPLORE OUR WORK', 'hughes-sf' ); ?><span aria-hidden="true"> ↓</span>
			</a>
		</div>

		<span class="hero__scroll-hint" aria-hidden="true"></span>
	</section>

	<?php
	/* =========================================================================
	 * INTRODUCTION
	 * ===================================================================== */
	?>
	<section class="intro" id="intro">
		<div class="container">
			<div class="intro__grid">
				<h2 class="intro__title reveal reveal--line">
					<?php _e( 'WE BUILD<br>MORE THAN<br>HOMES.', 'hughes-sf' ); ?>
				</h2>
				<p class="intro__copy reveal reveal--fade">
					<?php esc_html_e( 'Hughes SF brings together construction expertise, craftsmanship, project coordination and an obsessive attention to detail to create exceptional residential spaces.', 'hughes-sf' ); ?>
				</p>
			</div>
		</div>

		<figure class="intro__figure reveal reveal--img">
			<img
				loading="lazy"
				src="<?php echo esc_url( hughes_sf_asset( 'img/project-3867-interior.jpg' ) ); ?>"
				alt="Interior of a custom home built by Hughes SF"
				width="2000"
				height="1525"
			>
		</figure>
	</section>

	<?php
	/* =========================================================================
	 * CAPABILITIES
	 * ===================================================================== */
	?>
	<section class="capabilities" id="capabilities">
		<div class="container">
			<div class="section-head">
				<p class="section-eyebrow reveal reveal--fade"><?php esc_html_e( 'Capabilities', 'hughes-sf' ); ?></p>
				<h2 class="section-title reveal reveal--line"><?php esc_html_e( 'WHAT WE DO', 'hughes-sf' ); ?></h2>
			</div>
		</div>

		<div class="capabilities__stage">
			<ul class="capabilities__list">
				<?php
				$i = 0;
				foreach ( hughes_sf_capabilities() as $cap ) :
					$i++;
					?>
					<li class="capability reveal reveal--fade" data-capability data-img="<?php echo esc_url( hughes_sf_asset( 'img/' . $cap[1] ) ); ?>" data-label="<?php echo esc_attr( $cap[0] ); ?>">
						<span class="capability__index"><?php echo esc_html( str_pad( (string) $i, 2, '0', STR_PAD_LEFT ) ); ?></span>
						<span class="capability__name"><?php echo esc_html( strtoupper( $cap[0] ) ); ?></span>
						<span class="capability__arrow" aria-hidden="true">↗</span>
					</li>
				<?php endforeach; ?>
			</ul>

			<div class="capabilities__preview" data-capabilities-preview aria-hidden="true">
				<img src="" alt="" data-capabilities-preview-img>
				<span class="capabilities__preview-label" data-capabilities-preview-label></span>
			</div>
		</div>
	</section>

	<?php
	/* =========================================================================
	 * SELECTED WORK
	 * ===================================================================== */
	?>
	<section class="work" id="work">
		<div class="container">
			<div class="section-head">
				<p class="section-eyebrow reveal reveal--fade"><?php esc_html_e( 'Portfolio', 'hughes-sf' ); ?></p>
				<h2 class="section-title reveal reveal--line"><?php esc_html_e( 'SELECTED WORK', 'hughes-sf' ); ?></h2>
			</div>
		</div>

		<!-- Project 01 — full-width cinematic -->
		<article class="project project--cinema">
			<figure class="project__media project__media--full reveal reveal--img">
				<img
					loading="lazy"
					src="<?php echo esc_url( hughes_sf_asset( 'img/project-3867-interior.jpg' ) ); ?>"
					alt="Washington Street residence — interior"
					width="2000" height="1525"
				>
			</figure>
			<div class="container">
				<header class="project__meta reveal reveal--fade">
					<h3 class="project__name"><?php esc_html_e( 'Washington Street Residence', 'hughes-sf' ); ?></h3>
					<p class="project__where"><?php esc_html_e( 'Presidio Heights · San Francisco, CA', 'hughes-sf' ); ?></p>
					<p class="project__type"><?php esc_html_e( 'Contemporary Custom Home', 'hughes-sf' ); ?></p>
				</header>
			</div>
		</article>

		<!-- Project 02 — asymmetric image + text -->
		<article class="project project--asym">
			<div class="container">
				<div class="project--asym__grid">
					<figure class="project__media project__media--tall reveal reveal--img">
						<img
							loading="lazy"
							src="<?php echo esc_url( hughes_sf_asset( 'img/atherton-5.webp' ) ); ?>"
							alt="Atherton Residence — exterior"
							width="1500" height="2250"
						>
					</figure>
					<div class="project--asym__body">
						<header class="project__meta project__meta--sticky reveal reveal--fade">
							<h3 class="project__name"><?php esc_html_e( 'Atherton Residence', 'hughes-sf' ); ?></h3>
							<p class="project__where"><?php esc_html_e( 'Atherton · Peninsula, CA', 'hughes-sf' ); ?></p>
							<p class="project__type"><?php esc_html_e( 'Custom Home Construction', 'hughes-sf' ); ?></p>
							<p class="project__note">
								<?php esc_html_e( 'A complete custom residence — exterior architecture, interior construction and finish work executed to a single exacting standard.', 'hughes-sf' ); ?>
							</p>
						</header>
						<figure class="project__media project__media--half reveal reveal--img">
							<img
								loading="lazy"
								src="<?php echo esc_url( hughes_sf_asset( 'img/atherton-2.webp' ) ); ?>"
								alt="Atherton Residence — detail"
								width="1500" height="1000"
							>
						</figure>
					</div>
				</div>
			</div>
		</article>

		<!-- Project 03 — two-image split -->
		<article class="project project--split container">
			<div class="project--split__grid">
				<figure class="project__media reveal reveal--img">
					<img
						loading="lazy"
						src="<?php echo esc_url( hughes_sf_asset( 'img/belgrave-1.webp' ) ); ?>"
						alt="Belgrave Residence — living space"
						width="1500" height="1125"
					>
				</figure>
				<figure class="project__media reveal reveal--img">
					<img
						loading="lazy"
						src="<?php echo esc_url( hughes_sf_asset( 'img/belgrave-3.webp' ) ); ?>"
						alt="Belgrave Residence — architectural detail"
						width="1500" height="2000"
					>
				</figure>
			</div>
			<header class="project__meta project__meta--split reveal reveal--fade">
				<h3 class="project__name"><?php esc_html_e( 'Belgrave Residence', 'hughes-sf' ); ?></h3>
				<p class="project__where"><?php esc_html_e( 'San Francisco, CA', 'hughes-sf' ); ?></p>
				<p class="project__type"><?php esc_html_e( 'Renovation & Interior Construction', 'hughes-sf' ); ?></p>
			</header>
		</article>

		<!-- Project 04 — full-width cinematic -->
		<article class="project project--cinema">
			<figure class="project__media project__media--full reveal reveal--img">
				<img
					loading="lazy"
					src="<?php echo esc_url( hughes_sf_asset( 'img/chroma-1.jpg' ) ); ?>"
					alt="Chroma SF — renovated modern residence"
					width="2000" height="1143"
				>
			</figure>
			<div class="container">
				<header class="project__meta reveal reveal--fade">
					<h3 class="project__name"><?php esc_html_e( 'Chroma SF', 'hughes-sf' ); ?></h3>
					<p class="project__where"><?php esc_html_e( 'San Francisco, CA', 'hughes-sf' ); ?></p>
					<p class="project__type"><?php esc_html_e( 'Residential Renovation', 'hughes-sf' ); ?></p>
				</header>
			</div>
		</article>
	</section>

	<?php
	/* =========================================================================
	 * CRAFTSMANSHIP
	 * ===================================================================== */
	?>
	<section class="craft" id="craft">
		<div class="container">
			<div class="section-head section-head--center">
				<p class="section-eyebrow reveal reveal--fade"><?php esc_html_e( 'Craftsmanship', 'hughes-sf' ); ?></p>
				<h2 class="section-title reveal reveal--line"><?php esc_html_e( 'DETAIL IS EVERYTHING.', 'hughes-sf' ); ?></h2>
			</div>
		</div>

		<div class="craft__grid">
			<?php
			$craft_items = array(
				array( 'detail-3.webp', 'Joinery' ),
				array( 'detail-2.webp', 'Material' ),
				array( 'detail-1.webp', 'Millwork' ),
				array( 'detail-4.webp', 'Surface' ),
				array( 'detail-5.webp', 'Fixture' ),
				array( 'detail-6.webp', 'Finish' ),
			);
			foreach ( $craft_items as $craft_item ) :
				?>
				<figure class="craft__item reveal reveal--img">
					<img
						loading="lazy"
						src="<?php echo esc_url( hughes_sf_asset( 'img/' . $craft_item[0] ) ); ?>"
						alt="<?php echo esc_attr( $craft_item[1] ); ?> detail from a Hughes SF project"
						width="1000" height="750"
					>
					<figcaption><?php echo esc_html( $craft_item[1] ); ?></figcaption>
				</figure>
			<?php endforeach; ?>
			<figure class="craft__item craft__item--text reveal reveal--fade">
				<p>
					<?php esc_html_e( 'Wood. Stone. Metal. Custom cabinetry, millwork and finished surfaces — the quietly exacting work that separates a house from a home.', 'hughes-sf' ); ?>
				</p>
			</figure>
		</div>
	</section>

	<?php
	/* =========================================================================
	 * THE HUGHES SF APPROACH
	 * ===================================================================== */
	?>
	<section class="approach" id="process">
		<div class="container">
			<div class="section-head">
				<p class="section-eyebrow reveal reveal--fade"><?php esc_html_e( 'The Hughes SF Approach', 'hughes-sf' ); ?></p>
				<h2 class="section-title reveal reveal--line"><?php _e( 'FROM VISION<br>TO FINISHED HOME.', 'hughes-sf' ); ?></h2>
			</div>
		</div>

		<ol class="timeline">
			<?php
			$stages = array(
				array( 'UNDERSTAND', __( 'Understand the property, the architecture, the lifestyle and the vision.', 'hughes-sf' ) ),
				array( 'PLAN', __( 'Coordinate design, materials, trades, timelines and construction.', 'hughes-sf' ) ),
				array( 'BUILD', __( 'Execute with precision, craftsmanship and attention to detail.', 'hughes-sf' ) ),
				array( 'COMPLETE', __( 'Deliver a finished residence designed to be lived in and enjoyed for years.', 'hughes-sf' ) ),
			);
			$i = 0;
			foreach ( $stages as $stage ) :
				$i++;
				?>
				<li class="timeline__stage reveal reveal--fade" style="--i:<?php echo esc_attr( $i ); ?>">
					<span class="timeline__index"><?php echo esc_html( str_pad( (string) $i, 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3 class="timeline__name"><?php echo esc_html( $stage[0] ); ?></h3>
					<p class="timeline__copy"><?php echo esc_html( $stage[1] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ol>
	</section>

	<?php
	/* =========================================================================
	 * MATERIALS & CRAFT
	 * ===================================================================== */
	?>
	<section class="materials" id="materials">
		<div class="container materials__head">
			<h2 class="section-title section-title--display reveal reveal--line"><?php esc_html_e( 'MATERIALS MATTER.', 'hughes-sf' ); ?></h2>
			<p class="materials__copy reveal reveal--fade">
				<?php esc_html_e( 'Exceptional spaces begin with exceptional materials — carefully selected, precisely installed and thoughtfully brought together.', 'hughes-sf' ); ?>
			</p>
		</div>

		<div class="materials__strip">
			<?php
			$materials = array(
				array( 'detail-6.webp', 'Natural Stone' ),
				array( 'belgrave-4.webp', 'Wood' ),
				array( 'atherton-6.webp', 'Glass & Light' ),
				array( 'project-3867-detail.jpg', 'Custom Cabinetry' ),
				array( 'sf-5.webp', 'Architectural Surface' ),
				array( 'detail-2.webp', 'Texture' ),
			);
			foreach ( $materials as $material ) :
				?>
				<figure class="materials__item reveal reveal--img">
					<img
						loading="lazy"
						src="<?php echo esc_url( hughes_sf_asset( 'img/' . $material[0] ) ); ?>"
						alt="<?php echo esc_attr( $material[1] ); ?>"
						width="1000" height="1000"
					>
					<figcaption><?php echo esc_html( $material[1] ); ?></figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</section>

	<?php
	/* =========================================================================
	 * SAN FRANCISCO
	 * ===================================================================== */
	?>
	<section class="sf" id="sf">
		<div class="container">
			<div class="sf__grid">
				<div class="sf__body">
					<p class="section-eyebrow reveal reveal--fade"><?php esc_html_e( 'Location', 'hughes-sf' ); ?></p>
					<h2 class="section-title reveal reveal--line"><?php esc_html_e( 'BUILT IN SAN FRANCISCO.', 'hughes-sf' ); ?></h2>
					<p class="sf__copy reveal reveal--fade">
						<?php esc_html_e( 'From historic residences to modern architecture, Hughes SF understands San Francisco homes — distinct styles, urban properties and the local construction considerations that come with building in this city.', 'hughes-sf' ); ?>
					</p>
					<p class="sf__copy sf__copy--small reveal reveal--fade">
						<?php esc_html_e( 'Serving San Francisco, the Peninsula and Marin County.', 'hughes-sf' ); ?>
					</p>
				</div>
				<figure class="sf__media reveal reveal--img">
					<img
						loading="lazy"
						src="<?php echo esc_url( hughes_sf_asset( 'img/sf-8.webp' ) ); ?>"
						alt="San Francisco residential architecture built by Hughes SF"
						width="1500" height="1965"
					>
				</figure>
			</div>
		</div>

		<figure class="sf__wide reveal reveal--img">
			<img
				loading="lazy"
				src="<?php echo esc_url( hughes_sf_asset( 'img/sf-9.webp' ) ); ?>"
				alt="San Francisco home — exterior"
				width="1500" height="1000"
			>
		</figure>
	</section>

	<?php
	/* =========================================================================
	 * INSIGHT HM
	 * ===================================================================== */
	?>
	<section class="insight" id="insight">
		<div class="insight__media" aria-hidden="true">
			<img loading="lazy" src="<?php echo esc_url( hughes_sf_asset( 'img/chroma-6.jpg' ) ); ?>" alt="" width="1600" height="1205">
		</div>
		<div class="insight__veil" aria-hidden="true"></div>

		<div class="container insight__content">
			<p class="section-eyebrow section-eyebrow--light reveal reveal--fade"><?php esc_html_e( 'Insight HM', 'hughes-sf' ); ?></p>
			<h2 class="section-title section-title--light reveal reveal--line">
				<?php _e( 'THE HOME DOESN\'T END<br>WHEN CONSTRUCTION DOES.', 'hughes-sf' ); ?>
			</h2>
			<p class="insight__copy reveal reveal--fade">
				<?php esc_html_e( 'For ongoing care and maintenance, Hughes SF clients can continue their relationship with the team through Insight HM.', 'hughes-sf' ); ?>
			</p>
			<a class="link-arrow link-arrow--light reveal reveal--fade" href="<?php echo esc_url( $hughes_sf_contact['insight'] ); ?>" target="_blank" rel="noopener">
				<?php esc_html_e( 'VISIT INSIGHT HM', 'hughes-sf' ); ?><span aria-hidden="true"> →</span>
			</a>
			<p class="insight__tag reveal reveal--fade"><?php esc_html_e( 'Home Maintenance & Care', 'hughes-sf' ); ?></p>
		</div>
	</section>

	<?php
	/* =========================================================================
	 * ABOUT HUGHES SF
	 * ===================================================================== */
	?>
	<section class="about" id="about">
		<div class="container">
			<div class="section-head">
				<p class="section-eyebrow reveal reveal--fade"><?php esc_html_e( 'About', 'hughes-sf' ); ?></p>
				<h2 class="section-title reveal reveal--line"><?php _e( 'BUILT ON CRAFT.<br>DEFINED BY DETAIL.', 'hughes-sf' ); ?></h2>
			</div>

			<div class="about__grid">
				<p class="about__lead reveal reveal--fade">
					<?php esc_html_e( 'Hughes SF is a high-end residential general contracting firm based in San Francisco, led by David Hughes — a builder raised in the family construction business with more than fifteen years of hands-on experience on custom residential projects.', 'hughes-sf' ); ?>
				</p>

				<div class="about__facts">
					<div class="about__fact reveal reveal--fade">
						<p class="about__fact-label"><?php esc_html_e( 'Experience', 'hughes-sf' ); ?></p>
						<p class="about__fact-value"><?php esc_html_e( '15+ Years', 'hughes-sf' ); ?></p>
						<p class="about__fact-note"><?php esc_html_e( 'Custom residential construction across San Francisco, the Peninsula and the Southeast.', 'hughes-sf' ); ?></p>
					</div>
					<div class="about__fact reveal reveal--fade">
						<p class="about__fact-label"><?php esc_html_e( 'Project Scale', 'hughes-sf' ); ?></p>
						<p class="about__fact-value"><?php esc_html_e( '$1M – $20M', 'hughes-sf' ); ?></p>
						<p class="about__fact-note"><?php esc_html_e( 'Complex timelines and budgets handled with a focused, flexible team.', 'hughes-sf' ); ?></p>
					</div>
					<div class="about__fact reveal reveal--fade">
						<p class="about__fact-label"><?php esc_html_e( 'Values', 'hughes-sf' ); ?></p>
						<p class="about__fact-value"><?php esc_html_e( 'Value · Integrity · Hard Work', 'hughes-sf' ); ?></p>
						<p class="about__fact-note"><?php esc_html_e( 'Fair and true in our dealings with clients, vendors and partners alike.', 'hughes-sf' ); ?></p>
					</div>
				</div>

				<figure class="about__media reveal reveal--img">
					<img
						loading="lazy"
						src="<?php echo esc_url( hughes_sf_asset( 'img/project-3867-kitchen.jpg' ) ); ?>"
						alt="Custom kitchen finished by Hughes SF"
						width="2000" height="1395"
					>
				</figure>
			</div>
		</div>
	</section>

	<?php
	/* =========================================================================
	 * PULL QUOTE — FOUNDER
	 * ===================================================================== */
	?>
	<section class="pullquote" id="voice">
		<blockquote class="pullquote__quote reveal reveal--line">
			<?php esc_html_e( '"I value hard work and preparation above all else. For the past eight years I have managed multiple and complex projects throughout the bay area — from 2,000 sq ft homes to 20,000 sq ft homes."', 'hughes-sf' ); ?>
		</blockquote>
		<cite class="pullquote__cite reveal reveal--fade">— David Hughes, Founder</cite>
	</section>

	<?php
	/* =========================================================================
	 * FINAL CTA
	 * ===================================================================== */
	?>
	<section class="cta" id="contact">
		<figure class="cta__media" aria-hidden="true">
			<img loading="lazy" src="<?php echo esc_url( hughes_sf_asset( 'img/chroma-1.jpg' ) ); ?>" alt="" width="2000" height="1143">
		</figure>
		<div class="cta__veil" aria-hidden="true"></div>

		<div class="container cta__content">
			<h2 class="cta__title">
				<span class="cta__line reveal reveal--line">LET'S BUILD</span>
				<span class="cta__line reveal reveal--line">SOMETHING</span>
				<span class="cta__line reveal reveal--line">EXCEPTIONAL.</span>
			</h2>
			<p class="cta__sub reveal reveal--fade">
				<?php esc_html_e( 'Have a residential project in mind?', 'hughes-sf' ); ?>
			</p>
			<a class="btn btn--light reveal reveal--fade" href="mailto:<?php echo esc_attr( $hughes_sf_contact['email'] ); ?>">
				<?php esc_html_e( 'START A CONVERSATION', 'hughes-sf' ); ?><span aria-hidden="true"> →</span>
			</a>

			<ul class="cta__contact reveal reveal--fade">
				<li>
					<a href="mailto:<?php echo esc_attr( $hughes_sf_contact['email'] ); ?>"><?php echo esc_html( $hughes_sf_contact['email'] ); ?></a>
				</li>
				<li>
					<a href="tel:<?php echo esc_attr( $hughes_sf_contact['phone_tel'] ); ?>"><?php echo esc_html( $hughes_sf_contact['phone'] ); ?></a>
				</li>
				<li><span><?php echo esc_html( $hughes_sf_contact['city'] ); ?></span></li>
			</ul>
		</div>
	</section>

</main>

<?php
get_footer();