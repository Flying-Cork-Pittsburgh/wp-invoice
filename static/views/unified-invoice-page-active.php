<?php
/**
 * Unified Invoice Page template
 *
 * Displays Single invoice page
 */
global $invoice, $wpi_settings;
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) & !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width"/>
  <title><?php
    // Print the <title> tag based on what is being viewed.
    global $page, $paged;

    wp_title('|', true, 'right');

    // Add the blog name.
    bloginfo('name');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page()))
      echo " | $site_description";

    // Add a page number if necessary:
    if (($paged >= 2 || $page >= 2) && !is_404())
      echo esc_html(' | ' . sprintf(__('Page %s', 'twentyeleven'), max($paged, $page)));

    ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
  <?php wp_head(); ?>
  <!--[if lt IE 9]>
  <script src="http://cdnjs.com/libraries/html5shiv"></script>
  <script src="https://cdnjs.com/libraries/respond.js"></script>
  <![endif]-->
</head>

<body class="inner-pages">

  <header class="pageheader">

    <div class="container">

      <div class="row">

        <div class="col-sm-4">
          <?php if ( $logo_url = get_business_logo_url() ): ?>
            <div class="logo"><img style="max-width: 90px;" src="<?php echo $logo_url; ?>" alt="Logo" /></div>
          <?php endif; ?>
          <?php if ( $business_name = get_business_name() ): ?>
            <h1><?php echo $business_name; ?></h1>
          <?php endif; ?>
          <?php if ( $business_address = get_business_address() ): ?>
            <p><?php echo $business_address; ?></p>
          <?php endif; ?>
        </div>

        <div class="col-sm-5">
          <div class="contact">
            <?php if ( $business_email = get_business_email() ): ?>
            <p><span class="ico mail"></span>
              <a href="mailto:<?php echo $business_email; ?>"><?php echo $business_email; ?></a></p>
            <?php endif; ?>
            <?php if ( $business_phone = get_business_phone() ): ?>
              <p><span class="ico tel"></span> <?php echo $business_phone; ?></p>
            <?php endif; ?>
          </div>
        </div>

      </div>

      <div class="row top-nav-links">

        <div class="col-xs-6">
          <a href="#" class="btn btn-back"> <?php _e( 'My dashboard', ud_get_wp_invoice()->domain ); ?></a>
        </div>

        <div class="col-xs-6 text-right">
          <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default">PDF</button>
            <button type="button" class="btn btn-default">Print</button>
          </div>

          <a href="#" class="btn btn-pay">Pay With Paypal</a>
        </div>
      </div>

    </div><!--end /container-->

  </header><!--end /pageheader-->

  <div class="page-content">

    <div class="container">

      <div class="box-content">
        <div class="head-title">
          <h2>Invoice</h2>
        </div>

        <div class="box-inner-content">
          <div class="row invoice-head">
            <div class="col-sm-8">
              <div class="logo"><img src="<?php echo ud_get_wp_invoice()->path( 'static/img/logo.png', 'url' ); ?>" alt="WebChat App Inc" /></div>
              <h2>WebChat App Inc</h2>
              <p class="addr">8300 Riverwind Lane Unit 306 <span>Raleigh, NC 27617</span></p>
              <p><span>Email:</span> <a href="mailto:Support@usabilitydynamics.com">Support@usabilitydynamics.com</a></p>
              <p><span>Phone:</span> +1 916-432-3546</p>
            </div>

            <div class="col-sm-4">
              <div class="invoice-info-details">
                <p><span>Invoice ID</span>
                  414
                </p>

                <p><span>Issue Date</span>
                  August 25, 2015
                </p>

                <p><span>Due Date</span>
                  After 15 days
                </p>

                <p><span>Invoice for</span>
                  <i>Disco Donnie Presents</i>
                  SFX-Disco Operating, LLC<br/>
                  902 Broadway<br/>
                  New York, NY 10010
                </p>
              </div>
            </div>
          </div>

          <div class="invoice-desc">
            <h3>Discodonniepresents.com afterdark entertainment</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

          <div class="invoice-item-lists">
            <div class="table-responsive">
              <table class="table">
                <thead>
                <tr>
                  <th class="description">Description</th>
                  <th class="quantity">Quanitiy</th>
                  <th class="unit-price">Unit Price</th>
                  <th class="amount">Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>discodonniepresents.com - 09/08/2015 - CP Copywriting and Editing / Brittancy Gaston: #253:ddp - new online merch store</td>
                  <td>0.50</td>
                  <td>$35.00</td>
                  <td>$17.50</td>
                </tr>
                <tr>
                  <td>discodonniepresents.com - 09/08/2015 - CP Copywriting and Editing / Brittancy Gaston: #253:ddp - new online merch store</td>
                  <td>1.25</td>
                  <td>$35.00</td>
                  <td>$17.50</td>
                </tr>
                <tr>
                  <td>discodonniepresents.com - 09/08/2015 - CP Copywriting and Editing / Brittancy Gaston: #253:ddp - new online merch store</td>
                  <td>1.25</td>
                  <td>$35.00</td>
                  <td>$43.75</td>
                </tr>
                <tr class="total-row">
                  <td colspan="4"><span>Amount Due:</span> $335.75</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="notes-terms">
            <h3>Note</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <h3>Terms &amp; Condition</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

        </div><!--end /box-inner-content-->
      </div>

      <div class="invoice-history">
        <h4>Invoice History</h4>

        <div class="box-content">
          <div class="box-inner-content">
            <div class="row">
              <div class="col-md-2 label-item"><span class="label label-paid">Paid</span></div>
              <div class="col-md-7 description">Sent via e-mail to Charles Liao</div>
              <div class="col-md-3 date">17 May 2015, 3:11 PM</div>
            </div>
            <div class="row">
              <div class="col-md-2 label-item"><span class="label label-viewed">Viewed</span></div>
              <div class="col-md-7 description">Viewed by Charles Liao.</div>
              <div class="col-md-3 date">15 May 2015, 3:11 PM</div>
            </div>

            <div class="row">
              <div class="col-md-2 label-item"><span class="label label-sent">Sent</span></div>
              <div class="col-md-7 description">Sent via e-mail to Charles Liao by Eric for $320.00 USD</div>
              <div class="col-md-3 date">13 May 2015, 3:11 PM</div>
            </div>

            <div class="row">
              <div class="col-md-2 label-item"><span class="label label-created">Created</span></div>
              <div class="col-md-7 description">Created by Eric Sopp</div>
              <div class="col-md-3 date">11 May 2015, 3:11 PM</div>
            </div>
          </div><!--end /box-inner-content-->
        </div>
      </div>

    </div><!--end /container-->

  </div><!--end /page-content-->

  <footer class="pagefooter">
    <div class="container">
      <p>Powered by <span><img src="<?php echo ud_get_wp_invoice()->path( 'static/img/wp-invoice.png', 'url' ); ?>" alt="WP-Invoice" /></span> WP-Invoice</p>
    </div><!--end /container-->
  </footer><!--end /pagefooter-->

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <div id="invoice_page" class="wpi_invoice_form wpi_payment_form clearfix">
    <div class="wpi_left_col">
      <h3 class="wpi_greeting"><?php echo sprintf(__('Welcome, %s!', ud_get_wp_invoice()->domain), recipients_name(array('return' => true))) ?></h3>

      <div class="invoice_description">
        <div class="invoice_top_message">
          <?php if (is_quote()) : ?>
            <p><?php echo sprintf(__('We have sent you a quote in the amount of %s.', ud_get_wp_invoice()->domain), balance_due(array('return' => true))) ?></p>
          <?php endif; ?>

          <?php if (!is_quote()) : ?>
            <p><?php echo sprintf(__('We have sent you invoice %1s with a balance of %2s.', ud_get_wp_invoice()->domain), invoice_id(array('return' => true)), balance_due(array('return' => true))); ?></p>
          <?php endif; ?>

          <p><?php wpi_invoice_due_date(); ?></p>

          <?php if (is_recurring()): ?>
            <p><?php _e('This is a recurring bill.', ud_get_wp_invoice()->domain) ?></p>
          <?php endif; ?>

        </div>
        <div class="invoice_description_custom">
          <?php the_description(); ?>
        </div>

        <?php if (is_payment_made()): ?>
          <?php _e("You've made payments, but still owe:", ud_get_wp_invoice()->domain) ?> <?php balance_due(); ?>
        <?php endif; ?>
      </div>

      <div class="wpi_itemized_table">
        <?php show_itemized_table(); ?>
      </div>

      <?php do_action('wpi_front_end_left_col_bottom'); ?>
    </div>

    <div class="wpi_right_col">

      <?php if (show_business_info()) { ?>
        <?php wp_invoice_show_business_information(); ?>
      <?php } ?>

      <?php if (!is_quote()) { ?>
        <div class="wpi_checkout">
          <?php if (allow_partial_payments()): ?>
            <?php show_partial_payments(); ?>
          <?php endif; ?>

          <?php show_payment_selection(); ?>

          <?php
          $method = !empty($invoice['default_payment_method']) ? $invoice['default_payment_method'] : 'manual';
          if ($method == 'manual') {
            ?>
            <p><strong><?php _e('Manual Payment Information', ud_get_wp_invoice()->domain); ?></strong></p>
            <p><?php echo !empty($wpi_settings['manual_payment_info']) ? $wpi_settings['manual_payment_info'] : __('Contact site Administrator for payment information please.', ud_get_wp_invoice()->domain); ?></p>
          <?php
          } else {
            if (!empty($wpi_settings['installed_gateways'][$method])) {
              $wpi_settings['installed_gateways'][$method]['object']->frontend_display($invoice);
            } else {
              _e('Sorry, there is no payment method available. Please contact Administrator.', ud_get_wp_invoice()->domain);
            }
          }
          apply_filters("wpi_closed_comments", $invoice);
          ?>
        </div>
      <?php } ?>
      <div class="clear"></div>
      <div class="wpi_front_end_right_col_bottom">
        <?php do_action('wpi_front_end_right_col_bottom'); ?>
      </div>

    </div>
  </div>
</body>

<?php wp_footer(); ?>

</html>