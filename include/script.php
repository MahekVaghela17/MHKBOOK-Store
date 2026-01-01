<script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/stellar.js"></script>
  <script src="vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendors/counter-up/jquery.counterup.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/theme.js"></script>
  <script>
    (function($){
      $(function(){
        // Only run on single-product.php pages (detect presence of tabs)
        if (!$('#review-tab').length || !$('#contact-tab').length) return;

        function getProductId(){
          var m = /[?&]id=(\d+)/.exec(window.location.search);
          return m ? parseInt(m[1], 10) : 0;
        }
        var productId = getProductId();
        if (!productId) return;

        // COMMENT form wiring
        var $commentForm = $('#contact .review_box form');
        if ($commentForm.length){
          if ($commentForm.find('input[name=form_type]').length === 0){
            $commentForm.prepend('<input type="hidden" name="form_type" value="comment">');
          }
          if ($commentForm.find('input[name=product_id]').length === 0){
            $commentForm.prepend('<input type="hidden" name="product_id" value="'+productId+'">');
          }
          $commentForm.attr('action', 'submit_feedback.php');
          var $cList = $('<div class="mt-3" id="comments_list"></div>');
          if (!$('#comments_list').length){ $commentForm.after($cList); }
        }

        // REVIEW form wiring
        var $reviewForm = $('#review .review_box form');
        if ($reviewForm.length){
          if ($reviewForm.find('input[name=form_type]').length === 0){
            $reviewForm.prepend('<input type="hidden" name="form_type" value="review">');
          }
          if ($reviewForm.find('input[name=product_id]').length === 0){
            $reviewForm.prepend('<input type="hidden" name="product_id" value="'+productId+'">');
          }
          if ($reviewForm.find('input[name=rating]').length === 0){
            $reviewForm.prepend('<input type="hidden" name="rating" value="5">');
          }
          $reviewForm.attr('action', 'submit_feedback.php');
          var $rList = $('<div class="mt-3" id="reviews_list"></div>');
          if (!$('#reviews_list').length){ $reviewForm.after($rList); }
        }

        // Star rating clicks (set hidden rating input)
        $('#review .list li').each(function(idx){
          $(this).on('click', function(e){
            e.preventDefault();
            var val = idx + 1;
            $reviewForm.find('input[name=rating]').val(val);
            // Visual feedback: highlight stars
            $('#review .list li a i').removeClass('text-warning');
            $('#review .list li:lt(' + val + ') a i').addClass('text-warning');
          });
        });

        function loadLists(){
          $('#comments_list').load('product_feedback_list.php?type=comment&product_id='+productId);
          $('#reviews_list').load('product_feedback_list.php?type=review&product_id='+productId);
        }
        loadLists();

        function bindAjax($form){
          $form.on('submit', function(e){
            e.preventDefault();
            var $btn = $form.find('button[type=submit]');
            $btn.prop('disabled', true);
            $.ajax({
              url: $form.attr('action'),
              method: 'POST',
              data: $form.serialize(),
              dataType: 'json'
            }).done(function(res){
              loadLists();
              $form[0].reset();
              // ensure hidden fields persist
              $form.find('input[name=form_type]').length||$form.prepend('<input type="hidden" name="form_type" value="'+($form.is($commentForm)?'comment':'review')+'">');
              $form.find('input[name=product_id]').length||$form.prepend('<input type="hidden" name="product_id" value="'+productId+'">');
              if ($form.is($reviewForm)){
                var $r = $form.find('input[name=rating]');
                if (!$r.length) $form.prepend('<input type="hidden" name="rating" value="5">');
                else $r.val(5);
                $('#review .list li a i').removeClass('text-warning');
              }
            }).always(function(){
              $btn.prop('disabled', false);
            });
          });
        }
        if ($commentForm.length) bindAjax($commentForm);
        if ($reviewForm.length) bindAjax($reviewForm);
      });
    })(jQuery);
  </script>