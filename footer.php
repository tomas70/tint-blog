<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TINT_Blog
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer hidden-md-down" role="contentinfo">
		<div class="container-fluid nopadding">
            <div class="row footer-nav">
                <div class="container">
                    <div class="row">
                    <div class="col-md-2 offset-md-1">
                        <h3>Product</h3>
                        <ul class="list-group hidden-sm-down">
                            <li><a href="">Features</a></li>
                            <li><a href="">Use Cases</a></li>
                            <li><a href="">Integrations</a></li>
                            <li><a href="">Security</a></li>
                            <li><a href="">Support</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>Free Tools</h3>
                        <ul class="list-group hidden-sm-down">
                            <li><a href="">Instagram Contest Tool</a></li>
                            <li><a href="">Hashtag Report</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>Resources</h3>
                        <ul class="list-group hidden-sm-down">
                            <li><a href="">Case Studies</a></li>
                            <li><a href="">Webinars</a></li>
                            <li><a href="">eBooks</a></li>
                            <li><a href="">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>Company</h3>
                        <ul class="list-group hidden-sm-down">
                            <li><a href="">About Us</a></li>
                            <li><a href="">Our Clients</a></li>
                            <li><a href="">In the Press</a></li>
                            <li><a href="">Industries</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>Connect</h3>
                        <ul class="list-group hidden-sm-down">
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Partnerships</a></li>
                            <li><a href="">Careers</a></li>
                            <li><i class="fa fa-twitter" aria-hidden="true"></i> <i class="fa fa-linkedin" aria-hidden="true"></i> <i class="fa fa-facebook" aria-hidden="true"></i> <i class="fa fa-instagram" aria-hidden="true"></i></li>
                        </ul>
                        <div class="follow-red hidden-sm-up">
                            <i class="fa fa-twitter" aria-hidden="true"></i> <i class="fa fa-linkedin" aria-hidden="true"></i> <i class="fa fa-facebook" aria-hidden="true"></i> <i class="fa fa-instagram" aria-hidden="true"></i></li>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            
                <div class="row footer">
                    <div class="container">
                    <div class="row">
                    <div class="col-lg-4 offset-lg-1">
                        <p>TINT © 2017 All Rights Reserved. Terms and Privacy</p>
                    </div>
                    <div class="col-lg-4 offset-lg-2">
                        <form class="form-inline">
                          <div class="form-group">
                            <label for="InputEmail">Newsletter:</label>
                            <input type="email" class="form-control" id="InputEmail" size="22" placeholder="yourname@company.com">
                          </div>
                          <button type="submit" class="btn btn-default btn-login">Sign up</button>
                        </form>
                    </div>
                </div>
                </div>
            <!-- /.row footer -->
            </div>
        </div>
        <!-- /.container-fluid -->
	</footer><!-- #colophon -->
    <script type="text/javascript">
        $(window).scroll(function(event) {
            function footer()
            {
                var scroll = $(window).scrollTop(); 
                if(scroll > 300)
                { 
                    $(".footer-up").fadeIn("slow").addClass("show");
                }
                else
                {
                    $(".footer-up").fadeOut("slow").removeClass("show");
                }
                
                clearTimeout($.data(this, 'scrollTimer'));
                $.data(this, 'scrollTimer', setTimeout(function() {
                    if ($('.footer-up').is(':hover')) {
                        footer();
                    }
                    else
                    {
                        $(".footer-up").fadeOut("slow");
                    }
                }, 3000));
            }
            footer();
        });
    </script>
    <script type="text/javascript">
        $(function(){
            $('#submit').click(function(){
                $('#subscribe').fadeIn(500);
                $('#overlay').fadeIn(500);
            });
            $('#overlay').click(function(){
                $('#subscribe').fadeOut(500);
                $('#overlay').fadeOut(500);
            });
            $('#close').click(function(){
                $('#subscribe').fadeOut(500);
                $('#overlay').fadeOut(500);
            });
        });
    </script>
    <div class="container-fluid footer-up hidden-sm-up">
        <div class="row">
            <div class="col-12">
                <form class="form-inline justify-content-center align-middle">
                    <div class="form-group">
                        <label>MARKETING NEWS DELIVERED WEEKLY TO YOUR INBOX</label>
                        <div id="submit" class="btn btn-default btn-login">Sign up!</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- #page -->
<div id="overlay"></div>
    <div id="subscribe" class="container">
        <div class="row">
            <div class="col">
                <button type="reset" id="close" class="reset"><i class="fa fa-times" aria-hidden="true"></i></button>
                <h1>Subscribe to our blog</h1>
                <p>The latest strategies and superpowers delivered to your inbox.</p>
                <form>
                    <div class="form-group">
                        <input type="email" class="form-control" id="InputEmail" size="22" placeholder="yourname@company.com">
                        <button type="submit" class="btn btn-default btn-login">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>
