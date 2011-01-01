<?php
/* author: Nando Vieira <fnando dot vieira at gmail dot com> */
function challenge_check($comment_id)
{
    global $wpdb, $user_ID, $comment_count_cache;
    
    if ($user_ID) {
        return;
    }
    
    $hash = $_POST['challenge_hash'];
    $challenge = md5($_POST['challenge']);
    $post_id = $_POST['comment_post_ID'];
    
    if ($hash != $challenge) {
        $wpdb->query("DELETE FROM {$wpdb->comments} WHERE comment_ID = {$comment_id}");
        $count = $wpdb->get_var("select count(*) from $wpdb->comments where comment_post_id = {$post_id} and comment_approved = '1'");    
        $wpdb->query("update $wpdb->posts set comment_count = {$count} where ID = {$post_id}");
        wp_die(__('Desculpe, mas a conta não está correta.'));
    }
}
 
function challenge_form()
{
    global $user_ID;
    
    if ($user_ID) {
        return;
    }
    
    $nums = array(rand(1,4), rand(1,4));
    $n1 = max($nums[0], $nums[1]);
    $n2 = min($nums[0], $nums[1]);
    $challenge = ($n1 + $n2);
    $hash = md5($challenge);
    
    $question = "Quanto é {$n1} + {$n2}?";
    $field = sprintf('<p><label for="challenge">%s</label> <input type="hidden" name="challenge_hash" value="%s" /> <input type="text" name="challenge" id="challenge" size="2" /></p>', $question, $hash);
    echo $field;
}
 
add_action('comment_post', 'challenge_check');
add_action('comment_form', 'challenge_form');
?>