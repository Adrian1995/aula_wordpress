<?php
global $post;
setup_postdata( $post );

$thumb_amp = get_the_post_thumbnail_url(get_the_ID(), 'featured-image');
?>
<!doctype html>
<html amp>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <title><?php echo get_the_title(); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:200,300,400,500,700" rel="stylesheet" type="text/css">
    <link rel="canonical" href="<?php echo get_the_permalink(); ?>" />
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <style amp-custom>

    .amp-wp-title-bar {
      background: #42A3CE;
    }

    .amp-wp-title-bar amp-img {
      display: block;
      margin: 0 auto;
    }

    .amp-wp-title {
      font-size: 30px;
      font-family: Lato;
      text-align: center;
      max-width: 60%;
      margin: 20px auto;
    }

    ul.amp-wp-meta {
      list-style: none;
      font-family: Lato;
      margin: 20px auto;
      display: block;
      width: 60%;
    }
    ul.amp-wp-meta li {
      text-align: center;
    }

    amp-img#main {
      width: 60%;
      margin: 0 auto;
    }

    .article {
      width: 60%;
      margin: 0 auto;
      font-family: Lato;
      line-height: 1.5;
    }

    @media only screen and (max-width: 700px) {
      .amp-wp-title {
        max-width: 90%;
      }

      ul.amp-wp-meta {
        width: 90%;
      }

      amp-img#main {
        width: 100%;
      }

      .article {
        width: 90%;
      }
    }
    </style>
  </head>
  <body>
    <amp-analytics type="googleanalytics" id="analytics1">
    <script type="application/json">
    {
      "vars": {
        "account": "UA-XXXXX-Y"
      },
      "triggers": {
        "trackPageview": {
          "on": "visible",
          "request": "pageview"
        }
      }
    }
    </script>
    </amp-analytics>
    <div class="amp-content">
      <div class="amp-wp-title-bar">
        <a href="<?php echo get_home_url(); ?>">
          <amp-img
          src="<?php echo get_stylesheet_directory_uri(); ?>/imagens/logoamp.jpg"
          srcset="<?php echo get_stylesheet_directory_uri().'/imagens/logoamp.jpg 640w, '.get_stylesheet_directory_uri().'/imagens/logoamp.jpg 320w'; ?>"
          width="200"
          height="88">
          </amp-img>
        </a>
      </div>
      <h1 class="amp-wp-title"><?php echo get_the_title(); ?></h1>
      <ul class="amp-wp-meta">
        <li class="amp-excerpt"><?php echo get_the_excerpt(); ?></li>
      </ul>
      <?php
      if( has_post_thumbnail() ){
        ?>
        <amp-img
          id="main"
          src="<?php echo esc_url($thumb_amp); ?>"
          srcset="<?php echo esc_url($thumb_amp).' 640w, '.esc_url($thumb_amp).' 320w'; ?>"
          width="1920"
          height="1280"
          layout="responsive"
          alt="">
        </amp-img>
        <?php
      }
      ?>
      <div class="article">
        <div class="article-content">
          <?php
          $content = wpautop( get_the_content() );

          $allowed_html = array(
            'amp-img' => array(
              'src' => true,
              'srcset' => true,
              'width' => true,
              'height' => true,
              'layout' => true,
              'alt' => true
            ),
            'p' => array('align' => true),
            'a' => array(
              'href' => array(),
              'title' => array(),
            ),
            'span' => array(),
            'div' => array(),
            'b' => array(),
            'u' => array(),
            'strong' => array(),
            'iframe' => array(),
            'h1' => array('align' => true),
            'h2' => array('align' => true),
            'h3' => array('align' => true),
            'h4' => array('align' => true),
            'h5' => array('align' => true),
            'h6' => array('align' => true),
            'br' => array('align' => true),
            'i' => array(),
            'ul' => array(),
            'ol' => array(),
            'li' => array(),
            );

            echo wp_kses($content, $allowed_html);
          ?>
        </div>
      </div>
    </div>
    <!--
    <amp-ad
    layout="responsive"
    width=300
    height=250
    type="adsense"
    data-ad-client="ca-pub-xxxxx"
    data-ad-slot="99999999">
    </amp-ad>
    -->
    <footer class="footer" id="footer">
    </footer>
  </body>
</html>