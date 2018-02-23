</br><h3>Comments</h3>
<!--- ladda kommentarer-->
<!-- ko foreach: comments -->

<p class='commentAlias' data-bind="text: author"> says: </p><p class='commentText' data-bind="text: comment"></p>
<div data-bind="if: canDelete">
    <p class="editButton" data-bind="attr: {ID: pageID}, click: $parent.delComment">delete</p>
</div>



<form class="commentForm" role="form" accept-charset="utf-8">

<?php
    if ($this->session->userdata('logged_in')){
        echo ' <input data-bind="textInput: commentText" 
            class="form-control" type="text" placeholder="Your comment" name="comment" />';
        echo '</br><button data-bind="click: addComment" type="submit">Click to comment</button>';
    }
?>

</form>
