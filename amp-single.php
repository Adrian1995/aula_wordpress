<?php
global $post;
setup_postdata( $post );
?>
<!doctype html>
<html amp>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <title><?php echo get_the_title(); ?></title>
    <link rel="canonical" href="<?php echo get_the_permalink(); ?>" />
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <style amp-custom>
    </style>
  </head>
  <body>
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
    <footer class="footer" id="footer">
    </footer>
  </body>
</html>