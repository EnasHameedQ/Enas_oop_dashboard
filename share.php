   <?php
    $baseUrl = "http://localhost/Enas_OOP_dashboard/";
    $slug = $row['articleSlug'];
    $articleIdc = $row['articleId'];


    ?>

   <p><strong>Share </strong></p>
   <ul>

       <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $baseUrl . $slug; ?>"> <img src="assets/images/facebook.png">

           <a target="_blank" href="http://twitter.com/share?text=Visit the link &url=<?php echo $baseUrl . $slug; ?>&hashtags=blog,technosmarter,programming,tutorials,codes,examples,language,development">
               <img src="assets/images/twitter.png">

               <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $baseUrl . $slug; ?>"> <img src="assets/images/linkedin.png">

                   <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $baseUrl . $slug; ?>">
                       <img src="assets/images/pinterest.png">
   </ul>
   <!--  -->
   <?php
    //    // Social media sharing buttons
    //    function crunchify_social_sharing_buttons($content) {
    //    global $post;
    //    if(is_singular() || is_home()){

    //    // Get current page URL
    //    $crunchifyURL = urlencode(get_permalink());

    //    // Get current page title
    //    $crunchifyTitle = str_replace( ' ', '%20', get_the_title());

    //    // Get Post Thumbnail for pinterest
    //    $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

    //    // Construct sharing URL without using any script
    //    $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&url='.$crunchifyURL.'&via=Crunchify';
    //    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
    //    $googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
    //    $whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
    //    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&title='.$crunchifyTitle;

    //    // Based on popular demand added Pinterest too
    //    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&media='.$crunchifyThumbnail[0].'&description='.$crunchifyTitle;

    //    // Add sharing button at the end of page/page content
    //    $content .= '
    //    <!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
    //    $content .= '<div class="crunchify-social">';
    //        $content .= '<a class="crunchify-link crunchify-facebook icon-Facebook-2" href="'.$facebookURL.'" target="_blank" title="Share on Facebook"></a>';
    //        $content .= '<a class="crunchify-link crunchify-linkedin icon-Linkedin" href="'.$linkedInURL.'" target="_blank" title="Share on LinkedIn"></a>';
    //        $content .= '<a class="crunchify-link crunchify-twitter icon-Twitter" href="'. $twitterURL .'" target="_blank" title="Share on Twitter"></a>';
    //        $content .= '<a class="crunchify-link crunchify-googleplus icon-Google-Plus" href="'.$googleURL.'" target="_blank" title="Share on Google+"></a>';
    //        $content .= '<a class="crunchify-link crunchify-whatsapp icon-whatsapp" href="'.$whatsappURL.'" target="_blank" title="Share with Whatsapp"></a>';
    //        $content .= '<a class="crunchify-link crunchify-pinterest icon-Pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank" title="Pin it!"></a>';
    //        $content .= '</div>';

    //    return $content;
    //    }else{
    //    // if not a post/page then don't include sharing button
    //    return $content;
    //    }
    //    };
    //    add_filter( 'the_content', 'crunchify_social_sharing_buttons')
    ?>
   <!--  -->

   <div id="share-buttons">

       <!-- Email -->
       <a href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://simplesharebuttons.com">
           <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
       </a>

       <!-- Facebook -->
       <a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank">
           <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
       </a>

       <!-- Google+ -->
       <a href="https://plus.google.com/share?url=https://simplesharebuttons.com" target="_blank">
           <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
       </a>

       <!-- LinkedIn -->
       <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://simplesharebuttons.com" target="_blank">
           <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
       </a>

       <!-- Pinterest -->
       <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
           <img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
       </a>

       <!-- Print -->
       <a href="javascript:;" onclick="window.print()">
           <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
       </a>

     
  

       <!-- Twitter -->
       <a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
           <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
       </a>

     