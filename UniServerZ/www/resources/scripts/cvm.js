/**
 * Created by Damian on 14/12/2016.
 */

/* Called when document finished loading */
$(document).ready(function () {
    var CommentsViewModel = function () {

        /* Creating KnockOut observables */
        var self = this;
        self.comments = ko.observableArray([]);
        self.commentText = ko.observable("");

        /* pathArray contains full path split into elements.
         * We can target 'meatballs' or 'pancakes' by targeting
         * the last element in the array
         */
        var pathArray = window.location.pathname.split('/');
        var site = pathArray[pathArray.length - 1];
        var base_url = 'http://localhost/index.php/';
        var data;

        if (site == 'meatballs')
            data = {'pageid': '1'};
        else
            data = {'pageid': '2'};

        $.post(base_url + 'Comments/getComment', data, function (data) {
            for (var i in data){
                self.comments.push
                ({
                    author: data[i].username,
                    comment: data[i].comment,
                    pageid: data[i].ID,
                    canDelete: false
                });
            }

        },'json');

    }
});