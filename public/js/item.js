function moreComments(commentId, button) {
    $.ajax({
        url: moreCommentsUrl + '?commentId=' + commentId + userId,
    type: 'GET',
        datatype: 'html',
        success: function (comments) {
        button.insertAdjacentHTML('beforebegin', comments);
        button.remove();
    }
});
}

function moreAnswers(answerId, commentId, button) {
    $.ajax({
        url: moreAnswersUrl + '?commentId=' + commentId + '&answerId=' + answerId,
        type: 'GET',
        datatype: 'html',
        success: function (answers) {
            button.insertAdjacentHTML('beforebegin', answers);
            button.remove();
        }
    });
}

function moreReviews(reviewId, button) {
    $.ajax({
        url: moreReviewsUrl + '?reviewId=' + reviewId + userId,
    type: 'GET',
        datatype: 'html',
        success: function (reviews) {
        button.insertAdjacentHTML('beforebegin', reviews);
        button.remove();
    }
});
}
